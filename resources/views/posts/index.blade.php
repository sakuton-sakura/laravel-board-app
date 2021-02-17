@extends('layouts.app')

@section('content')
    <div class="container">

        <a href="{{route('posts.create')}}">
            <button class="btn btn-info btn-sm mb-3 float-right" type="button">作成する</button>
        </a>
        <table class="table">
            <th>タイトル</th>
            <th>本文</th>
            <th>ユーザー</th>
            <th>コメント</th>
            <th></th>
            <th></th>
            <th></th>
            @foreach($data as $dat)
                <tr>
                    <td>{{$dat->title}}</td>
                    <td>{{$dat->body}}</td>
                    <td>{{$dat->user_id}}</td>
                    <td></td>
                    <td>
                        <a href="{{route('posts.show', $dat->id)}}" class="btn btn-info btn-sm" type="button">詳細</a>
                    </td>
                    <td>
                        <a href="{{route('posts.edit',$dat->id)}}" class="btn btn-secondary btn-sm" type="button">編集</a>

                    </td>
                    <td>
                        <form action="{{route('posts.delete',$dat->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
