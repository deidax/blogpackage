<form action="{{route('posts.store')}}" method="post">
    <input type="text" name="title">
    <textarea name="body" id="body-text" cols="30" rows="10"></textarea>
    <button type="submit">Save</button>
</form>