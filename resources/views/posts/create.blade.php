@extends('layouts.app')
@section('content')
    <h1 class="font-thin text-4xl px-2">新增文章</h1>
    @if($errors->any())
        <div class="bg-danger rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="field px-3">
            <label>標題:</label>
            <input type="text" value="{{old('title')}}" name="title" class="border border-dark">
        </div>

        <div class="field px-3">
            <label>內容:
                <textarea name="content" cols="30" rows="10">{{old('content')}}</textarea>
            </label>
            <br>
            <input type="submit" value="送出文章">
        </div>


    </form>

@endsection
