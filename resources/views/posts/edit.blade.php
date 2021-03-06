@extends('layouts.app')
@section('content')
    <h1 class="font-thin text-4xl px-2">編輯文章</h1>
    @if($errors->any())
        <div class="bg-danger rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('posts.update', [ 'post' => $post]) }}" method="POST" class="py-2 px-4">
        @method('PUT')
        @csrf
        <label>標題:</label>
            <input type="text" value="{{$post->title}}" name="title" class="border border-dark">
        <br>
        <label>內容:
            <textarea name="content">{{ $post->content }}</textarea>
        </label>
        <br>
        <input type="submit" value="送出文章">
    </form>
    <form action="{{ route('posts.destroy', [ 'post' => $post]) }}" method="POST" class="py-2 px-4">
        @method('DELETE')
        @csrf
        <input type="submit" value="刪除文章">
    </form>
@endsection

