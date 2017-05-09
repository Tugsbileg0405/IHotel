<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HotelCategory;

class HotelCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = HotelCategory::orderby('created_at', 'desc')
            ->paginate(20);

        return view('admin.hotelcategory.table', [
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
        return view('admin.hotelcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new HotelCategory;
        $category->name = $request->get('name');
        $category->name_en = $request->get('name_en');
        $category->save();

        return redirect('profile/hotelcategory');
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
        $category = HotelCategory::findOrFail($id);

        return view('admin.hotelcategory.update', [
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
        $category = HotelCategory::findOrFail($id);
        $category->name = $request->get('name');
        $category->name_en = $request->get('name_en');
        $category->save();

        return redirect('profile/hotelcategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = HotelCategory::findOrFail($id);
        $category->hotels()->delete();
        $category->delete();

        return redirect('profile/hotelcategory');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $categories = \App\HotelCategory::where('name', 'LIKE', '%' . $search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return response()->view('admin.hotelcategory.search', [
            'categories' => $categories,
        ], 200);
    }
}
