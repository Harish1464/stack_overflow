<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Question;
use App\Models\Achievment;
use Illuminate\Http\Request;
use Auth;

class CommentController extends Controller
{
    public function addQuestionComment(Request $request, Question $question)
    {
        $this->validate($request,[
            'body'=>'required'
        ]);
        $comment=new Comment();
        $comment->body=$request->body;
        $comment->user_id=auth()->user()->id;
        $question->comments()->save($comment);
        $comment_count = $question->comment_count+1;
        $question->comment_count=$comment_count;
        $question->update();
        if (Auth::check()) {
            // dd($question->comment_count);
            if($question->comment_count == 1){
                $achievment = Achievment::create([
                    'user_id' => auth()->user()->id,
                    'achievment_type_id' => 2,
                ]);
                return back()->with('achievment', 'Congratulation ! You got First Comment Achievment.');
            }elseif ($question->comment_count == 5) {
                $achievment = Achievment::create([
                    'user_id' => auth()->user()->id,
                    'achievment_type_id' => 3,
                ]);
                return back()->with('achievment', 'Congratulation ! You got Fifth Comment Achievment.');
            }elseif ($question->comment_count == 10) {
                $achievment = Achievment::create([
                    'user_id' => auth()->user()->id,
                    'achievment_type_id' => 4,
                ]);
                return back()->with('achievment', 'Congratulation ! You got Tenth Comment Achievment.');
            } else{
                return back()->withSuccess('comment posted');                
            }
        }else{
            return back()->withSuccess('comment posted');
        }      
        
    }

    public function addReplyComment(Request $request, Comment $comment)
    {
        $this->validate($request,[
            'body'=>'required'
        ]);

        $comment->addComment($request->body);

        return back()->withSuccess('Reply posted');
    }

    
    public function edit(Question $question, Comment $comment)
    {
        if($comment->user_id !== auth()->user()->id)
            abort('401');
        $data['question'] = $question;
        $data['comment'] = $comment;
        return view('question.detail', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        if($comment->user_id !== auth()->user()->id)
            abort('401');

        $this->validate($request,[
            'body'=>'required'
        ]);
        $comment->update($request->all());
        return redirect()->back()->withSuccess('Comment updated !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question, Comment $comment)
    {
        if($comment->user_id !== auth()->user()->id)
            abort('401');


        $comment_count = $question->comment_count-1;
        $question->comment_count=$comment_count;
        $question->update();
        $comment->delete();

        return back()->withError('Comment Deleted !!');
    }
}
