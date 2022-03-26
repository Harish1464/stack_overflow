<div class="comment">
    @forelse($question->comments as $comment)
        <h6>{{$comment->body}}</h6>
        <lead>By: {{$comment->user->name}}</lead>
        <div class="d-flex w-100 justify-content-start">
                <a href="{{route('comment.edit', ['question'=>$question, 'comment'=>$comment])}}" class="p-2">Edit</a>            
                <a href="javascript:;" id="delete-btn" class="p-2"> <i class="fa fa-trash"></i> Delete</a>
                <form action="{{route('comment.delete', ['question'=>$question, 'comment'=>$comment])}}" method="delete"></form>
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