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
                        <input type="text" placeholder="eg. Rooftop Bar Hopping">
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
                        <textarea rows="3" placeholder="eg. Good memories and bad decisions"></textarea>
                    </div>
                    {{-- <a href="/home" class="head-font"><i class="left floated arrow left icon"></i>Back</a> --}}
                    <button id="next-button-setup" type="button" class="ui large button button-shaded right floated">Next</button>
                </div>
                
                <div id="add-itinerary" class="ui big form" style="display: none;">
                    <span>You can add up to 5 destinations</span>
                    <div class="field">
                        <label>Pick a place</label>
                        <input type="text" placeholder="eg. The Bunk">                     
                    </div>
                    <div class="field">
                        <label>What's there to do?</label>
                        <textarea rows="3" placeholder="eg. Enjoy a cold beer with a great view of the city"></textarea>
                    </div>
                     <a id="back-button-itinerary" class="head-font"><i class="left floated arrow left icon"></i>Back</a>
                    <button id="next-button-itinerary" type="submit" class="ui large button button-shaded right floated">Add Destination</button>

                    

                    {{-- <div class="ui section divider"></div>

                    <a id="back-button-itinerary" class="head-font"><i class="left floated arrow left icon"></i>Back</a>
                    <button id="next-button-itinerary" type="submit" class="ui huge button button-shaded right floated">Done!</button> --}}
                </div>
                
                <br><br> 
                <div class="ui grid" id="list-grid" style="display: none;">
                    <div class="ui section divider"></div><br> 
                    <div class="five wide column">
                        <img class="ui small circular image" src="https://scontent.cdninstagram.com/hphotos-xaf1/t51.2885-15/s640x640/sh0.08/e35/11925616_1047949228550818_1910383083_n.jpg">
                    </div>
                    <div class="ten wide column middle aligned">
                        <h3><i>Findeers Keepers</i></h3>
                        <p>Obscure warehouse lounge with an intimate long bar, curated music, crafted cocktails, draft and bottled beers</p>
                    </div>
                </div>

                </form>
                
            </div>

            <!-- Upload Image Div -->
            <div class="seven wide column">
                <img id="img-upload-box" class="ui large image" src="https://scontent.cdninstagram.com/hphotos-xaf1/t51.2885-15/s640x640/sh0.08/e35/11925616_1047949228550818_1910383083_n.jpg"/>
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
        $('#list-grid').show();
        $('#img-upload-box').hide();
        $("#prompt-header").html("Let's add an itinerary");
    });

    $("#back-button-itinerary").click(function(){
        $("#add-itinerary").hide();
        $("#setup").show();
        $('#list-grid').hide();
        $('#img-upload-box').show();
        $("#prompt-header").html("Create an experience for others to try out");
    });
});

</script>

@endsection