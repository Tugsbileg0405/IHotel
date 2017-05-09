<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PostCategory;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = PostCategory::orderby('created_at', 'desc')
            ->paginate(20);

        return view('admin.postcategory.table', [
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
        return view('admin.postcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new PostCategory;
        $category->name = $request->get('name');
        $category->name_en = $request->get('name_en');
        $category->save();

        return redirect('profile/postcategory');
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
        $category = PostCategory::findOrFail($id);

        return view('admin.postcategory.update', [
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
        $category = PostCategory::findOrFail($id);
        $category->name = $request->get('name');
        $category->name_en = $request->get('name_en');
        $category->save();

        return redirect('profile/postcategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = PostCategory::findOrFail($id);
        $category->delete();

        return redirect('profile/postcategory');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $categories = \App\PostCategory::where('name', 'LIKE', '%' . $search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return response()->view('admin.postcategory.search', [
            'categories' => $categories,
        ], 200);
    }
}
