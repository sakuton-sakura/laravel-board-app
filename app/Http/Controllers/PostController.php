<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CreatePostRequest;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $data = Post::all();
        return view('posts.index', ['data' => $data]);
    }

    public function create(Request $request)
    {
        return view('posts.create');
    }


    public function add(CreatePostRequest $request)
    {
        Post::query()->create($request->validated());//バリデートしたものだけ登録


//    Post::query()->create([
//        'title' => $request->title,
//        'body' => $request->body,
//        'user_id' => $request->user_id,
//    ]);
//    $items = new Post;
//    $items->user_id = $request->user_id;
//    $items->title = $request->title;
//    $items->body = $request->body;
//    $items->save();
        return redirect('/board');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        $comments = Comment::where('post_id', $id)->get();
        return view('posts.show', ['post' => $post,'comments' => $comments]);
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', ['post' => $post]);
    }

    public function update($id, CreatePostRequest $request)
    {
        $post = Post::find($id);
        $post->update($request->validated());
        return redirect()->route('posts.index');
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->back();
    }
}
