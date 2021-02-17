@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('posts.update', $post->id) }}" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <div class="form-group">
                <label for="exampleFormControlInput1">タイトル</label>
                <input type="text" name="title" readonly value="{{$post->title}}" class="form-control" id="exampleFormControlInput1" placeholder="タイトル">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">本文</label>
                <textarea readonly name="body" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="本文">{{$post->body}}</textarea>
            </div>
            <a href="{{route('posts.index')}}" class="btn btn-secondary btn-block">一覧へ戻る</a>
        </form>
    </div>
@endsection
