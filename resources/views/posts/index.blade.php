
@extends('layouts.app')
@section('content')
    <div>
        <h1 class="font-thin text-4xl px-2">文章標題</h1>
        <button onclick="location.href='{{route('posts.create')}}'">新增文章</button>
    </div>

    <hr />
    @foreach($posts as $post)
        <a href="{{route('posts.show', $post)}}">
            <p class="px-3" style="font-size: 25px">{{ $post->title}}</p>
        </a>
        <p class="px-3">
            {{$post->created_at}} 由 {{$post->user->name ?? 'defaultUrl'}} 分享
        </p>
        <hr />
    @endforeach
    <div>
        {{$posts->links("pagination::bootstrap-4")}}
    </div>

@endsection




    {{-- @foreach($subjects as $subject)
        <a href="//localhost:8888/LaravelDemo/public/posts/{{$post->id}}">
            <p>{{ $post->content }}</p>
        </a>
        <hr />
    @endforeach --}}

    {{-- <script>
        $(document).ready(function(){
            $("p").on('click',function(){
                $(this).attr("href","//localhost:8888/LaravelDemo/public/posts/create");
            });
        });
    </script> --}}


