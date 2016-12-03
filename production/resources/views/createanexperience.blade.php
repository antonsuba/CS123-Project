@extends('layouts.app')

@section('content')

<div class="ui grid centered">

    <div class="ten wide column grid content-container">

        <div class="ui relaxed grid stackable">
            <div class="row">
                <h1 id="prompt-header">Create an experience for others to try out</h1>
            </div>

            <div class="nine wide column">

                <form class="ui form">
                <div id="setup" class="ui big form ">
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
                    <a href="/home" class="head-font"><i class="left floated arrow left icon"></i>Back</a>
                    <button id="next-button-setup" type="button" class="ui huge button button-shaded right floated">Next</button>
                </div>
                
                <div id="add-itinerary" class="ui big form" style="display: none;">
                    <div class="field">
                        <label>Add Itinerary</label>
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
                    <a id="back-button-itinerary" class="head-font"><i class="left floated arrow left icon"></i>Back</a>
                    <button id="next-button-itinerary" type="button" class="ui huge button button-shaded right floated">Post!</button>
                </div>
                </form>
                
            </div>
        </div>
    
    </div>

</div>

@endsection

@section('scripts')
    
<script type="text/javascript">

$(document).ready(function(){
    $("#next-button-setup").click(function(){
        $("#setup").hide();
        $("#add-itinerary").show();
        $("#prompt-header").html("Let's add an itinerary");
    });

    $("#back-button-itinerary").click(function(){
        $("#add-itinerary").hide();
        $("#setup").show();
        $("#prompt-header").html("Create an experience for others to try out");
    });
});

</script>

@endsection