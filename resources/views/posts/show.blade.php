@extends('layouts.app')
@section('content')
    <h1 class="font-thin text-4xl px-2">文章內容</h1>
    <p class="px-4" style="font-size: 25px">{{ $post->title}}</p>

    <hr />

        <p class="px-4" style="font-size: 20px">{{ $post->content }}</p>

    <hr />
    <button onclick="location.href='{{route('posts.edit', $post)}}'">編輯文章</button>
    {{-- <button onclick="location.href='{{route('posts.index')}}'">列舉所有文章</button> --}}
@endsection

