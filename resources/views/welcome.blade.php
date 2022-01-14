<!DOCTYPE html>
<html lang="en">
<head>
	<title>Yu 掲示板</title>
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

	<div class="limiter">
		<div class="container-login100">
        <span class="login100-form-title" style="color:#f9f9f9; font-size:50px; font-weight:bold; margin-bottom:-85px;">
						掲示板
					</span>
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img class="rounded-circle" src="{{ asset('logintest/images/img-02.jpg')}}" alt="IMG">
				</div>

				<form class="login100-form validate-form">
				@csrf	
                    <span class="login100-form-title">
						Welcome to Yu's Keijiban
					</span>
                    @if (Route::has('login'))
                    @auth
					<div class="container-login100-form-btn">
                    <a href="{{ url('/home') }}" class="login100-form-btn ">ホーム</a>
					</div>
                    @else
					<div class="container-login100-form-btn">
					<a href="{{ route('login') }}" class="login100-form-btn">ログイン</a>	
					</div>
					@if (Route::has('register'))
					<div class="container-login100-form-btn">
                    <a href="{{ route('register') }}" class="login100-form-btn">新規登録</a>
					</div>
                    @endif
                    @endauth
                    @endif
                    <div class="container-login100-form-btn">
                        <a href="http://127.0.0.1:8000/posts/everyone" class="login100-form-btn" >投稿詳細</a>
					</div>
                    

					
				</form>
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