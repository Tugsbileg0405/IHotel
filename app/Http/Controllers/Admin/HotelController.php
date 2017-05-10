<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hotel;
use App\HotelCategory;
use App\HotelServiceCategory;
use App\RoomCategory;
use App\RoomServiceCategory;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::orderby('priority', 'desc')
            ->paginate(20);

        return view('admin.hotel.table', [
            'hotels' => $hotels,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hotel = \App\Hotel::findOrFail($id);
        $hotel->priority = $request->get('priority');
        $hotel->published = $request->get('published');
        $hotel->sale = $request->get('sale');
        $hotel->save();

        return redirect('profile/hotel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->services()->detach();
        foreach ($hotel->rooms as $room)
        {
            $room->sales()->delete();
            $room->closes()->delete();
            $room->services()->detach();
        }
        $hotel->rooms()->delete();
        $hotel->delete();

        return redirect('profile/hotel');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $hotels = \App\Hotel::where('name', 'LIKE', '%' . $search . '%')
            ->orderby('priority', 'desc')
            ->paginate(20);

        return response()->view('admin.hotel.search', [
            'hotels' => $hotels,
        ], 200);
    }
}
