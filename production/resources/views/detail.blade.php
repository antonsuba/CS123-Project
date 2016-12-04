@extends('layouts.app')

@section('content')
<div class="ui grid centered">

	<div class="ten wide column content-container">
		<div class="ui relaxed grid">
			<div class="nine wide column">

			{{-- @php dd($details); @endphp --}}
				<h1>{{ $details[0]->name }}</h1>
				<p class="head-font">{{ $details[0]->city }} <div class="ui rating rating-star" data-rating="3" data-max-rating="5"></div></p>

				<div class="ui section divider"></div>

				<p>{{ $details[0]->description }}</p>

				<div class="ui section divider"></div>

				<h2>Itinerary</h2><br>
				<div class="ui grid">
					<div class="five wide column">
						<img class="ui small circular image" src="http://rochelleabella.com/wp-content/uploads/2016/01/IMG_9107.jpg">
					</div>
					<div class="ten wide column middle aligned">
						<h3><i>The Bunk</i></h3>
						<p>Enjoy a glass of beer with some indie music and a great view of the city</p>
					</div>
				</div>

				<div class="ui grid">
					<div class="five wide column">
						<img class="ui small circular image" src="https://scontent.cdninstagram.com/hphotos-xaf1/t51.2885-15/s640x640/sh0.08/e35/11925616_1047949228550818_1910383083_n.jpg">
					</div>
					<div class="ten wide column middle aligned">
						<h3><i>Finders Keepers</i></h3>
						<p>Get wasted with overpriced cocktails</p>
					</div>
				</div>
				
			</div>

			<div class="one wide column"></div>

			<div class="six wide column centered">
				<img class="ui huge image" src="{{ $details[0]->img_src }}"/>
			</div>
		</div>
	</div>

</div>

@endsection

@section('scripts')

<script type="text/javascript">
	$('.ui.rating').rating();
</script>

@endsection