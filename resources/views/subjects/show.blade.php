@extends('layouts.app')
@section('content')
    <h1 class="font-thin text-4xl px-2">分類內容</h1>

    <hr />

        {{-- <p class="px-4" style="font-size: 20px">{{ $subject->name }}</p> --}}

        @foreach ($post as $subject)
            <a href="http://localhost:8888/LaravelDemo/public/posts/{{$subject->id}}">
                <p class="px-4" style="font-size: 20px">{{ $subject->title ?? 'defaultUrl' }}</p>
            </a>

        @endforeach

        {{-- <p class="px-4" style="font-size: 20px">{{ $subject->post->id ?? 'defaultUrl' }}</p> --}}

        {{-- {{$posts = Models\Subject::find(1)->posts;}} --}}
        {{-- @foreach($subject as $post)

        <p class="px-3" style="font-size: 25px">{{ $post->title ?? 'defaultUrl' }}</p>
        <hr />
    @endforeach --}}

    <hr />
    <button onclick="location.href='http://localhost:8888/LaravelDemo/public/subjects'">編輯文章</button>
    <button onclick="location.href='{{route('subjects.index')}}'">文章分類</button>
@endsection

