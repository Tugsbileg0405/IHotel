<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slide;
use Image;

class SlideController extends Controller
{
    public function index()
    {
        $slides = Slide::get();

        return view('admin.slide.table', [
            'slides' => $slides,
        ]);
    }

    public function storePhoto(Request $request)
    {
        $photo = $request->file('file');
        $path = 'img/uploads/slides/'.md5(microtime()).'.'.$photo->getClientOriginalExtension();
        Image::make($photo)->fit(1920, 1080)->save($path);

        $slide = new Slide;
        $slide->locale = $request->get('locale');
        $slide->photo = $path;
        $slide->save();

        return response()->view('admin.slide.photo', [
            'slide' => $slide,
        ], 200);
    }
    
    public function destroyPhoto($id)
    {
        $slide = Slide::findOrFail($id);
        $photo = $slide->photo;
        $slide->delete();

        \Storage::disk('public_path')->delete($photo);

        return response()->json([
            'success' => true,
        ], 200);
    }
}
