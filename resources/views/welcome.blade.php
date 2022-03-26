
@extends('layouts.front')
@section('content')

    <div class="card text-white bg-light mt-2 mb-2">
        <div class="card-body">
            <h2>Welcome to Stack Overflow</h2>
            <p class="text-muted">Share queries and solutions to the community.</p>
            <p>
                <a class="btn btn-info btn-flat" href="">For Detail</a>
            </p>
        </div>
    </div>
    @include('partials._message')
    <div class="col-md-12 mt-2">
        <div class="card-body row">
            <div class="col-6 ">
                <h4>Discussion Forum</h4>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a class="btn btn-primary btn-flat" href="{{route('question.create')}}"> Ask Question</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card p-3">
                    <div class="card-title">
                        <h4>Top Questions</h4>
                    </div>
                       @include('question.question-list')
                    </div>
                </div>
            </div>
        </div>
       
    </div>
@endsection