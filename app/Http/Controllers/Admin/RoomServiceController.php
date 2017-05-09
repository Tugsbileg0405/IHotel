<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RoomService;
use App\RoomServiceCategory;

class RoomServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $category = RoomServiceCategory::findOrFail($id);
        $services = $category->services()
            ->orderby('created_at', 'desc')
            ->paginate(20);

        return view('admin.roomservice.table', [
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
        $category = RoomServiceCategory::findOrFail($id);

        return view('admin.roomservice.create', [
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
        $service = new RoomService;
        $service->service_category_id = $request->get('category');
        $service->name = $request->get('name');
        $service->name_en = $request->get('name_en');
        $service->save();

        return redirect('profile/roomservice/'.$service->service_category_id);
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
        $service = RoomService::findOrFail($id);

        return view('admin.roomservice.update', [
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
        $service = RoomService::findOrFail($id);
        $service->name = $request->get('name');
        $service->name_en = $request->get('name_en');
        $service->save();

        return redirect('profile/roomservice/'.$service->service_category_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = RoomService::findOrFail($id);
        $service->rooms()->detach();
        $service->delete();

        return redirect('profile/roomservice/'.$service->service_category_id);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $services = \App\RoomService::where('name', 'LIKE', '%' . $search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return response()->view('admin.roomservice.search', [
            'services' => $services,
        ], 200);
    }
}
