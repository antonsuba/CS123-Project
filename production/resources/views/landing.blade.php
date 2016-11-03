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
	<!--Top-Mid Portion of the Page-->
        <div class="ui grid centered middle aligned stackable">
            <div class="seven wide column">
                <h1 class="head-font title-logo">
                    <span class="color-yellow">W</span><span class="color-red">I</span><span class="color-blue">L</span><span class="color-green">D</span>
                    CARD
                </h1>
            </div>
			
			<div class="five wide column">
                <div class="ui grid centered aligned">
                <div class="ten wide column">
                    <button class="ui facebook button fluid">
                    <i class="facebook icon"></i>
                    Facebook
                    </button>
                    
                    <div class="ui horizontal divider">Or</div>
                    
                    <!--SIGN UP-->
                    <div class="sign-up-group">
                        <div class="ui input fluid">
                            <input placeholder="NAME">
                        </div>
                    </div>
                    
                    <div class="sign-up-group">
                        <div class="ui input fluid">
                            <input placeholder="EMAIL">
                        </div>
                    </div>
                        
                    <div class="sign-up-group">
                        <div class="ui input fluid">
                            <input placeholder="PASSWORD">
                        </div>
                    </div>
                    
                    <div>
                        <button class="ui button fluid">SIGN UP</button>
                    </div>

                    <div class="ui divider"></div>
                    
			    </div>
			    </div>		
			</div>

        </div>

	    <!--"Sign in" Portion of the Page-->
		<div class="div-bottom-landing">
			<div class="already-text">
				<h2>
					Already Have An Account?
				</h2>
			</div>
			<div>
				<button class="ui button login-button">Login</button>
			</div>
		</div>
    </body>
</html>
