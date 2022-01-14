<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class AdminController extends Controller
{   
    function __construct(){
        $this->middleware('CheckAge')->only('index');
    }
    function index(){
        return view('posts/person');
    }
    function show(){
        return view('posts/person');
    }
    function dashboard(){
        $users=Auth::user();
        return $users->role->name;

    }
    function person(){
        $id=Auth::id();
        $posts=Post::orderby('id','desc')->where('user_id',$id)->paginate(4);
        return view('posts.person',['posts'=>$posts]);

    }
    function everyone(){
        $id=Auth::id();
        $posts=Post::orderby('id','desc')->paginate(4);
        return view('posts.everyone',['posts'=>$posts]);
    }
    function error(){
        return view('posts.error');
    }
    function posterror(){
        return view('posts.post_error');
    }
    function sendmail(){
        // Mail::to('stick.inlove.withyou9x@gmail.com')->send(new SendMail);
        return redirect('/home');
    }
    function test(){
        return view('posts.test');
    }
}
