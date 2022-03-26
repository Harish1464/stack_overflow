
<div class="list-group">
     @forelse($questions as $question)
        <a href="{{route('question.show', $question)}}" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">{{$question->title}}</h5>
            </div>
            <p class="mb-1">{!! str_limit($question->description,100) !!}</p>
            <small class="text-muted">{!! $question->description !!}</small><br>
            <small class="text-muted">Posted by: {{$question->user->name}} ({{$question->created_at->diffForHumans()}})</small>
        </a>
        <div class="d-flex w-100 justify-content-start">
            @can('update', $question)
                <a href="{{route('question.edit', $question)}}" class="p-2">Edit</a>            
                <a href="javascript:;" id="delete-btn" class="p-2"> <i class="fa fa-trash"></i> Delete</a>
                <form action="{{route('question.delete', $question)}}" method="delete"></form>
            @endcan
            <a href="" class="p-2">Share</a>
        </div>
    @empty
        <h5>No questions</h5>

    @endforelse
</div>
{!! $questions->render() !!}