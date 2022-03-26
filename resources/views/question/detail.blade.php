
@extends('layouts.front')
@section('content')
    @include('partials._message')

    <h3 class="m-3">{{$question->title}} - Details</h3>
    <div class="list-group p-2">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1">{{$question->title}}</h5>
        </div>
        <p class="mb-1">{!! str_limit($question->description,100) !!}</p>
        <small class="text-muted">{!! $question->description !!}</small><br>
        <small class="text-muted">Posted by: {{$question->user->name}} ({{$question->created_at->diffForHumans()}})</small>
        <div class="d-flex w-100 justify-content-start">
            @can('update', $question)
                <a href="{{route('question.edit', $question)}}" class="p-2">Edit</a>            
                <a href="javascript:;" id="delete-btn" class="p-2"> <i class="fa fa-trash"></i> Delete</a>
                <form action="{{route('question.delete', $question)}}" method="delete"></form>
            @endcan
            <a href="" class="p-2">Share</a>
        </div>

        <div class="comment">
            @forelse($question->comments as $comment)
                <h5>{{$comment->body}}</h5>
                <lead>{{$comment->user->name}}</lead>
                <div class="d-flex w-100 justify-content-start">
                        <a href="{{route('comment.edit', $comment)}}" class="p-2">Edit</a>            
                        <a href="javascript:;" id="delete-btn" class="p-2"> <i class="fa fa-trash"></i> Delete</a>
                        <form action="{{route('comment.delete', $comment)}}" method="delete"></form>
                </div>
                {{--reply to comment--}}
                @foreach($comment->comments as $reply )
                    <div class="small well text-info">
                        <p>{{$reply->body}}</p>
                        <lead>By: {{$reply->user->name}}</lead>
                    </div>
                    <div class="d-flex w-100 justify-content-start">
                        <a href="{{route('reply.edit', $reply)}}" class="p-2">Edit</a>            
                        <a href="javascript:;" id="delete-btn" class="p-2"> <i class="fa fa-trash"></i> Delete</a>
                        <form action="{{route('reply.delete', $reply)}}" method="delete"></form>
                </div>
                @endforeach   

            @empty
                <p>No comments</p>
            @endforelse
        </div>

        <br>

        <div class="comment-form">
            <form action="{{route('questioncomment.store', $question)}}" method="post" role="form">
                @csrf
                <legend>Create comment</legend>
                <div class="form-group">
                    <input type="text" class="form-control" name="body" id="" placeholder="Place your comment on this question">
                </div>
                <button type="submit" class="btn btn-primary mt-2">Comment</button>
            </form>
        </div>
    </div>
@endsection
