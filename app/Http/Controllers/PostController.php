<?php

namespace App\Http\Controllers;

// namespace Models\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\NewPostRequest;
use App\Models\Comment;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(5);
        $nextPageUrl = $posts->nextPageUrl();
        $previousPageUrl = $posts->previousPageUrl();

        return view('posts.index', [
            'posts' => $posts,
            'nextPageUrl' => $nextPageUrl,
            'previousPageUrl' => $previousPageUrl
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewPostRequest $request)
    {
        //
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = $request->user_id;
        $post->image = $request->image;
        $request->image->move(public_path('images'), $request->image->getClientOriginalName());
        // validate the data 
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // convert id to number
        $post = Post::find($id);
        $postComments = Comment::where('post_id', $id)->get();
        // dd($post);
        return view('posts.show', ['post' => $post, 'comments' => $postComments]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);

        if (!$post) {
            abort(404);
        }
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = $request->user_id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // delete the old image 
            Storage::delete('public/images/' . $post->image);
            // dd($request);
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $post->image = $imageName;
        }
        $post->save();

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $post = Post::find($id);
        $post->delete();
        Storage::delete('public/images/' . $post->image);

        redirect('/posts');
    }
}
