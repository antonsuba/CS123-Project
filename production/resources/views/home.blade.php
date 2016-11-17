@extends('layouts.app')

@section('content')
<div class="ui grid centered">

    <div class="twelve wide column content-container">
    <div class="ui four column stackable grid cards">
        @foreach($suggestions as $suggestion)
        <div class="column">
            <div class="ui fluid card">
                <div class="img">
                    
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
        </div>
        @endforeach
    </div>
    </div>

</div>
@endsection

@section('scripts')

@endsection
