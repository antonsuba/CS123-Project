<!DOCTYPE html>
<html lang="en">

	<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">

			<title>{{ config('app.name') }}</title>
			
			<link href="/css/semantic.css" rel="stylesheet">
			<link href="/css/style.css" rel="stylesheet">
			<script src="/js/functionality.js">
			</script>
	</head>
	
	<body>
		<div class="ui one column centered grid stackable">
		
			<div class="ten wide column">
				<div class="ui grid centered aligned">
					
					<div class="three wide column multi-space" id="foodbtn">
						<button type="submit" class="btn btn-primary ui fluid basic button" onclick="redSelect('foodbtn')">
							Food
						</button>
					</div>
					
					<div class="three wide column multi-space" id="sportsbtn">
						<button type="submit" class="btn btn-primary ui fluid basic button" onclick="redSelect('sportsbtn')">
							Sports
						</button>
					</div>
					
					<div class="three wide column multi-space" id="leisurebtn">
						<button type="submit" class="btn btn-primary ui fluid basic button" onclick="redSelect('leisurebtn')">
							Leisure
						</button>
					</div>
						
				</div>
			</div>
			
			<div class="ten wide column">
				<div class="ui grid centered aligned">
					
					<div class="three wide column" id="clubbingbtn">
						<button type="submit" class="btn btn-primary ui fluid basic button" onclick="redSelect('clubbingbtn')">
							Clubbing
						</button>
					</div>
					
					<div class="three wide column" id="attractionsbtn">
						<button type="submit" class="btn btn-primary ui fluid basic button" onclick="redSelect('attractionsbtn')">
							Attractions
						</button>
					</div>
						
				</div>
			</div>
			
		</div>
	</body>
	
</html>