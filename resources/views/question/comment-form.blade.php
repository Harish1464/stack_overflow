<div class="comment-form">
    <form action="{{isset($comment)? route('comment.update', $comment): route('comment.store', $question)}}" method="post" role="form">
        @csrf
        <legend>Create comment</legend>
        <div class="form-group">
            <input type="text" class="form-control" name="body" id="" placeholder="Place your comment on this question" value="{{isset($comment)? $comment->body: old('body')}}">
        </div>
        <button type="submit" class="btn btn-primary mt-2">{{isset($comment)? 'Update ': 'Post'}} Comment</button>
    </form>
</div>