<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

class HotelController extends Controller
{
    /**
     * Show the form for creating a new hotel.
     *
     */
    public function createHotel()
    {
        $categories = \App\HotelCategory::orderby('name', 'asc')
            ->get();

        return view('hotel.createHotel', [
            'categories' => $categories,
        ]);
    }

    public function editHotel($id)
    {
        $hotel = \App\Hotel::findorfail($id);
        $categories = \App\HotelCategory::orderby('name', 'asc')
            ->get();

        return view('hotel.updateHotel', [
            'categories' => $categories,
            'hotel' => $hotel,
        ]);
    }

    public function storeHotel(Request $request)
    {
        $hotel = new \App\Hotel;
        $hotel->user_id = \Auth::user()->id;
        $hotel->category_id = $request->get('category');
        $hotel->name = $request->get('name');
        $hotel->star = $request->get('star');
        $hotel->room_number = $request->get('room_number');
        $hotel->website = $request->get('website');
        $hotel->contact = $request->get('contact');
        $hotel->what3words = $request->get('what3words');
        $hotel->what3words_en = $request->get('what3words_en');
        $hotel->phone_number = $request->get('phone_number');
        $hotel->email = $request->get('email');
        $hotel->address = $request->get('address');
        $array = array($request->get('lat'), $request->get('lon'));
        $hotel->location = json_encode($array);
        $hotel->step = 2;
        $hotel->save();

        return redirect('hotel/service/'.$hotel->id);
    }

    public function updateHotel(Request $request, $id)
    {
        $hotel = \App\Hotel::findorfail($id);
        $hotel->user_id = \Auth::user()->id;
        $hotel->category_id = $request->get('category');
        $hotel->name = $request->get('name');
        $hotel->star = $request->get('star');
        $hotel->what3words = $request->get('what3words');
        $hotel->what3words_en = $request->get('what3words_en');
        $hotel->room_number = $request->get('room_number');
        $hotel->website = $request->get('website');
        $hotel->contact = $request->get('contact');
        $hotel->phone_number = $request->get('phone_number');
        $hotel->email = $request->get('email');
        $hotel->address = $request->get('address');
        $array = array($request->get('lat'), $request->get('lon'));
        $hotel->location = json_encode($array);
        if ($hotel->step < 2) {
            $hotel->step = 2;
        }
        else {
            if ($hotel->step > 4) {
                if ($hotel->rooms->count() != $hotel->room_number) {
                    $hotel->step = 4;
                }
            }
        }
        $hotel->save();

        if ($hotel->published) {
            $request->session()->flash('status', 'Амжилттай хадгаллаа');
            return redirect('admin/hotel/'.$hotel->id);
        }

        return redirect('hotel/service/'.$hotel->id);
    }

    public function createHotelService($id)
    {
        $hotel = \App\Hotel::findorfail($id);
        $categories = \App\HotelServiceCategory::get();

        return view('hotel.createHotelService', [
            'hotel' => $hotel,
            'categories' => $categories,
        ]);
    }

    public function storeHotelService(Request $request, $id)
    {
        $hotel = \App\Hotel::findorfail($id);
        $hotel->is_child = $request->get('is_child');
        $hotel->is_internet = $request->get('is_internet');
        $hotel->introduction = $request->get('introduction');
        $hotel->other_service = $request->get('other_service');
        if ($hotel->step < 3) {
            $hotel->step = 3;
        }
        $hotel->save();

        if ($request->has('services')) {
            $hotel->services()->sync($request->get('services'));
        }
        else {
            $hotel->services()->detach();
        }

        if ($hotel->published) {
            $request->session()->flash('status', 'Амжилттай хадгаллаа');
            return redirect('admin/hotel/service/'.$hotel->id);
        }

        return redirect('hotel/photo/'.$hotel->id);
    }

    public function createHotelPhoto($id)
    {
        $hotel = \App\Hotel::findorfail($id);

        return view('hotel.createHotelPhoto', [
            'hotel' => $hotel,
        ]);
    }

