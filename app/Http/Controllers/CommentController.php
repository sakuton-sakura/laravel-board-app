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

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        return view('comments.edit', ['comment' => $comment]);
    }

    public function delete($id, $commentId)
    {
        $post = Post::findOrFail($id);
        $comment = $post->comments()->where('id', $commentId)->first();
        $comment->delete();
        return redirect()->back();
    }
}
