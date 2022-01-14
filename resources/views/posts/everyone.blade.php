<!DOCTYPE html>
<html lang="en">

<head>
    <title>全員投稿</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('logintest/images/icons/favicon.ico')}}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('logintest/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('logintest/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('logintest/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('logintest/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('logintest/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('logintest/css/util.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('logintest/css/post.css')}}">
    <!--===============================================================================================-->
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex" href="{{ url('/home') }}">
                    <div><img src="/svg/Yukeijiban.svg" style="height:25px; border-right:2px; " class="pr-3"></div>
                    <div class="pl-3">Yu 掲示板</div>

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @auth
                        <a href="/posts/create" class="btn btn-outline-primary">新規投稿</a>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('登録') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown d-flex">
                            <div class="pt-2">こんにちは!</div>
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('home')}}">{{__('ホーム')}} </a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('ログアウト') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>

    <div class="container">
        <div class="row ">
            <h3>全員投稿</h3>
        </div>
    </div>
    <div class="container mt-1 d-flex justify-content-center">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <ul class="list-unstyled" style="margin-top:-52px;">

                        <!--FOURTH LIST ITEM-->
                        @foreach($posts as $post)
                        <li class="media my-5" style="height:100px;"> <span class="round"><img src="https://img.icons8.com/office/100/000000/user-group-man-man--v1.png" class="align-self-start mr-3"></span>
                            <div class="media-body">
                                <div class="row d-flex">
                                    <h6 class="user"> {{ $post->user_name }}</h6>

                                </div>
                                <div class="row d-flex">
                                    <a href="{{ url('posts/'.$post->id)}}" class="btn btn-success">詳細</a>
                                    @auth
                                    @if($post->user_id===Auth::id() or Auth::user()->name==='Admin')
                                    <form action="/posts/delete/{{$post->id}}" method="GET">
                                        {{ csrf_field() }}
                                        <input type="submit" value="削除" class="btn btn-danger post_del_btn">
                                    </form>
                                    @endif
                                    @endauth
                                </div>
                                <p class="text" style="width:300px;">{!! nl2br(e($post ->body)) !!}</p>
                            </div>
                        </li>
                        @endforeach
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

                    </ul>
                </div>
            </div>
        </div>
    </div>



    <!--===============================================================================================-->
    <script src="{{ asset('logintest/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('logintest/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{ asset('logintest/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('logintest/vendor/select2/select2.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('logintest/vendor/tilt/tilt.jquery.min.js')}}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('logintest/js/main.js')}}"></script>
    @include('layouts.app_script')
</body>

</html>