    public function storeHotelPhoto(Request $request, $id)
    {
        $hotel = \App\Hotel::findorfail($id);
        $hotel->cover_photo = $request->get('photo');
        $hotel->other_photos = serialize($request->get('photos'));
        if ($hotel->step < 4) {
            $hotel->step = 4;
        }
        $hotel->save();

        if ($hotel->published) {
            $request->session()->flash('status', 'Амжилттай хадгаллаа');
            return redirect('admin/hotel/photo/'.$hotel->id);
        }

        return redirect('hotel/room/'.$hotel->id);
    }

    public function storePhoto(Request $request)
    {
        if ($request->is('hotel/upload')) {
            $photo = $request->file('file');
        }

        if ($request->is('hotel/upload/photos')) {
            $photo = $request->file('files');
        }
        $path = 'img/uploads/hotels/'.md5(microtime()).'.'.$photo->getClientOriginalExtension();
        Image::make($photo)->fit(1024, 680)->save($path);

        if ($request->is('hotel/upload')) {
            return response()->view('hotel.photo', [
                'photo' => $path,
            ], 200);
        }

        if ($request->is('hotel/upload/photos')) {
            return response()->view('hotel.photos', [
                'photo' => $path,
            ], 200);
        }
    }

    public function createRoom(Request $request, $id)
    {
        $categories = \App\RoomCategory::get();

        $hotel = \App\Hotel::findorfail($id);
        $total_room_number = $hotel->room_number;
        $rooms = $hotel->rooms()->get();

        $room_number = 0;
        foreach($rooms as $room) {
            $room_number = $room_number + $room->number;
        }

        return view('hotel.createRoom', [
            'categories' => $categories,
            'hotel' => $hotel,
            'rooms' => $rooms,
            'total_room_number' => $total_room_number,
            'room_number' => $room_number,
        ]);
    }

    public function storeRoom(Request $request, $id)
    {
        $room = new \App\Room;
        $room->room_category_id = $request->get('category');
        $room->name = $request->get('name');
        $room->number = $request->get('number');
        $room->bed_number = $request->get('bed_number');
        $room->people_number = $request->get('people_number');
        $room->price = $request->get('price');
        $room->total_people = $request->get('people_number') * $request->get('number');
        $hotel = \App\Hotel::findorfail($id);
        $hotel->rooms()->save($room);
        $hotel->total_people += $room->total_people;
        $hotel->save();
        
        return back();
    }

    public function updateRoom(Request $request, $rid, $id)
    {
        $room = \App\Room::findorfail($rid);
        $hotel = \App\Hotel::findorfail($id);
        $hotel->total_people -= $room->total_people;
        $room->room_category_id = $request->get('category');
        $room->name = $request->get('name');
        $room->number = $request->get('number');
        $room->bed_number = $request->get('bed_number');
        $room->people_number = $request->get('people_number');
        $room->price = $request->get('price');
        $room->total_people = $request->get('people_number') * $request->get('number');
        $room->save();

        $hotel->total_people += $room->total_people;
        $hotel->save();

        return back();
    }

    public function destroyRoom(Request $request, $id)
    {
        $room = \App\Room::findorfail($id);
        $hotel_id = $room->hotel->id;
        if (\Auth::user()->hotels->contains($room->hotel->id) OR \Auth::user()->isAdmin()) {
            $room->services()->detach();
            $room->delete();

            $hotel = \App\Hotel::findorfail($hotel_id);
            if ($hotel->rooms->count() != $hotel->room_number) {
                $hotel->step = 4;
                $hotel->save();
            }
            $hotel->total_people -= $room->total_people;
            $hotel->save();

            return back();
        }

        abort(404);
    }

    public function createRoomService(Request $request, $id)
    {
        $hotel = \App\Hotel::findorfail($id);
        $total_room_number = $hotel->room_number;
        $rooms = $hotel->rooms()->get();

        $room_number = 0;
        foreach($rooms as $room) {
            $room_number = $room_number + $room->number;
        }

        if ($total_room_number == $room_number) {
            if ($hotel->step < 5) {
                $hotel->step = 5;
                $hotel->save();
            }
            $categories = \App\RoomServiceCategory::get();

            return view('hotel.createRoomService', [
                'rooms' => $rooms,
                'categories' => $categories,
                'hotel' => $hotel,
            ]);
        }
        else {
            return redirect('hotel/room/'.$hotel->id);
        }
    }

