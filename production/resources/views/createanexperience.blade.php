@extends('layouts.app')

@section('content')

<div class="ui grid centered">

    <div class="ten wide column grid content-container">
        <h1 class> Create an experience for others to try out </p>

        <div class="ui relaxed grid stackable">
            <div class="nine wide column">

                <form class="ui form">
                <div class="ui big form">
                    <div class="field">
                        <label>Give it a name</label>
                        <input type="text" placeholder="Rooftop Bar Hopping">
                    </div>
                    <div class="field">
                        <label>Where is it?</label>
                        <div class="ui selection dropdown">
                            <input type="hidden" name="location">
                            <i class="dropdown icon"></i>
                            <div class="default text">Manila</div>
                            <div class="menu">
                                @foreach($locations as $location)
                                    <div class="item" data-value="{{ $location->id }}">{{ $location->name }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Describe the experience</label>
                        <textarea rows="3" placeholder="Good memories and bad decisions"></textarea>
                    </div>
                    <button type="button" class="ui huge button button-shaded">Next</button>
                </div>
                </form>
                <!--<form class="ui form error" role="form" method="POST" action="{{ url('/register') }}">
                    {{ csrf_field() }}
                    
                    <div class="required field {{  $errors->has('name') ? 'error' : '' }}">
                        <label style="color:red;">Give it a name</label>
                        <div class="ui input fluid">
                            <input id="name" name="name" type="text" placeholder="Rooftop Bar Hopping" value="{{ old('name') }}">
                        </div>
                    </div>

                    <div class="required field {{  $errors->has('name') ? 'error' : '' }}">
                        <label>Where is it?</label>
                        <div class="ui input fluid">                        
                            <div class="ui selection dropdown">
                                <input type="hidden" name="location">
                                <i class="dropdown icon"></i>
                                <div class="default text">Manila</div>
                                <div class="menu">
                                    @foreach($locations as $location)
                                        <div class="item" data-value="{{ $location->id }}">{{ $location->name }}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </form>-->
                
            </div>
        </div>
    
    </div>

</div>

@endsection