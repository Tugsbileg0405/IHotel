<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Term;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terms = Term::orderby('created_at', 'asc')
            ->paginate(20);

        return view('admin.term.table', [
            'terms' => $terms,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.term.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $term = new Term;
        $term->title = $request->get('title');
        $term->title_en = $request->get('title_en');
        $term->content = $request->get('content');
        $term->content_en = $request->get('content_en');
        $term->save();

        return redirect('profile/term');
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
        $term = Term::findOrFail($id);

        return view('admin.term.update', [
            'term' => $term,
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
        $term = Term::findOrFail($id);
        $term->title = $request->get('title');
        $term->title_en = $request->get('title_en');
        $term->content = $request->get('content');
        $term->content_en = $request->get('content_en');
        $term->save();

        return redirect('profile/term');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $term = Term::findOrFail($id);
        $term->delete();

        return redirect('profile/term');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $terms = \App\Term::where('title', 'LIKE', '%' . $search . '%')
            ->orwhere('content', 'LIKE', '%' . $search . '%')
            ->orderBy('created_at', 'asc')
            ->paginate(20);

        return response()->view('admin.term.search', [
            'terms' => $terms,
        ], 200);
    }
}
