<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function showHotel($id)
	{
		$hotel = \App\Hotel::findorfail($id);

		return view('profile.hotel.index', [
			'hotel' => $hotel,
		]);
	}

	public function showHotelService($id)
	{
		$hotel = \App\Hotel::findorfail($id);

		return view('profile.hotel.hotelService', [
			'hotel' => $hotel,
		]);
	}

	public function showHotelPhoto($id)
	{
		$hotel = \App\Hotel::findorfail($id);

		return view('profile.hotel.hotelPhoto', [
			'hotel' => $hotel,
		]);
	}

	public function showHotelPayment($id)
	{
		$hotel = \App\Hotel::findorfail($id);

		if ($hotel->co_day) {
			return view('profile.hotel.hotelPayment', [
				'hotel' => $hotel,
			]);
		}

		abort(404);
	}

	public function showHotelEn($id)
	{
		$hotel = \App\Hotel::findorfail($id);

		return view('profile.hotel.hotelEng', [
			'hotel' => $hotel,
		]);
	}

	public function storeHotelEn(Request $request, $id)
	{
		$hotel = \App\Hotel::findorfail($id);
		$hotel->name_en = $request->get('name');
		$hotel->contact_en = $request->get('contact');
		$hotel->address_en = $request->get('address');
		$hotel->introduction_en = $request->get('introduction');
		$hotel->other_service_en = $request->get('other_service');
		$hotel->other_info_en = $request->get('other_info');
		$hotel->save();

		foreach ($hotel->rooms as $room) {
			$room->introduction_en = $request->get('room-introduction-'.$room->id);
			$room->save();
		}

		return back()->with('status', 'Амжилттай хадгаллаа');
	}

	public function showRooms($id)
	{
		$hotel = \App\Hotel::findorfail($id);
		$rooms = $hotel->rooms()->with(['closes' => function($query) {
			$query->where('is_ordered', false);
		}])->get();

		return view('profile.hotel.room', [
			'hotel' => $hotel,
			'rooms' => $rooms,
		]);
	}

	public function closeRoom(Request $request, $id)
	{
		$room = \App\Room::findorfail($id);
		if (\Auth::user()->hotels->contains($room->hotel_id) OR \Auth::user()->isAdmin()) {
			$close = new \App\Close;
			$close->number = $request->get('number');
			$close->startdate = $request->get('startdate');
			$close->enddate = $request->get('enddate');
			$room->closes()->save($close);

			$closes = $room->closes()->where('is_ordered', false)
					->get();

			return response()->view('profile.hotel.partials.closes', [
				'closes' => $closes,
			], 200);
		}

		abort(404);
	}

	public function checkClose(Request $request, $id)
	{
		$room = \App\Room::findorfail($id);
		$number = $room->number;
		foreach ($room->closes as $close) {
			if (strtotime($request->get('startdate')) >= strtotime($close->startdate)) {
				if ((strtotime($request->get('startdate')) - strtotime($close->startdate)) <= (strtotime($close->enddate) - strtotime($close->startdate))) {
					$number = $number - $close->number;
				}
			}
			else {
				if ((strtotime($request->get('enddate')) - strtotime($request->get('startdate'))) >= (strtotime($close->startdate) - strtotime($request->get('startdate')))) {
					$number = $number - $close->number;
				}
			}
		}

		return response()->view('profile.hotel.partials.select', [
			'number' => $number,
		], 200);
	}

	public function cancelClose($id)
	{
		$close = \App\Close::findorfail($id);
		$room = \App\Room::findorfail($close->room_id);
		if (\Auth::user()->hotels->contains($room->hotel_id) OR \Auth::user()->isAdmin()) {
			$close->delete();
			$closes = $room->closes()->where('is_ordered', false)
					->get();

			return response()->view('profile.hotel.partials.closes', [
				'closes' => $closes,
			], 200);
		}

		abort(404);
	}

	public function saleRoom(Request $request, $id)
	{
		$room = \App\Room::findorfail($id);
		if (\Auth::user()->hotels->contains($room->hotel_id) OR \Auth::user()->isAdmin()) {
			$sale = new \App\Sale;
			$sale->price = $request->get('price');
			$sale->startdate = $request->get('startdate');
			$sale->enddate = $request->get('enddate');
			$room->sales()->save($sale);

			$sales = $room->sales()->get();

			return response()->view('profile.hotel.partials.sales', [
				'sales' => $sales,
			], 200);
		}

		abort(404);
	}

	public function cancelSale($id)
	{
		$sale = \App\Sale::findorfail($id);
		$room = \App\Room::findorfail($sale->room_id);
		if (\Auth::user()->hotels->contains($room->hotel_id) OR \Auth::user()->isAdmin()) {
			$sale->delete();
			$sales = $room->sales()->get();

			return response()->view('profile.hotel.partials.sales', [
				'sales' => $sales,
			], 200);
		}

		abort(404);
	}

	public function checkSale(Request $request, $id)
	{
		$room = \App\Room::findorfail($id);
		$available = true;
		foreach ($room->sales as $sale) {
			if (strtotime($request->get('startdate')) >= strtotime($sale->startdate)) {
				if ((strtotime($request->get('startdate')) - strtotime($sale->startdate)) <= (strtotime($sale->enddate) - strtotime($sale->startdate))) {
					$available = false;
				}
			}
			else {
				if ((strtotime($request->get('enddate')) - strtotime($request->get('startdate'))) >= (strtotime($sale->startdate) - strtotime($request->get('startdate')))) {
					$available = false;
				}
			}
		}

		return response()->view('profile.hotel.partials.input', [
			'available' => $available,
		], 200);
	}

	public function showOrder($id)
	{
		$hotel = \App\Hotel::findorfail($id);
		$orders = $hotel->orders()
			->orderby('created_at', 'desc')
			->paginate(20);

		return view('profile.hotel.order', [
			'hotel' => $hotel,
			'orders' => $orders,
		]);
	}

	public function showSingleOrder($id, $rid)
	{
		$order = \App\Order::findorfail($rid);
		$hotel = \App\Hotel::findorfail($id);

		return view('profile.hotel.showOrder', [
			'order' => $order,
			'hotel' => $hotel,
		]);
	}

	public function searchOrder(Request $request, $id)
	{
		$name = $request->get('name');
		$type = $request->get('type');
		$date = $request->get('date');
		$hotel = \App\Hotel::findorfail($id);

		$orders = $hotel->orders()->with('user')->wherehas('user', function($query) use ($name) {
			$query->where('name', 'LIKE', '%' . $name . '%');
		});

		if ($type == 1) {
			$orders = $orders->where('created_at', 'LIKE', '%' . $date . '%')
	            ->paginate(20);
		}
		elseif ($type == 2) {
			$orders = $orders->where('startdate', 'LIKE', '%' . $date . '%')
	            ->paginate(20);

		}
		elseif ($type == 3) {
			$orders = $orders->where('enddate', 'LIKE', '%' . $date . '%')
	            ->paginate(20);
		}
		else {
			$orders = $orders->paginate(20);
		}

		return response()->view('profile.hotel.partials.search', [
			'orders' => $orders,
		], 200);
	}

	public function showRating($id)
	{
		$hotel = \App\Hotel::findorfail($id);
		$rates = $hotel->rates()
			->orderby('created_at', 'desc')
			->get();

		$total = 0;
		$employees = 0;
		$fresh = 0;
		$comfort = 0;
		$location = 0;
		$price = 0;
		if ($rates->count() > 0) {
			foreach ($rates as $key => $rate) {
				$employees = $employees + $rate->employees;
				$fresh = $fresh + $rate->fresh;
				$comfort = $comfort + $rate->comfort;
				$location = $location + $rate->location;
				$price = $price + $rate->price;
				$count = $key + 1;
			}
			$total = $hotel->rating;
			$employees = $employees / $count;
			$fresh = $fresh / $count;
			$comfort = $comfort / $count;
			$location = $location / $count;
			$price = $price / $count;
		}

		return view('profile.hotel.rating', [
			'hotel' => $hotel,
			'rates' => $rates,
			'total' => $total,
			'employees' => $employees,
			'fresh' => $fresh,
			'comfort' => $comfort,
			'location' => $location,
			'price' => $price,
		]);
	}
}
