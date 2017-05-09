<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Information;
use Image;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = Information::orderby('created_at', 'asc')
            ->paginate(20);

        return view('admin.information.table', [
            'informations' => $informations,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.information.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $information = new Information;
        $information->title = $request->get('title');
        $information->title_en = $request->get('title_en');
        $information->subtitle = $request->get('subtitle');
        $information->subtitle_en = $request->get('subtitle_en');
        $information->content = $request->get('content');
        $information->content_en = $request->get('content_en');
        $information->image = $request->get('image');
        $information->save();

        return redirect('profile/information');
    }

    public function storePhoto(Request $request)
    {
        $image = $request->file('photo');
        $image_path = 'img/uploads/informations/'.md5(
            time().$image->getClientOriginalName()).'.'.$image->getClientOriginalExtension();

        Image::make($image)->fit(50, 50)->save($image_path);

        return response()->json([
            'image' => $image_path,
        ], 200);
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
        $information = Information::findOrFail($id);

        return view('admin.information.update', [
            'information' => $information,
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
        $information = Information::findOrFail($id);
        $information->title = $request->get('title');
        $information->title_en = $request->get('title_en');
        $information->subtitle = $request->get('subtitle');
        $information->subtitle_en = $request->get('subtitle_en');
        $information->content = $request->get('content');
        $information->content_en = $request->get('content_en');
        $information->image = $request->get('image');
        $information->save();

        return redirect('profile/information');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $information = Information::findOrFail($id);
        $information->delete();

        return redirect('profile/information');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $informations = \App\Information::where('title', 'LIKE', '%' . $search . '%')
            ->orwhere('subtitle', 'LIKE', '%' . $search . '%')
            ->orwhere('content', 'LIKE', '%' . $search . '%')
            ->orderBy('created_at', 'asc')
            ->paginate(20);

        return response()->view('admin.information.search', [
            'informations' => $informations,
        ], 200);
    }
}
