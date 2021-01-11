@extends('layouts.app')
@section('content')
    <h1 class="font-thin text-4xl px-2">文章分類</h1>
    <hr />

    @foreach($subjects as $subject)
        <a href="{{route('subjects.show', $subject)}}">
            <p class="px-3" style="font-size: 25px">{{ $subject->name}}</p>
        </a>


        <hr />
    @endforeach
@endsection
