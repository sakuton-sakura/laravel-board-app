@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mt-2 comment-form">
            <div class="form-group">
                <label for="exampleFormControlInput1">タイトル</label>
                <input type="text" name="title" value="{{ $post->title }}" readonly
                       class="form-control"
                       id="exampleFormControlInput1" placeholder="タイトル">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">本文</label>
                <textarea name="body" readonly class="form-control"
                          id="exampleFormControlTextarea1" rows="3"
                          placeholder="本文">{{ $post->body }}</textarea>
            </div>
        </div>
        <hr>
        <div class="mt-2 comment-form">
            <form action="{{ route('comments.update', [$comment->post_id, $comment->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleFormControlInput1">タイトル</label>

                    <input type="text" name="title" value="{{ old('title', $comment->title) }}"
                           class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" placeholder="タイトル">
                    <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">本文</label>
                    <textarea name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" rows="3"
                              placeholder="本文">{{ old('body', $comment->body) }}</textarea>
                    <div class="invalid-feedback">{{ $errors->first('body') }}</div>
                </div>
                <button class="btn btn-secondary btn-block" type="submit">コメントを編集する</button>
            </form>
        </div>
    </div>
    </div>
@endsection
