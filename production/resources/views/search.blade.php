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
	<div class="search-master-div"> <!--Master div for search page-->
	
		<div class="ui left aligned grid title-mini-bar"><!-- Wild Card Title Bar -->
			<h1 class="head-font title-logo w-push">
				<span class="color-yellow title-mini">W</span><span class="color-red title-mini">I</span><span class="color-blue title-mini">L</span><span class="color-green title-mini">D</span>
				<span class="title-mini">CARD</span>
			</h1>
		</div>
		
		<div class="ui one column centered grid stackable"> <!-- Search Options -->
		
			<div class="ten wide column">
				<div class="ui grid centered aligned">
					
					<div class="three wide column multi-space " id="foodbtn">
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
					
					<div class="three wide column  multi-space" id="clubbingbtn">
						<button type="submit" class="btn btn-primary ui fluid basic button" onclick="redSelect('clubbingbtn')">
							Clubbing
						</button>
					</div>
					
					<div class="three wide column  multi-space" id="attractionsbtn">
						<button type="submit" class="btn btn-primary ui fluid basic button" onclick="redSelect('attractionsbtn')">
							Attractions
						</button>
					</div>
						
				</div>
			</div>
			
		</div>
		
		<div class="ui centered grid"> <!-- Suggestions portion -->
			<div class="ui centered grid"> <!-- Suggestion row -->
				<img src="https://66.media.tumblr.com/bfa47e1c03597c1eb6ce61f15c784b28/tumblr_o5y4goDBHm1ujiis3o1_1280.png" class="three wide column rounded ui image search-img">
				<img src="https://66.media.tumblr.com/bfa47e1c03597c1eb6ce61f15c784b28/tumblr_o5y4goDBHm1ujiis3o1_1280.png" class="three wide column rounded ui image search-img">
				<img src="https://66.media.tumblr.com/bfa47e1c03597c1eb6ce61f15c784b28/tumblr_o5y4goDBHm1ujiis3o1_1280.png" class="three wide column rounded ui image search-img">
				<img src="https://66.media.tumblr.com/bfa47e1c03597c1eb6ce61f15c784b28/tumblr_o5y4goDBHm1ujiis3o1_1280.png" class="three wide column rounded ui image search-img">
			</div>
		</div>
	</div>
	</body>
	
</html>