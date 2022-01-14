@extends('layouts.app')
@section('title','detail page')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-10 col-md-6 offset-1 offset-md-3">
            <div class="card">
                <div class="card-header">
                    {{ $post->id}}
                </div>
                <div class="card-body">
                    <p class="cart-text">{{ $post->body}}</p>
                    <div class="card-footer bg-transparent"><span class="font-weight-bold">書いた人: </span> {{ $user->name}} </div>
                    <div class="card-footer bg-transparent"><span class="font-weight-bold">書いた時間: </span> {{ $post->created_at}} </div>
                    <div class="card-footer bg-transparent"><span class="font-weight-bold">編集した時間: </span> {{ $post->updated_at}} </div>
                    
                    @auth     
                    @if($post->user_id===Auth::id() or Auth::user()->name==='Admin')
                    <a href="{{ url('posts/edit/'.$post->id) }}" class="btn btn-dark">編集する</a>
                    @endif
                    @endauth
                   
                   
                   
</div>
</div>
</div>
</div>
</div>
@endsection    
 