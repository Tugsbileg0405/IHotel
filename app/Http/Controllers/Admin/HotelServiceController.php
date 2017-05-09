<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HotelService;
use App\HotelServiceCategory;

class HotelServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $category = HotelServiceCategory::findOrFail($id);
        $services = $category->services()
            ->orderby('created_at', 'desc')
            ->paginate(20);

        return view('admin.hotelservice.table', [
            'category' => $category,
            'services' => $services,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $category = HotelServiceCategory::findOrFail($id);

        return view('admin.hotelservice.create', [
            'category' => $category,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = new HotelService;
        $service->service_category_id = $request->get('category');
        $service->name = $request->get('name');
        $service->name_en = $request->get('name_en');
        $service->save();

        return redirect('profile/hotelservice/'.$service->service_category_id);
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
        $service = HotelService::findOrFail($id);

        return view('admin.hotelservice.update', [
            'service' => $service,
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
        $service = HotelService::findOrFail($id);
        $service->name = $request->get('name');
        $service->name_en = $request->get('name_en');
        $service->save();

        return redirect('profile/hotelservice/'.$service->service_category_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = HotelService::findOrFail($id);
        $service->hotels()->detach();
        $service->delete();

        return redirect('profile/hotelservice/'.$service->service_category_id);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $services = \App\HotelService::where('name', 'LIKE', '%' . $search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return response()->view('admin.hotelservice.search', [
            'services' => $services,
        ], 200);
    }
}
