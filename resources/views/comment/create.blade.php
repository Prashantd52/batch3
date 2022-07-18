<form action="{{route('comment.store')}}" method="post">
    <div class="form-group">
        @csrf()
        @method('post')
        <textarea class="form-control" name="comment" id="comment" placeholder="Enter comment here" required></textarea>
        <input type="hidden" name="blog_id" value="{{$blog_id}}">
        <button type="submit">Save Comment</button>
    </div>
</form>