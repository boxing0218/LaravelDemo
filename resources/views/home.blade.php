@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                </div>
            </div>
            <div style="text-align:center;background-color:#FFAC55;">
                <h1 class=" p-5">歡迎加入此留言板!!!</h1>
                <h1 class=" pb-5">請點擊Laravel回到主頁</h1>
            </div>
            {{-- <button onclick="location.href='{{route('posts.create')}}'">新增文章</button> --}}
            {{-- <button onclick="location.href='{{route('posts.index')}}'">列舉所有文章</button> --}}
        </div>
    </div>
</div>
@endsection
