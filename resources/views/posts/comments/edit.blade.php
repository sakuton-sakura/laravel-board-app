@extends('layouts.app')

@section('content')
    <div class="mt-2 comment-form">
        <form action="{{ route('comments.store', $comment->id) }}" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div class="form-group">
                <label for="exampleFormControlInput1">タイトル</label>
                <input type="text" name="title" value="{{old('title')}}" class="form-control
{{ $errors->has('title') ? 'is-invalid' : '' }}"
                       id="exampleFormControlInput1" placeholder="タイトル">
                <div class="invalid-feedback">{{ $errors->first('title') }}</div>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">本文</label>
                <textarea name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}"
                          id="exampleFormControlTextarea1" rows="3"
                          placeholder="本文">{{old('body')}}</textarea>
                <div class="invalid-feedback">{{ $errors->first('title') }}</div>
            </div>
            <button class="btn btn-block btn-secondary" type="submit">send</button>
        </form>
    </div>
@endsection
