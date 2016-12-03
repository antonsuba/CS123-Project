<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>
        
		<link href="/css/semantic.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">
    </head>

    <body class="landing-body">

        <div class="ui one column centered grid stackable middle aligned landing-master-div">
			<div class="seven wide column grid">
				<h1 class="title-logo">
					Wild Card
				</h1>
				
				<center>
				<button class="ui facebook button" onclick="location.href='auth/facebook'" type="button">
					<i class="facebook icon"></i>
					Log in with Facebook
				</button>
				</center>
			</div>
			
			<!--<div class="six wide column">
				<div class="ui grid centered">
					<div class="ten wide column">
						<button class="ui facebook button fluid" onclick="location.href='auth/facebook'" type="button">
						<i class="facebook icon"></i>
						Log in with Facebook
						</button>
						
						<div class="ui horizontal divider">Or</div>
						
						<form class="ui form error" role="form" method="POST" action="{{ url('/register') }}">
							{{ csrf_field() }}
							
							<div class="required field {{  $errors->has('name') ? 'error' : '' }}">
								<div class="ui input fluid">
									<input id="name" name="name" type="text" placeholder="Name" value="{{ old('name') }}">
								</div>
							</div>
							
							<div class="required field {{  $errors->has('email') ? 'error' : '' }}">
								<div class="ui input fluid">
									<input id="email" name="email" type="email" placeholder="Email" value="{{ old('email') }}">
								</div>
							</div>
								
							<div class="required field {{  $errors->has('password') ? 'error' : '' }}">
								<div class="ui input fluid">
									<input id="password" name="password" type="password" placeholder="Password">
								</div>
							</div>

							<div class="required field {{  $errors->has('password_confirmation') ? 'error' : '' }}">
								<div class="ui input fluid">
									<input id="password-confirm" name="password_confirmation" type="password" placeholder="Confirm Password">
								</div>
							</div>
							
							<button type="submit" class="ui button fluid">SIGN UP</button>
						</form>

						<div class="ui divider"></div>

						<p style="text-align:center">Already have an account? <a class="color-red" href="{{ url('/login') }}">Login</a></p>              
						
					</div>
				</div>		
			</div>-->
		</div>

    </body>
</html>
