@extends('layouts.app')
@section('title', 'Edit Post')
@section('main')

<form action="/posts/{{$post['id']}}" method="POST" enctype="multipart/form-data" style="max-width: 500px; margin: 100px auto;">
    @csrf
    @method('PUT')

    <div style="margin-bottom: 10px;">
        <label for="title">Name</label><br>
        <input type="text" name="title" id="title" value='{{$post["title"] }}' style="width: 100%; padding: 5px;">
    </div>
    <div style="margin-bottom: 10px;">
        <label for="body">Body</label><br>
        <textarea name="body" id="body" style="width: 100%; padding: 5px;">{{ $post["body"] }}</textarea>
    </div>
    <div style="margin-bottom: 10px;">
        <label for="author">By</label><br>
        <input type="text" name="user_id" id="author" value='{{$post["author"]}}' style="width: 100%; padding: 5px;">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">image</label>
        <input type="file" accept="image/*" class="form-control" name="image" id="image">
    </div>
    <button type="submit" style="padding: 10px; background-color: #007bff; color: #fff; border: none; cursor: pointer;">Edit Post</button>
</form>
@endsection