<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Question;

class QuestionController extends Controller
{
    public function __construct()
    {
        View::share([
            'page_name'=> 'question',
        ]); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::orderby('created_at', 'asc')
            ->paginate(20);

        return view('admin.question.table', [
            'questions' => $questions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = new Question;
        $question->question = $request->get('question');
        $question->question_en = $request->get('question_en');
        $question->answer = $request->get('answer');
        $question->answer_en = $request->get('answer_en');
        $question->save();

        return redirect('profile/question');
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
        $question = Question::findOrFail($id);

        return view('admin.question.update', [
            'question' => $question,
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
        $question = Question::findOrFail($id);
        $question->question = $request->get('question');
        $question->question_en = $request->get('question_en');
        $question->answer = $request->get('answer');
        $question->answer_en = $request->get('answer_en');
        $question->save();

        return redirect('profile/question');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect('profile/question');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $questions = \App\Question::where('question', 'LIKE', '%' . $search . '%')
            ->orwhere('answer', 'LIKE', '%' . $search . '%')
            ->orderBy('created_at', 'asc')
            ->paginate(20);

        return response()->view('admin.question.search', [
            'questions' => $questions,
        ], 200);
    }
}
