@extends('layouts.app')
@section('title','TOP page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-10 col-md-8 offset-1 offset-md-2">
            <table class="table">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <th colspan="3">内容</th>
                    </tr>

                    @foreach ($posts as $post)

                    <tr>
                        <td>{{ $post ->id}}</td>

                        <td><strong> {{ $post->user_name }}</strong></td>

                        <td>{!! nl2br(e($post ->body)) !!}</td>

                        <td>
                            <a href="{{ url('posts/'.$post->id)}}" class="btn btn-success">詳細</a>
                            @auth
                            @if($post->user_id===Auth::id() or Auth::user()->name==='Admin')
                            <form action="/posts/delete/{{$post->id}}" method="GET">
                                {{ csrf_field() }}

                                <input type="submit" value="削除" class="btn btn-danger post_del_btn">



                            </form>
                            @endif
                            @endauth
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
            @php
            $count=DB::table('posts')->count();
            @endphp

            <p>There are {{$count}} post in here</p>

            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    {{$posts->links()}}
                </ul>
            </nav>



            @guest
            <p class="text-center"><strong>あなたはログインしていません。</strong></p>
            @endguest
        </div>
    </div>

</div>
@endsection