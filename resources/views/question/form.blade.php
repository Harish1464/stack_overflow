
@extends('layouts.front')
@section('content')
    <div class="col-md-12 mt-2">
        <h3 class="p-5">Ask a public questions</h3>
        <div class="row mt-5">
            <div class="col-lg-12">
                @include('partials._message')
                <div class="card p-3">
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="POST" action="{{isset($question)? route('question.update', $question): route('question.store')}}">
                                @csrf
                                <div class="form-group mt-3 ">
                                    <label>Title <code>*</code></label>
                                    <p class="text-muted pb-3">Be specific and imagine you’re asking a question to another person</p>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Eg. Express your problem in simple words." value="{{isset($question)? $question->title: old('title')}}" required>
                                    @error('title') 
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-3">
                                    <label class="pb-3">Body <code>*</code></label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"  style="row:10" placeholder="Say your problem throughly">{!! isset($question)? $question->description: old('description') !!}</textarea>
                                    @error('description') 
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-3 ">
                                    <label>Tag <code>*</code></label>
                                    <input type="text" name="tag" class="form-control @error('tag') is-invalid @enderror" placeholder="Tag determines your question's category." value="{{isset($question)? $question->tag: old('tag')}}" required>
                                    @error('tag') 
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary pull-left mt-4">{{isset($question)? 'Update question': 'Post Your Question To Forum'}} </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
@endsection
@push('scripts')
    {{-- CKEditor CDN --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
        .create( document.querySelector( '#description' ) )
        .then( editor => {
            editor.ui.view.editable.element.style.height = '300px';
        } )
        .catch( error => {
        console.error( error );
        } );
    </script>
@endpush