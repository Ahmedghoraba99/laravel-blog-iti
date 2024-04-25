<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
// use App\Http\Resources\PostResource;
use App\Http\Requests\NewPostRequest;
use App\Http\Resources\PostResource;

// use App\Http\Controllers\PostController;
class PostController extends Controller
{
    function index()
    {
        $posts = Post::with('user')->paginate("5");
        return PostResource::collection($posts);
        // return Post::all();
    }

    function show($id)
    {
        if (!$post = Post::find($id)) {
            return response()->json(['message' => 'Post not found'], 404);
        }
        return new PostResource($post);
    }

    function store(NewPostRequest $request)
    {
        $validated = $request->validated();
        $validated = $request->validated();
        $post = new Post();
        $post->fill($validated);
        return response()->json($post, 201);
    }



    function update(Request $request, Post $post)
    {
        $post->update($request->all());
        return $post;
    }

    function destroy($id)
    {
        if (!$post = Post::find($id)) {
            return response()->json(['message' => 'Post not found'], 404);
        }
        $post->delete();
        return $post;
    }
}
