@extends('layouts.app')
@section('title', 'Add post')

@section('main')
<form class="form-group" action="/posts" method="POST" style="max-width: 500px; margin: 90px auto;">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Name</label>
        <input type="text" class="form-control" name="title" id="title">
    </div>
    <div class="mb-3">
        <label for="body" class="form-label">Body</label>
        <textarea class="form-control" name="body" id="body" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <label for="user_id" class="form-label">By</label>
        <input type="text" class="form-control" name="user_id" id="user_id">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">image</label>

        <input type="file" accept="image/*" class="form-control" name="image" id="image">
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
@endsection