<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comment = Comment::all();
        return view('comments.index',$comment);
    }

    public function show($id)
    {
    }

}
