<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('subjects.index', ['subjects' => Subject::cursor()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(is_null(Auth::user())){
            return redirect(route('login'));
        }else{
            return view('subjects.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $content = $request->validate([
            'name' =>'required',
        ]);
        $subject = new Subject;
        $subject->name = $request->input('name');
        $subject->save();
        return redirect(route('subjects.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
        $post = DB::table('posts')->select('subject_id')->get();
        return view('subjects.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
        $user = Auth::user();
        if(is_null($user) || $user->cant('update', $subject)){

            // echo "<script language="JavaScript">;alert("这是");</script>;";
            // return redirect(route('posts.index'));
            echo "<script> alert('抱歉您不是此文章的編輯者!!');parent.location.href='http://localhost:8888/LaravelDemo/public/subjects'; </script>";
        }
        return view('subjects.edit', ['subject' => $subject]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        //
        $content = $request->validate([
            'name' =>'required'
        ]);
        $subject->name = $request->input('name');
        $subject->save();
        return redirect(route('subjects.show', ['subject' => $subject]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
        $subject->delete();
        return redirect(route('subjects.index'));
    }
}
