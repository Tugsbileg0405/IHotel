<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RoomCategory;

class RoomCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = RoomCategory::orderby('created_at', 'desc')
            ->paginate(20);

        return view('admin.roomcategory.table', [
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
        return view('admin.roomcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new RoomCategory;
        $category->name = $request->get('name');
        $category->name_en = $request->get('name_en');
        $category->save();

        return redirect('profile/roomcategory');
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
        $category = RoomCategory::findOrFail($id);

        return view('admin.roomcategory.update', [
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
        $category = RoomCategory::findOrFail($id);
        $category->name = $request->get('name');
        $category->name_en = $request->get('name_en');
        $category->save();

        return redirect('profile/roomcategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = RoomCategory::findOrFail($id);
        $category->delete();

        return redirect('profile/roomcategory');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $categories = \App\RoomCategory::where('name', 'LIKE', '%' . $search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return response()->view('admin.roomcategory.search', [
            'categories' => $categories,
        ], 200);
    }
}
