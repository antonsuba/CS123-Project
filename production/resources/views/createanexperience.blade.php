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
                        <input type="text" id="name" placeholder="eg. The Bunk">                     
                    </div>
                    <div class="field">
                        <label>What's there to do?</label>
                        <textarea rows="3" placeholder="eg. Enjoy a cold beer with a great view of the city"></textarea>
                    </div>
                     <a id="back-button-itinerary" class="head-font"><i class="left floated arrow left icon"></i>Back</a>
                    <button id="next-button-itinerary" type="submit" class="ui large button button-shaded right floated" onclick="manual();">Add Destination</button>

                    

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
				<!--
                <img id="img-upload-box" class="ui large image" src="https://scontent.cdninstagram.com/hphotos-xaf1/t51.2885-15/s640x640/sh0.08/e35/11925616_1047949228550818_1910383083_n.jpg"/>
				-->
				<form id="img-upload-box" action="" method="post" enctype="multipart/form-data">
					<!-- Image taken from: happysock.eu -->
					<div id="image_preview"><img id="previewing" src="http://happysock.eu/wp-content/themes/mt-four/assets/images/no-img.jpg"/></div>
						<hr id="line">
						<div id="selectImage">
						<label>Select Your Image</label><br/>
						<input type="file" name="file" id="file" required />
						<input type="submit" value="Upload" class="submit" />
					</div>
				</form>
            </div>

        </div>
		
		<div id="map" style="height:50%;width:100%;"></div>
    
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
	
	// Used for the image upload
	$("#uploadimage").on('submit',(function(e) {
		e.preventDefault();
		$("#message").empty();
		$('#loading').show();
		$.ajax({
			url: "imageHelper.php", // Url to which the request is send
			type: "POST",             // Type of request to be send, called as method
			data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
			contentType: false,       // The content type used when sending data to the server.
			cache: false,             // To unable request pages to be cached
			processData:false,        // To send DOMDocument or non processed data file it is set to false
			success: function(data)   // A function to be called if request succeeds
			{
				$('#loading').hide();
				$("#message").html(data);
			}
		});
	}));
	
	$(function() {
		$("#file").change(function() {
			$("#message").empty(); // To remove the previous error message
			
			var file = this.files[0];
			var imagefile = file.type;
			var match= ["image/jpeg","image/png","image/jpg"];
			
			if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
				$('#previewing').attr('src','noimage.png');
				$("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
				return false;
			}else{
				var reader = new FileReader();
				reader.onload = imageIsLoaded;
				reader.readAsDataURL(this.files[0]);
			}
		});
	});
	function imageIsLoaded(e) {
		$("#file").css("color","green");
		$('#image_preview').css("display", "block");
		$('#previewing').attr('src', e.target.result);
		$('#previewing').attr('width', '250px');
		$('#previewing').attr('height', '230px');
	};
	
});

</script>

@endsection