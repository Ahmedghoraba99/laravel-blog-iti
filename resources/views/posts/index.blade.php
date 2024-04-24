@extends('layouts.app')
@section('title', 'Posts')

@section('main')
<button class="btn btn-success text-light d-block my-5 text-light ">
    <a class="text-light text-bold " href="{{ route('posts.create')}}">Create Post</a>
</button>

<br>
<br>
<table class="table table-striped m-1">
    <thead class="table-dark">
        <th>
            id
        </th>
        <th>
            title
        </th>
        <th>
            body
        </th>
        <th>
            author
        </th>
        <th>
            Edit
        </th>
        <th>
            delete
        </th>
    </thead>
    <tbody>

        @foreach ($posts as $post)
        <tr>
            <td>
                {{ $post["id"]}}
            </td>
            <td>
                {{ $post["title"]}}
            </td>
            <td>
                {{ $post["body"] }}
            </td>
            <td>
                {{ $post["author"] }}
            </td>
            <td>

                <a class="btn btn-warning text-light" href='http://localhost:8000/posts/{{ $post["id"] }}/edit'>Edit</a>
            </td>
            <td>
                <form action=" http://localhost:8000/posts/{{ $post["id"] }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger text-light" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

        <tr>

    </tbody>
</table>
<div class="my-2 w-25 d-flex justify-content-center mx-auto">@if ($previousPageUrl)
    <a class="btn btn-primary" href="{{ $previousPageUrl }}">Previous Page</a>
    @endif
    |||
    @if ($nextPageUrl)
    <a class="btn btn-primary" href="{{ $nextPageUrl }}">Next Page</a>
    @endif
</div>
@endsection