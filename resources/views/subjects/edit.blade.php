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
    <form action="{{ route('subjects.update', [ 'subject' => $subject]) }}" method="POST" class="py-2 px-4">
        @method('PUT')
        @csrf
        <label>類型:</label>
            <input type="text" value="{{$subject->name}}" name="name" class="border border-dark">
        <br>
        <input type="submit" value="送出文章">
    </form>
    <form action="{{ route('subjects.destroy', [ 'subject' => $subject]) }}" method="POST" class="py-2 px-4">
        @method('DELETE')
        @csrf
        <input type="submit" value="刪除文章">
    </form>
@endsection

