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

    <body>

        <div class="ui one column centered grid stackable middle aligned landing-master-div">
			<div class="seven wide column grid">
				<h1 class="head-font title-logo">
					<span class="color-yellow">W</span><span class="color-red">I</span><span class="color-blue">L</span><span class="color-green">D</span>
					CARD
				</h1>
			</div>
			
			<div class="six wide column"> <!-- Note: higher # = wider inputs-->
				<div class="ui grid centered">
					<div class="ten wide column">
						<button class="ui facebook button fluid">
						<i class="facebook icon"></i>
						Log in with Facebook
						</button>
						
						<div class="ui horizontal divider">Or</div>
						
						<form class="ui form error" role="form" method="POST" action="{{ url('/register') }}">
							{{ csrf_field() }}
							<!--SIGN UP-->
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
			</div>
		</div>

    </body>
</html>
