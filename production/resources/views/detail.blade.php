@extends('layouts.app')

@section('content')

@php $detail =  $details[0]; @endphp

<div class="ui grid centered">

	<div class="ten wide column content-container">
		<div class="ui relaxed grid">
			<div class="nine wide column">

			{{-- @php dd($activities); @endphp --}}
				<h1>{{ $detail->name }}</h1>
				<p class="head-font">{{ $detail->city }} </p>
				<div class="ui quality rating rating-star" data-rating="{{ $detail->rating }}" data-max-rating="5"></div>
				<button id="invite-button" class="ui small button button-shaded right floated">Invite Friends</button>
				<button id="bookmark-button" class="ui small basic grey button right floated">Bookmark</button>

				<div class="ui section divider"></div>

				<p>{{ $detail->description }}</p>

				<div class="ui section divider"></div>

				<h2>Itinerary</h2><br>
				@foreach($activities as $activity)
				<div class="ui grid">
					<div class="five wide column">
						<img class="ui small circular image" src="{{ $activity->img_src }}">
					</div>
					<div class="ten wide column middle aligned">
						<h3><i>{{ $activity->name }}</i></h3>
						<p>{{ $activity->description }}</p>
					</div>
				</div>
				@endforeach
				
			</div>

			<div class="one wide column"></div>

			<div class="six wide column centered">
				<img class="ui huge image" src="{{ $details[0]->img_src }}"/>
				<div id=map style="height:50%;width=100%; margin-top:10%"><div>
			</div>
		</div>
	</div>

</div>

<!-- Invite Friends Modal -->
<div class="ui modal">
	<i class="close icon"></i>
	<div class="header">
    	Invite your friends
  	</div>
	<div class="content">
	@foreach($friendsList as $friend)
		<img class="ui circular image" src="{{ $friend['picture']['data']['url'] }}"/>
		<p>{{ 	$friend['name'] }}</p>
	@endforeach
	</div>
	
</div>

@endsection

@section('scripts')

<script type="text/javascript">

$(document).ready(function(){
	$('.ui.rating').rating();
	
	$('.ui.rating').click(function(){
		var suggestionID = {{$activities[0]->suggestion_id}};
		var score = $('.ui.rating').rating("get rating");
		
		$.ajax({
			dataType: 'json',
			type: "POST",
			url: "/bookmark/rate/",
			data: {"suggestionID": suggestionID,"score": score},
			success: function(msg){
				console.log(msg);
			}
		});
	});

	$('.ui.modal').modal('attach events', '#invite-button', 'show');

	$('#bookmark-button').click(function(){
		var suggestionID = {{ $activities[0]->suggestion_id }};
		$.ajax({
			dataType: 'json',
			type: "POST",
			url: "/bookmark/add",
			data: {suggestionID: suggestionID},
			success: function(msg){
				console.log(msg);
			}
		});
	});
});
	
</script>

@endsection