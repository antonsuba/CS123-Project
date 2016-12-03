@extends('layouts.app')

@section('content')
<div class="ui grid centered">

	<div class="ten wide column content-container">
		<div class="ui relaxed grid">
			<div class="nine wide column">

			@php dd($details); @endphp
				<h1>{{ $details->name }}</h1>
				<p>{{ $details->city }}</p>

				<div class="ui section divider"></div>

				<p>{{ $details->description }}</p>

				<div class="ui section divider"></div>

				<h2>Itinerary</h2>
				
			</div>

			<div class="one wide column"></div>

			<div class="six wide column centered">
				<img class="ui huge image" src="{{ $details->img_src }}"/>
			</div>
		</div>
	</div>

</div>

@endsection