    public function storeRoomService(Request $request, $id)
    {
        $hotel = \App\Hotel::findorfail($id);
        $hotel->other_info = $request->get('other_info');
        $hotel->save();
        
        $rooms = $hotel->rooms()->get();

        foreach ($rooms as $room)
        {
            $room->size = $request->get('room-size-'.$room->id);
            $room->introduction = $request->get('room-introduction-'.$room->id);
            $room->save();
        }

        $services = \App\RoomService::get();

        foreach ($services as $service) {
            $service->rooms()->sync($request->get('service-'.$service->id));
        }

        if ($hotel->step < 6) {
            $hotel->step = 6;
            $hotel->save();
        }

        if ($hotel->published AND $hotel->step == 7) {
            return redirect('admin/hotel/rooms/'.$hotel->id);
        }

        return redirect('hotel/room/photo/'.$hotel->id);
    }

    public function createRoomPhoto(Request $request, $id)
    {
        $hotel = \App\Hotel::findorfail($id);
        $total_room_number = $hotel->room_number;
        $rooms = $hotel->rooms()->get();

        $room_number = 0;
        foreach($rooms as $room) {
            $room_number = $room_number + $room->number;
        }

        if ($total_room_number == $room_number) {
            return view('hotel.createRoomPhoto', [
                'rooms' => $rooms,
                'hotel' => $hotel,
            ]);
        }
        else {
            return redirect('hotel/room/'.$hotel->id);
        }
    }

    public function storeRoomPhoto(Request $request, $id)
    {
        $hotel = \App\Hotel::findorfail($id);
        $rooms = $hotel->rooms()->get();

        foreach ($rooms as $room) {
            $room->photos = serialize($request->get('photos-'.$room->id));
            $room->save();
        }

        if ($hotel->step < 7) {
            $hotel->step = 7;
            $hotel->save();
        }

        if ($hotel->published) {
            return redirect('admin/hotel/rooms/'.$hotel->id);
        }

        return redirect('hotel/payment/'.$hotel->id);
    }

    public function storeUploadPhoto(Request $request, $id)
    {
        $photo = $request->file('photo-'.$id);
        $path = 'img/uploads/rooms/'.md5(microtime()).'.'.$photo->getClientOriginalExtension();

        Image::make($photo)->fit(1024, 680)->save($path);

        return response()->view('hotel.roomPhotos', [
            'photo' => $path,
            'id' => $id,
        ], 200);
    }

    public function createPayment(Request $request, $id)
    {
        $hotel = \App\Hotel::findorfail($id);

        if ($hotel->step == 7 OR $hotel->co_day) {
            return view('hotel.createPayment', [
                'hotel' => $hotel,
            ]);
        }

        return redirect('hotel/update/'.$hotel->id);
    }

    public function storePayment(Request $request, $id)
    {
        $hotel = \App\Hotel::findorfail($id);

        if ($request->has('payments')) {
            $hotel->payment = serialize($request->get('payments'));
        }
        else {
            $hotel->payment = null;
        }
        $hotel->co_day = $request->get('co_day');
        $hotel->co_payment= $request->get('co_payment');
        $hotel->save();

        if ($hotel->published) {
            $request->session()->flash('status', 'Амжилттай хадгаллаа');
            return redirect('admin/hotel/payment/'.$hotel->id);
        }
        return redirect('hotel/contract/'.$hotel->id);
    }

    public function createContract($id)
    {
        $terms = \App\Term::get();
        $latest = \App\Term::orderby('updated_at', 'desc')
            ->first();
        $hotel = \App\Hotel::findorfail($id);

        if ($hotel->co_day) {
            if ($hotel->published) {
                abort(404);
            }

            return view('hotel.createContract', [
                'hotel' => $hotel,
                'terms' => $terms,
                'latest' => $latest,
            ]);
        }

        return redirect('hotel/update/'.$hotel->id);
    }

    public function storeContract(Request $request, $id)
    {
        $hotel = \App\Hotel::findorfail($id);
        if ($hotel->published) {
            abort(404);
        }
        $hotel->published = true;
        $hotel->save();

        $request->session()->flash('status', 'Амжилттай хадгаллаа');

        return redirect('admin/hotel/'.$hotel->id);
    }
}