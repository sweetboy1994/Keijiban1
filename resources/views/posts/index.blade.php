@extends('layouts.app')
@section('title','TOP page')

@section('content')
<div class="container">
    <div class="row pt-5">
        <div class="col-6" style="max-height: 50px;">
           
                <a href="{{ url('posts/person')}}" class="btn btn-primary btn-lg btn-block">個人投稿</a>
                </div>
                <div class="col-6 ">       
                <a href="{{ url('posts/everyone')}}" class="btn btn-success btn-lg btn-block">全員投稿</a>
                </div>




@guest
<p class="text-center"><strong>あなたはログインしていません。</strong></p>
@endguest
</div>

</div>
@endsection

