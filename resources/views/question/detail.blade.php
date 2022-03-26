
@extends('layouts.front')
@section('title')
    {{$question->title}} - Details
@endsection
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

        @include('question.comment-list')

        <br>

        @include('question.comment-form')
    </div>



@endsection
