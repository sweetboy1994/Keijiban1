<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Post;
class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $user=Auth::user();
        $user_id=Auth::id();
        $post= \App\Post::findOrFail($request->id);
        if($post->user_id!==$user_id and $user->name!=='Admin'){
            return redirect('posts/error');
        }
       
           
        elseif( $user->name==='Admin'){
            return $next($request);
        }
        return $next($request);
        
    }
}
