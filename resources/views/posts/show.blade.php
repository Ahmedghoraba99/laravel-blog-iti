@extends('layouts.app')
@section('title', 'Posts')

@section('main')
<h1 class="my-5 text-center ">{{ $post["title"] }}</h1>
<p class="text-center">By {{ $post->user->name }}</p>
<img class="d-block mx-auto" height="200" width="380" src="{{ asset('images/' . $post->image) }}" alt="">
<p class="text-center">{{ $post["body"]}}</p>
<br />
<!-- <button class="btn btn-primary" ><a href="add "></a></button> -->
<br />
<div class="w-75 container commnts-wrapper">

    <h3 class="my-5 text-center">Comments</h3>
    @foreach ($comments as $comment)
    <div class="card my-2 row">
        <div class="card-body col-10">
            <h5 class="card-title">{{ $comment->name }}</h5>
            <p class="card-text">{{ $comment->content }}</p>
            <p class="card-text">{{ $comment->created_at }}</p>
        </div>
    </div>
    <a class=" d-block btn btn-danger col-2" href="{{ route('comments.destroy' , $comment->id) }}" style=" z-index: index 99;">Delete</a>

    @endforeach

    <h3 class=" my-5"> Add Comment</h3>
    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <div class="form-group">
            <label for="body">Comment</label>
            <textarea class="form-control" id="body" name="content" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="body">name</label>
            <input type="hidden" class="form-control" id="name" name="name" rows="3" value="{{ Auth::user()->name }}"></input>
        </div>
        <!-- You might want to add fields for 'name' and 'content' here if needed -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection