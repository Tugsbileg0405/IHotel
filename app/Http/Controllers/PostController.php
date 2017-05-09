<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\PostCategory;
use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = \Auth::user()->posts()
            ->orderby('created_at', 'asco')
            ->paginate(5);

        return view('profile.showPosts', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = PostCategory::get();

        return view('profile.createPost', [
            'categories' => $categories,
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
        $post = new Post;
        $post->user_id = Auth::user()->id;
        $post->post_category_id = $request->get('category');
        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->excerpt = $request->get('excerpt');
        $post->photos = serialize($request->get('photos'));
        $post->save();

        return redirect('profile');
    }

    public function storePhoto(Request $request)
    {
        $image = $request->file('photo');
        $image_path = 'img/uploads/posts/'.md5(
            time().$image->getClientOriginalName()).'.'.$image->getClientOriginalExtension();

        Image::make($image)->fit(1024, 680)->save($image_path);

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
        $post = Post::findOrFail($id);
        $categories = PostCategory::get();

        if ($post->user_id == Auth::user()->id)
        {
            return view('profile.updatePost', [
                'post' => $post,
                'categories' => $categories,
            ]);
        }

        return redirect('profile');
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
        $post = Post::findOrFail($id);

        if ($post->user_id == Auth::user()->id)
        {
            $post->post_category_id = $request->get('category');
            $post->title = $request->get('title');
            $post->content = $request->get('content');
            $post->excerpt = $request->get('excerpt');
            $post->photos = serialize($request->get('photos'));
            $post->save();
        }

        return redirect('profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        
        if ($post->user_id == Auth::user()->id)
        {
            $post->delete();
            return back();
        }

        return redirect('profile');
    }
}
