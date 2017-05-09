<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PickupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pickups = \App\Pickup::orderby('created_at', 'desc')
            ->paginate(20);

        return view('admin.pickup.table', [
            'pickups' => $pickups,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pickup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pickup = new \App\Pickup;
        $pickup->name = $request->get('name');
        $pickup->name_en = $request->get('name_en');
        $pickup->price = $request->get('price');
        $pickup->save();

        return redirect('profile/pickup');
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
        $pickup = \App\Pickup::findOrFail($id);

        return view('admin.pickup.update', [
            'pickup' => $pickup,
        ]);
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
        $pickup = \App\Pickup::findOrFail($id);
        $pickup->name = $request->get('name');
        $pickup->name_en = $request->get('name_en');
        $pickup->price = $request->get('price');
        $pickup->save();

        return redirect('profile/pickup');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pickup = \App\Pickup::findOrFail($id);
        $pickup->delete();

        return redirect('profile/pickup');
    }
}
