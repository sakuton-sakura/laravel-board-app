@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('posts.index')}}" class="btn btn-info btn-sm mb-3 float-right" type="button">戻る</a>
        <form action="{{ route('posts.update', $post->id) }}" method="post">
            @method('PUT')
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <div class="form-group">
                <label for="exampleFormControlInput1">タイトル</label>
                <input type="text" name="title" value="{{old('title',$post->title)}}"
                       class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                       id="exampleFormControlInput1" placeholder="タイトル">
                <div class="invalid-feedback">{{ $errors->first('title') }}</div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">本文</label>
                <textarea name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}"
                          id="exampleFormControlTextarea1" rows="3" placeholder="本文">{{old('body',$post->body)}}</textarea>
                <div class="invalid-feedback">{{ $errors->first('body') }}</div>
            </div>
            <button type="submit" class="btn btn-secondary btn-block">編集する</button>
        </form>


    </div>
@endsection
