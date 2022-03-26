<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable')->latest();
    }


    public function addComment($body)
    {
        $comment=new Comment();
        $comment->body=$body;
        $comment->user_id=auth()->user()->id;

        $this->comments()->save($comment);

        return $comment;
    }


}
