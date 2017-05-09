<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use Image;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::orderby('created_at', 'desc')
            ->paginate(20);

        return view('admin.comment.table', [
            'comments' => $comments,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.comment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->name = $request->get('name');
        $comment->name_en = $request->get('name_en');
        $comment->description = $request->get('description');
        $comment->description_en = $request->get('description_en');
        $comment->content = $request->get('content');
        $comment->content_en = $request->get('content_en');
        $comment->photo = $request->get('image');
        $comment->save();

        return redirect('profile/comment');
    }

    public function storePhoto(Request $request)
    {
        $image = $request->file('photo');
        $image_path = 'img/uploads/comments/'.md5(
            time().$image->getClientOriginalName()).'.'.$image->getClientOriginalExtension();

        Image::make($image)->fit(60, 60)->save($image_path);

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
        $comment = Comment::findOrFail($id);

        return view('admin.comment.update', [
            'comment' => $comment,
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
        $comment = Comment::findOrFail($id);
        $comment->name = $request->get('name');
        $comment->name_en = $request->get('name_en');
        $comment->description = $request->get('description');
        $comment->description_en = $request->get('description_en');
        $comment->content = $request->get('content');
        $comment->content_en = $request->get('content_en');
        $comment->photo = $request->get('image');
        $comment->save();

        return redirect('profile/comment');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect('profile/comment');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $comments = \App\Comment::where('name', 'LIKE', '%' . $search . '%')
            ->orwhere('description', 'LIKE', '%' . $search . '%')
            ->orwhere('content', 'LIKE', '%' . $search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return response()->view('admin.comment.search', [
            'comments' => $comments,
        ], 200);
    }
}
