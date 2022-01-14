<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('logintest/images/icons/favicon.ico')}}"/>
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
	<link rel="stylesheet" type="text/css" href="{{ asset('logintest/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body>
<div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex" href="{{ url('/home') }}">
                    <div><img src="/svg/Yukeijiban.svg" style="height:25px; border-right:2px solid #333; " class="pr-3"></div>
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
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
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

	<div class="limiter">
		<div class="container-login100">
        <span class="login100-form-title" style="color:#f9f9f9; font-size:50px; font-weight:bold">
						HOME
					</span>
			<div class="wrap-login100" style="margin-bottom:68px">
				
				<form class="login100-form validate-form">	
                    <span class="login100-form-title">
						Welcome to Yu's Keijiban
					</span>

                    <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    </div>
                    <div class="container-login100-form-btn">
                        <a href="http://127.0.0.1:8000/posts/person" class="login100-form-btn" style="background:#cd7807" >個人投稿</a>
					</div><div class="container-login100-form-btn">
                        <a href="http://127.0.0.1:8000/posts/everyone" class="login100-form-btn" style="background: #c5ba15" >全員投稿
                        </a>
					</div>
                    

					
				</form>
                <div class="login100-pic js-tilt" data-tilt>
					<img style="heigth:40px" class="rounded-circle" src="{{ asset('logintest/images/img-03.jpg')}}" alt="IMG">
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
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="{{ asset('logintest/js/main.js')}}"></script>

</body>
</html>