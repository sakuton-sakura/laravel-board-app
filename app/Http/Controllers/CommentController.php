<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        $savedata = [
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $request->user_id,
            'post_id' => $request->post_id,
        ];

        $comment = new Comment;

        $comment->fill($savedata)->save();

        return redirect('/board')->with('poststatus', '新規投稿しました');
    }

    public function edit($id, $commentId)
    {
        $post = Post::findOrFail($id);
        $comment = Comment::findOrFail($commentId);
        return view('comments.edit', ['comment' => $comment,'post' => $post]);
    }

    public function update(Request $request, $id, $commentId)
    {
        $post = Post::findOrFail($id);
        $comment = $post->comments()->findOrFail($commentId);
        $comment->title = $request->title;
        $comment->body = $request->body;
        $comment->save();
        return redirect()->route('posts.index');
    }

    public function delete($id, $commentId)
    {
        $post = Post::findOrFail($id);
        $comment = $post->comments()->where('id', $commentId)->first();
        $comment->delete();
        return redirect()->back();
    }

}
