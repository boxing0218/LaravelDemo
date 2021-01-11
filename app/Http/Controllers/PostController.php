<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
    }

    public function index()
    {
        // if(is_null(Auth::user())){
        //     return redirect(route('login'));
        // }else{
        //     return view('posts.index', ['posts' => Post::cursor()]);
        // }
        $posts = Post::orderBy('id','desc')->paginate(4);
        return view('posts.index', ['posts' =>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(is_null(Auth::user())){
            return redirect(route('login'));
        }else{
            return view('posts.create');
        }
        // 只有登入用戶可以撰寫文章
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content = $request->validate([
            'title'=>'required',
            'content' =>'required'
        ]);
        $post = new Post;
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->subject_id = 0;
        $post->user_id = Auth::id();
        $post->save();
        return redirect(route('posts.index'));
        // 只有建立文章用戶可以編輯文章
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        // if(is_null(Auth::user())){
        //     return redirect(route('login'));
        // }else{

        // }
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // $user = Auth::user();
        // if(is_null($user) || $user->cannot('update', $post)){
        //     return redirect(route('posts.index'));
        // }
        $user = Auth::user();
        if(is_null($user) || $user->cant('update', $post)){

            // echo "<script language="JavaScript">;alert("这是");</script>;";
            // return redirect(route('posts.index'));
            echo "<script> alert('抱歉您不是此文章的編輯者!!');parent.location.href='http://localhost:8888/LaravelDemo/public/posts'; </script>";
        }
        return view('posts.edit', ['post' => $post]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $content = $request->validate([
            'title'=>'required',
            'content' =>'required'
        ]);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();
        return redirect(route('posts.show', ['post' => $post]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        return redirect(route('posts.index'));
    }
}
