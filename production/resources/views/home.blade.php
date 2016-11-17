@extends('layouts.app')

@section('content')
<div class="ui grid centered">

    <div class="twelve wide column content-container">
    <div class="ui four stackable cards">
        @foreach($suggestions as $suggestion)
        <div class="ui card">
            <div class="image">
                <img src="{{ $suggestion->img_src }}">
            </div>
            <div class="content card-content">
                <div class="header">
                    <span class="card-header">{{ $suggestion->name }}</span>
                </div>
                <div class="meta">
                    <span class="card-content">Rating: {{ $suggestion->rating }}</span>
                </div>
                <div class="description">
                    <span class="card-content"> {{ $suggestion->location }} </span>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    </div>

</div>
@endsection

@section('scripts')

@endsection
