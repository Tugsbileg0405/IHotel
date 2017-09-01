<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Auth;
use App\Mail\Order;
use App\Mail\OrderCanceled;
use Carbon\Carbon;
use App\Option;
use Mail;
use Swap;

class OrderController extends Controller
{

	// ============================================================================
 	//	- Get information of order from blade
 	// ============================================================================

	public function order(Request $request)
	{
		$request->session()->put('order_hotelid', $request->order_hotelid);
		$request->session()->put('order_roomdata', $request->order_roomdata);
		$request->session()->put('order_startdate', $request->order_startdate);
		$request->session()->put('order_enddate', $request->order_enddate);
		$request->session()->put('order_pickup', $request->order_pickup);
		$request->session()->put('order_sim', $request->order_sim);

		$enddate = strtotime($request->order_enddate);
		$startdate = strtotime($request->order_startdate);

		$request->session()->put('order_day', ($enddate - $startdate) / 86400);

		$price = 0;
		foreach ($request->order_roomdata as $roomdata)
		{
			$room = \App\Room::findOrFail($roomdata['room_id']);

			$sale = $room->sales()->where('startdate', '<=', Carbon::parse($request->order_startdate)->format('Y-m-d'))
				->where('enddate', '>=', Carbon::parse($request->order_startdate)->format('Y-m-d'))
				->first();

			if ($room->people_number > 1) {
				if ($room->price_op) {
					if ($roomdata['person_number'] > 1) {
						if ($sale) {
							$price += $sale->price * $roomdata['room_number'];
						}
						else {
							$price += $room->price * $roomdata['room_number'];
						}
					}
					else {
						if ($sale) {
							$price += $sale->price_op * $roomdata['room_number'];
						}
						else {
							$price += $room->price_op * $roomdata['room_number'];
						}
					}
				}
				else {
					if ($sale) {
						$price += $sale->price * $roomdata['room_number'];
					}
					else {
						$price += $room->price * $roomdata['room_number'];
					}
				}
			}
			else {
				if ($sale) {
					$price += $sale->price * $roomdata['room_number'];
				}
				else {
					$price += $room->price * $roomdata['room_number'];
				}
			}
		}

		$price = $price * $request->session()->get('order_day');

		$pickup = \App\Pickup::find($request->session()->get('order_pickup'));

		if ($pickup) {
			$price = $price + $pickup->price;
		}

		$request->session()->put('order_price', $price);

		return response()->json([
			'success' => true
		]);
	}

	// ============================================================================
 	// - Pass necessary information of order to form of credit card
 	// ============================================================================

