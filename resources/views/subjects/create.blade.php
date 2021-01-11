@extends('layouts.app')
@section('content')
    <h1 class="font-thin text-4xl px-2">新增類型</h1>
    @if($errors->any())
        <div class="bg-danger rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('subjects.store') }}" method="POST">
        @csrf
        <div class="field px-3">
            <label>類型:</label>
            <input type="text" value="{{old('name')}}" name="name" class="border border-dark">
            <input type="submit" value="送出文章">
        </div>
    </form>

@endsection
