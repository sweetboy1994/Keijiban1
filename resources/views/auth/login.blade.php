<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
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
       
			<div class="wrap-login100">
            
				<div class="login100-pic js-tilt" data-tilt>
					<img class="rounded-circle" src="{{ asset('logintest/images/img-02.jpg')}}" alt="IMG">
				</div>

				<form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
				@csrf	
                    <span class="login100-form-title">
						ログイン
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input id="email" class="input100 form-control @error('email') is-invalid @enderror " type="text" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
						
                        <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                        @error('email')
        
                    <span class="invalid-feedback" role="alert" style="font-size:10px">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                        
					</div>
                    

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input id="password" class="input100 form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" required autocomplete="current-password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
					</div>
					
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							ログイン
						</button>
					</div>
                    @if (Route::has('password.request'))
					<div class="text-center p-t-12">
						<span class="txt1">
							忘れた方
						</span>
						<a class="txt2" href="{{ route('password.request') }}">
						パスワード?
						</a>
					</div>
                    @endif

					<div class="text-center p-t-136">
						<a class="txt2" href="{{ route('register')}}">
							新規登録
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
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