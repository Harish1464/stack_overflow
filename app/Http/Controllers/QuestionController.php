<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Achievment;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions=Question::latest()->paginate(5);
        return view('welcome', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('question.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:10',
            'description'  => 'required|min:100',
        ]);

        //store
        $question = auth()->user()->questions()->create($request->all());

            if($question->count()==1){
                $achievment = Achievment::create([
                    'user_id' => auth()->user()->id,
                    'achievment_type_id' => 1,
                ]);
                return redirect()->route('forum-page')->with('achievment', 'Congratulation ! You got First Question Achievment.');
            }else{
                return redirect()->route('forum-page')->withSuccess('Question posted!');
            }    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return view('question.detail', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        return view('question.form', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $this-authorize('update', $question);
        $this->validate($request, [
            'title' => 'required|min:10',
            'description'  => 'required|min:100',
        ]);

        $question->update($request->all());

        // $question->tags()->attach($request->tags);

        //redirect
        return redirect()->route('forum-page')->withSuccess('Question updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $this-authorize('update', $question);
        $question->delete();
        return redirect()->route('question.index')->withError("Question deleted!");
    }

    public function paginate($items, $perPage = 4, $page = null)
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $total = count($items);
        $currentpage = $page;
        $offset = ($currentpage * $perPage) - $perPage ;
        $itemstoshow = array_slice($items, $offset, $perPage);
        return new LengthAwarePaginator($itemstoshow, $total, $perPage);
    }
}
