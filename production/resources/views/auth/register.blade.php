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
	<div class="register-master-div ui centered one column stackable grid">
	
		<div class="five wide column middle aligned">
			<div class="seven wide column grid">
				<h1 class="head-font title-logo">
					<span class="color-yellow">W</span><span class="color-red">I</span><span class="color-blue">L</span><span class="color-green">D</span>
					CARD
				</h1>
			</div>
		<div class="ui grid centered aligned"> <!-- These 3 are used so that the buttons and inputs can be the same width as the standard width -->
		<div class="ten wide column">
		
			<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

				<div class="ui input fluid multi-space">
					<input placeholder="Name" id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

					@if ($errors->has('name'))
						<span class="help-block">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

				<div class="ui input fluid">
					<input placeholder="Email" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

					@if ($errors->has('email'))
						<span class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

				<div class="ui input fluid multi-space">
					<input placeholder="Password" id="password" type="password" class="form-control" name="password" required>

					@if ($errors->has('password'))
						<span class="help-block">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

				<div class="ui input fluid go-away-regbtn">
					<input placeholder="Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

					@if ($errors->has('password_confirmation'))
						<span class="help-block">
							<strong>{{ $errors->first('password_confirmation') }}</strong>
						</span>
					@endif
				</div>
			</div>

			<div class="form-group multi-space">
				<button type="submit" class="btn btn-primary ui fluid button max-button">
					Register
				</button>
			</div>

		</div>
		</div>
		</div>
		
	</div>
	</body>
</html>