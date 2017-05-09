<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HotelServiceCategory;

class HotelServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = HotelServiceCategory::orderby('created_at', 'desc')
            ->paginate(20);

        return view('admin.hotelservicecategory.table', [
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
        return view('admin.hotelservicecategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new HotelServiceCategory;
        $category->name = $request->get('name');
        $category->name_en = $request->get('name_en');
        $category->save();

        return redirect('profile/hotelservicecategory');
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
        $category = HotelServiceCategory::findOrFail($id);

        return view('admin.hotelservicecategory.update', [
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
        $category = HotelServiceCategory::findOrFail($id);
        $category->name = $request->get('name');
        $category->name_en = $request->get('name_en');
        $category->save();

        return redirect('profile/hotelservicecategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = HotelServiceCategory::findOrFail($id);
        foreach ($category->services() as $service)
        {
            $service->hotels()->detach();
        }
        $category->services()->delete();
        $category->delete();

        return redirect('profile/hotelservicecategory');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $categories = \App\HotelServiceCategory::where('name', 'LIKE', '%' . $search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return response()->view('admin.hotelservicecategory.search', [
            'categories' => $categories,
        ], 200);
    }
}