	public function showCard(Request $request)
	{
		$countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Antigua and Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas, The","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bhutan","Bolivia","Bosnia and Herzegovina","Botswana","Brazil","Brunei","Bulgaria","Burkina Faso","Burma","Burundi","Cambodia","Cameroon","Canada","Cabo Verde","Central African Republic","Chad","Chile","China","Colombia","Comoros","Congo, Democratic Republic of the","Congo, Republic of the","Costa Rica","Cote d'Ivoire","Croatia","Cuba","Curacao","Cyprus","Czechia","Denmark","Djibouti","Dominica","Dominican Republic","East Timor (see Timor-Leste)","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Fiji","Finland","France","Gabon","Gambia, The","Georgia","Germany","Ghana","Greece","Grenada","Guatemala","Guinea","Guinea-Bissau","Guyana","Haiti","Holy See","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Israel","Italy","Jamaica","Japan","Jordan","Kazakhstan","Kenya","Kiribati","Korea, North","Korea, South","Kosovo","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Morocco","Mozambique","Namibia","Nauru","Nepal","Netherlands","New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau","Palestinian Territories","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Qatar","Romania","Russia","Rwanda","Saint Kitts and Nevis","Saint Lucia","Saint Vincent and the Grenadines","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Sint Maarten","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor-Leste","Togo","Tonga","Trinidad and Tobago","Tunisia","Turkey","Turkmenistan","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","Uruguay","Uzbekistan","Vanuatu","Venezuela","Vietnam","Yemen","Zambia","Zimbabwe"];

		$hotel = \App\Hotel::findOrFail($request->session()->get('order_hotelid'));
		$rate = Option::find(7)->value;
		$pickup = \App\Pickup::find($request->session()->get('order_pickup'));
		
		$roomdatas = $request->session()->get('order_roomdata');
		$startdate = $request->session()->get('order_startdate');
		$enddate = $request->session()->get('order_enddate');
		$orderday = $request->session()->get('order_day');

		$rooms = [];

		foreach ($roomdatas as $roomdata)
		{
			$room = \App\Room::findOrFail($roomdata['room_id']);
			$sale = $room->sales()->where('startdate', '<=', date('Y-m-d', strtotime($startdate)))
				->where('enddate', '>=', date('Y-m-d', strtotime($startdate)))
				->first();
			if ($room->people_number > 1) {
				if ($room->price_op) {
					if ($roomdata['person_number'] > 1) {
						if ($sale) {
							$room->price = $sale->price;
						}
						else {
							$room->price = $room->price;
						}
					}
					else {
						if ($sale) {
							$room->price = $sale->price_op;
						}
						else {
							$room->price = $room->price_op;
						}
					}
				}
				else {
					if ($sale) {
						$room->price = $sale->price;
					}
					else {
						$room->price = $room->price;
					}
				}
			}
			else {
				if ($sale) {
					$room->price = $sale->price;
				}
				else {
					$room->price = $room->price;
				}
			}
            $room->ordered_number = $roomdata['room_number'];
			$rooms[] = $room;
		}

		return view('order.card', [
			'countries' => $countries,
			'hotel' => $hotel,
			'rooms' => $rooms,
			'startdate' => $startdate,
			'enddate' => $enddate,
			'pickup' => $pickup,
			'price' => $request->session()->get('order_price'),
			'orderday' => $request->session()->get('order_day'),
			'rate' => $rate
		]);
	} 

	// ============================================================================
 	//  - Save data of credit card and order in database
	//  - Send email information of order to user
 	// ============================================================================

