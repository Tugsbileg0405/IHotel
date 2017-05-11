<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;

class UserController extends Controller
{
    /**
     * Show the form for editing current user's informations.
     *
     */
	public function editProfile()
	{
		return view('profile.updateProfile');
	}

    /**
     * Store current user's newly informations in database.
     *
     */
	public function storeProfile(Request $request)
	{
		$user = Auth::user();
		$user->name = $request->get('name');
		$user->email = $request->get('email');
		$user->surname = $request->get('surname');
		$user->gender = $request->get('gender');
		$user->phone_number = $request->get('phone_number');
		$user->avatar = $request->get('image');
		$user->save();

		if (\App::isLocale('mn')) {
        	$request->session()->flash('status', 'Амжилттай хадгаллаа!');
		}
		elseif (\App::isLocale('en')) {
        	$request->session()->flash('status', 'Successfully saved!');
		}

        return back();
	}

    /**
     * Store current user's avatar image in database with AJAX.
     *
     */
    public function storePhoto(Request $request)
    {
        $image = $request->file('photo');
        $image_path = 'img/uploads/users/'.md5(
            time().$image->getClientOriginalName()).'.'.$image->getClientOriginalExtension();

        Image::make($image)->fit(200, 200)->save($image_path);

        return response()->json([
            'image' => $image_path,
        ], 200);
    }

    /**
     * Show the form for editing current user's password.
     *
     */
	public function editPassword()
	{
		return view('profile.updatePassword');
	}

    /**
     * Store newly current user's password in database.
     *
     */
	protected function storePassword(Request $request)
	{
        Auth::user()->fill([
            'password' => Hash::make($request->get('password'))
        ])->save();


		if (\App::isLocale('mn')) {
	        $request->session()->flash('status', 'Таны нууц үг шинэчлэгдлээ!');
		}
		elseif (\App::isLocale('en')) {
	        $request->session()->flash('status', 'Your password has been reset!');
		}
        return back();
	}

    /**
     * Show the hotels for current user's hotel rating.
     *
     */
	public function showRate()
	{
		$hotels = \App\Hotel::paginate(5);

		return view('profile.showRate', [
			'hotels' => $hotels,
		]);
	}

    /**
     * Show the form for current user's hotel rating and review.
     *
     */
	public function createRate($id)
	{
		$hotel = \App\Hotel::findOrFail($id);
		$rate = Auth::user()->rates()
			->where('hotel_id', $id)
			->first();
		$review = Auth::user()->reviews()
			->where('hotel_id', $id)
			->first();
		
		return view('profile.createRate', [
			'hotel' => $hotel,
			'rate' => $rate,
			'review' => $review,
		]);
	}

    /**
     * Store current user's newly hotel rating in database with AJAX.
     *
     */
	public function storeRate(Request $request, $id)
	{
		$rate = \App\Rate::updateOrCreate(
		    [
		    	'user_id' => Auth::user()->id, 
		    	'hotel_id' => $id,
		    ],
		    [
				'employees' => $request->get('employees'),
				'fresh' => $request->get('fresh'),
				'comfort' => $request->get('comfort'),
				'location' => $request->get('location'),
				'price' => $request->get('price'),
		    ]
		);

		$hotel = \App\Hotel::findOrFail($id);
		$rates = $hotel->rates()->get();
		$total = 0;
		$count = 0;
		if ($rates->count() > 0) {
			foreach ($rates as $key => $rate) {
				$total = $total + ($rate->employees + $rate->fresh + $rate->comfort + $rate->location + $rate->price) / 5;
				$count = $key + 1;
			}
			$total = $total / $count;
			$hotel->rating = $total;
			$hotel->save();
		}

        return response()->json([
        	'success' => true,
        ], 200);
	}

    /**
     * Store current user's newly hotel review in database with AJAX.
     *
     */
	public function storeReview(Request $request, $id)
	{
		$review = \App\Review::updateOrCreate(
		    [
		    	'user_id' => Auth::user()->id, 
		    	'hotel_id' => $id,
		    ],
		    [
				'content' => $request->get('content'),
		    ]
		);

        return response()->json([
        	'success' => true,
        ], 200);
	}

    /**
     * Show the current user's orders.
     *
     */
	public function showOrders()
	{
		$orders = Auth::user()->orders()
			->orderby('created_at', 'desc')
			->paginate(10);

		return view('profile.showOrder', [
			'orders' => $orders,
		]);
	}

	public function cancelOrder(Request $request, $id)
	{
		$order = \App\Order::findOrFail($id);
		if ($order->user->id == Auth::user()->id) {
			if ($order->status == 1) {
				$order->status = 3;
				$order->save();

				$order->closes()->delete();

				return back();
			}
			abort(404);
		}
		abort(404);
	}

  /**
     * Show the current user's owned hotels.
     *
     */
	public function showHotels()
	{
		$hotels = Auth::user()->hotels()
			->paginate(20);

		return view('profile.showHotel', [
			'hotels' => $hotels,
		]);
	}
}
