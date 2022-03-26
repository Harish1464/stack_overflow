@extends('layouts.app')

@section('content')
<div class="row justify-content-center p-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                {{ __('Dashboard') }}
                <div class="col-12 d-flex justify-content-end">
                    <a class="btn btn-primary btn-flat" href=""> Ask Question</a>
                </div>
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{ __('You are logged in!') }}
            </div>
        </div>
    </div>
</div>
@endsection
