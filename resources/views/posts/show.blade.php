@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('posts.index')}}" class="btn btn-info btn-sm mb-3 float-right" type="button">戻る</a>
        <form action="{{ route('posts.update', $post->id) }}" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <div class="form-group">
                <label for="exampleFormControlInput1">タイトル</label>
                <input type="text" name="title" readonly value="{{$post->title}}" class="form-control"
                       id="exampleFormControlInput1" placeholder="タイトル">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">本文</label>
                <textarea readonly name="body" class="form-control" id="exampleFormControlTextarea1" rows="3"
                          placeholder="本文">{{$post->body}}</textarea>
            </div>

        </form>


        <!---コメント---->
        <hr>
        <button class="btn btn-info btn-sm mb-3 float-right　d-inline-block" id="display-button" type="button">閉じる
        </button>

        <div class="mt-2 comment-form">
            <form action="{{ route('comments.store', $post->id) }}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="form-group">
                    <label for="exampleFormControlInput1">タイトル</label>
                    <input type="text" name="title" value="{{old('title')}}"
                           class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
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
        @foreach ($comments as $comment)
            <form action="{{route('comments.delete',[$comment->post_id, $comment->id])}}" method="post">
                @csrf
                @method('DELETE')
                <div class="card mt-2">

                    <div class="card-header">
                        <span class="title">{{ $comment->title }}</span>

                        <span class="float-right">投稿者：{{$comment->user['name']}}</span>
                        <span class="float-right mr-3">投稿日： {{$comment->created_at}}</span>
                    </div>
                    <div class="card-body  {{ $errors->has($comment->body) ? 'is-invalid' : '' }}">
                        {{ $comment->body }}
                        <div class="d-flex float-right">
                            <a href="{{route('comments.edit',[$comment->post_id,$comment->id])}}" class="btn btn-info btn-sm"
                               type="button">編集する</a>
                            <button type="submit" class="btn btn-danger btn-sm ml-2">削除</button>
                        </div>
                    </div>
                </div>
            </form>
        @endforeach
    </div>
@endsection

@section('js')
    <script>
        $(function () {
            $('#display-button').on('click', () => {
                const btn = $('#display-button');
                if (btn.text() === '閉じる') {
                    btn.text('開く');
                } else {
                    btn.text('閉じる');
                }
                $('.comment-form').toggleClass('d-none');
            })
        });
    </script>
@endsection
