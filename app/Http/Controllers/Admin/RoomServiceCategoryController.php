<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RoomServiceCategory;

class RoomServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = RoomServiceCategory::orderby('created_at', 'desc')
            ->paginate(20);

        return view('admin.roomservicecategory.table', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roomservicecategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new RoomServiceCategory;
        $category->name = $request->get('name');
        $category->name_en = $request->get('name_en');
        $category->save();

        return redirect('profile/roomservicecategory');
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
        $category = RoomServiceCategory::findOrFail($id);

        return view('admin.roomservicecategory.update', [
            'category' => $category,
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
        $category = RoomServiceCategory::findOrFail($id);
        $category->name = $request->get('name');
        $category->name_en = $request->get('name_en');
        $category->save();

        return redirect('profile/roomservicecategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = RoomServiceCategory::findOrFail($id);
        foreach ($category->services as $service)
        {
            $service->rooms()->detach();
        }
        $category->services()->delete();
        $category->delete();

        return redirect('profile/roomservicecategory');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $categories = \App\RoomServiceCategory::where('name', 'LIKE', '%' . $search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return response()->view('admin.roomservicecategory.search', [
            'categories' => $categories,
        ], 200);
    }
}
