<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;
use App\Support\HTMLPurifier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __contruct(){
    //     $this->middleware('CheckUser')->only('destroy');
    // }
    public function index()
    {
        // $posts=Post::all();
        // $posts= DB::table('posts')->paginate(3);
        $id=Auth::id();
        
        $posts=Post::orderby('id','desc')->paginate(5);
        return view('posts.index',['posts'=>$posts]);
    }
    // public function person(){
        
    // }
    // public function everyone(){
    //     $id=Auth::id();
    //     $posts=Post::orderby('id','desc')->paginate(5);
    //     return view('posts.everyone',['posts'=>$posts]);
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SignupRequest $request)
    {
        $id=Auth::id();
        $user=Auth::user();
        $post= new Post();
        $data=['body'=>$request->body];
        // $post ->body =HTMLPurifier::clean($request ->body);
        $post ->body =strip_tags($request ->body);
        // $post ->body =HTMLentities($request ->body);
        $post ->user_id=$id;
        $post->user_name=$user->name;
        $count=DB::table('posts')->where('user_id',$id)->count();
        if($count > 3){
            return redirect()->to('/posts/post_error');
        }
        else{
        $post->save();
        Mail::to($user->email)->send(new SendMail($data));
        return redirect()->to('/posts/everyone');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $usr_id=$post->user_id;
        $user=DB::table('users')->where('id',$usr_id)->first();
        return view('posts.detail',['post'=>$post,'user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post= \App\Post::findOrFail($id);
        return view('posts.edit',['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(SignupRequest $request)
    {
        $id=$request->post_id;
        $post=Post::findOrFail($id);
        $post->body=strip_tags($request ->body);
        $post->save();
        return redirect()->to('/posts/everyone');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        
        $post= \App\Post::find($id);
        $post->delete();
        return redirect()->to('/posts/everyone');
    }
}