	public function storeCard(OrderRequest $request)
	{
		if (Auth::check()) {
			$user = \App\User::find(Auth::user()->id);
			$user->name = $request->get('name');
			$user->surname = $request->get('surname');
			$user->country = $request->get('country');
			$user->phone_number = $request->get('phone_number');
			$user->save();

			$userData = [
				'name' => $user->name,
				'surname' => $user->surname,
				'country' => $user->country,
				'phone_number' => $user->phone_number,
				'email' => $user->email,
			];
		}
		else {
			$userData = [
				'name' => $request->get('name'),
				'surname' => $request->get('surname'),
				'country' => $request->get('country'),
				'phone_number' => $request->get('phone_number'),
				'email' => $request->get('email_order'),
			];
		}

		$flightdata = [
			'arrival_date' => $request->get('arrivaldate'),
			'arrival_time' => $request->get('arrivaltime'),
			'flight_number' => $request->get('flightnumber'),
		];

		$rate = Option::find(7)->value;

		$roomdatas = $request->session()->get('order_roomdata');
		
		$cardNumber = $request->get('card_number');
		$cardName = $request->get('card_holders_name');
		$expiryMonth = $request->get('expired_month');
		$expiryYear = $request->get('expired_year');
		$cvc = $request->get('cvc');
		$cardData = [
			'cardnumber' => $cardNumber, 
			'cardname' => $cardName, 
			'expirymonth' => $expiryMonth, 
			'expiryyear' => $expiryYear, 
			'cvv' => $cvc,
		];

		$hotel = \App\Hotel::findOrFail($request->session()->get('order_hotelid'));

		$order = new \App\Order;
		if (Auth::check()) {
			$order->user_id = Auth::user()->id;
		}
		$order->hotel_id = $hotel->id;
		$order->hotel_name = $hotel->name;
		$array = [];
		foreach ($roomdatas as $roomdata) {
			$room = \App\Room::findOrFail($roomdata['room_id']);
			$sale = $room->sales()->where('startdate', '<=', date('Y-m-d', strtotime($request->session()->get('order_startdate'))))
				->where('enddate', '>=', date('Y-m-d', strtotime($request->session()->get('order_startdate'))))
				->first();
			if ($room->people_number > 1) {
				if ($room->price_op) {
					if ($roomdata['person_number'] > 1) {
						if ($sale) {
							$room->price = $sale->price;
						}
						else {
							$room->price = $room->price;
						}
					}
					else {
						if ($sale) {
							$room->price = $sale->price_op;
						}
						else {
							$room->price = $room->price_op;
						}
					}
				}
				else {
					if ($sale) {
						$room->price = $sale->price;
					}
					else {
						$room->price = $room->price;
					}
				}
			}
			else {
				if ($sale) {
					$room->price = $sale->price;
				}
				else {
					$room->price = $room->price;
				}
			}
			
			if (\App::isLocale('en')) {
				$array[] = [
					'room_id' => $room->id,
					'room_name' => $room->name,
					'room_category' => $room->category->name,
					'room_number' => $roomdata['room_number'],
					'room_price' => $room->price / $rate,
					'person_number' => $roomdata['person_number'],
				];
			}
			else {
				$array[] = [
					'room_id' => $room->id,
					'room_name' => $room->name,
					'room_category' => $room->category->name,
					'room_number' => $roomdata['room_number'],
					'room_price' => $room->price,
					'person_number' => $roomdata['person_number'],
				];
			}
		}
		$order->rooms = serialize($array);
		$order->day = $request->session()->get('order_day');
		$order->startdate = $request->session()->get('order_startdate');
		$order->enddate = $request->session()->get('order_enddate');
		$order->price = $request->session()->get('order_price');
		$array = [];
		if ($request->session()->get('order_pickup')) {
			$pickup = \App\Pickup::findorfail($request->session()->get('order_pickup'));
			$array = [
				'id' => $pickup->id,
				'name' => $pickup->name,
				'name_en' =>  $pickup->name_en,
			];
		}
		$order->pickup = serialize($array);
		if (\App::isLocale('en')) {
			$order->price_dollar = $request->session()->get('order_price') / $rate;
			$order->dollar_rate = $rate;
		}
		$order->carddata = json_encode($cardData);
		$order->userdata = json_encode($userData);
		$order->flightdata = json_encode($flightdata);
        $order->request = $request->get('request');
        $order->token = str_random(40);
		$order->save();

		$id = $order->id;
		$order = \App\Order::findOrFail($id);
		$order->number = 'PO-'.$id;
		$order->save();

		$order->total_room_number = 0;
		foreach ($roomdatas as $roomdata)
		{
            $order->total_room_number += $roomdata['room_number'];

			$close = new \App\Close;
			$close->room_id = $roomdata['room_id'];
			$close->number = $roomdata['room_number'];
			$close->startdate = $order->startdate;
			$close->enddate = $order->enddate;
			$close->is_ordered = true;
			$close->order_id = $order->id;
			$close->save();
		}

		$price = $request->session()->get('order_price');

		Mail::to($userData['email'])->bcc(env('MAIL_FROM_ADDRESS'))
			->send(new Order($order));

		$request->session()->pull('order_hotelid');
		$request->session()->pull('order_roomdata');
		$request->session()->pull('order_startdate');
		$request->session()->pull('order_enddate');
		$request->session()->pull('order_pickup');
		$request->session()->pull('order_totalprice');
		$request->session()->pull('order_day');

		return redirect('order/success');
	}

	// ============================================================================
 	//  - Show success message to user in blade
	// ============================================================================

	public function showSuccess()
	{
		return view('order.success');
    }
    
    public function cancel($id, $token)
    {
        $order = \App\Order::findorfail($id);

        if ($order->token == $token) {
            $order->status = 3;
            $order->save();
            $order->closes()->delete();
            
            Mail::to(json_decode($order->userdata)->email)->bcc(env('MAIL_FROM_ADDRESS'))
                ->send(new OrderCanceled($order));
        }
        else {
            abort(404);
        }
            
		return view('order.canceled');
    }
}
