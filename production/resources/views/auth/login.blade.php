<!DOCTYPE html>
<html lang="en">

	<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">

			<title>{{ config('app.name') }}</title>
			
			<link href="/css/style.css" rel="stylesheet">
			<link href="/css/semantic.css" rel="stylesheet">
	</head>
	
	<body>
	<div class="register-master-div ui centered one column middle aligned grid stackable">
		<form class="form-horizontal five wide column" role="form" method="POST" action="{{ url('/login') }}">
			{{ csrf_field() }}
			
			<div class="five wide column">
				<div class="seven wide column grid">
					<h1 class="head-font title-logo">
						<span class="color-yellow">W</span><span class="color-red">I</span><span class="color-blue">L</span><span class="color-green">D</span>
						CARD
					</h1>
				</div>
			<div class="ui grid centered aligned"> <!-- These 3 are used so that the buttons and inputs can be the same width as the standard width -->
			<div class="ten wide column">
			
				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

					<div class="ui fluid input multi-space input-squeeze-fix">
						<input placeholder="Name" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

						@if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						@endif
					</div>
				</div>

				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

					<div class="ui input fluid input-squeeze-fix">
						<input placeholder="Password" id="password" type="password" class="form-control" name="password" required>

						@if ($errors->has('password'))
							<span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
						@endif
					</div>
				</div>

				<div class="form-group grid multi-space">
					<div class="ui checkbox row">
							<input type="checkbox" name="remember"> 
							<label>Remember Me</label>
					</div>
				</div>

				<div class="form-group multi-space">
					<div class="row">
						<button type="submit" class="ui fluid button btn btn-primary">
							Login
						</button>

						<a class="btn btn-link" href="{{ url('/password/reset') }}">
							Forgot Your Password?
						</a>
					</div>
				</div>
				
			</div>
			</div>
			</div>
			
		</form>
	</div>
	</body>
</html>