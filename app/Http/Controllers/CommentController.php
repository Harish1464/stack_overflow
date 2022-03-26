<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Question;
use Illuminate\Http\Request;

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

        // $question->addComment($request->body);
        // $question->user->notify(new RepliedToQuestion($question));
        return back()->withSuccess('comment posted');
    }

    public function addReplyComment(Request $request, Comment $comment)
    {
        $this->validate($request,[
            'body'=>'required'
        ]);

        $comment->addComment($request->body);

        return back()->withSuccess('Reply posted');
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

        return back()->withMessage('updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if($comment->user_id !== auth()->user()->id)
            abort('401');

        $comment->delete();

        return back()->withMessage('Deleted');
    }
}
