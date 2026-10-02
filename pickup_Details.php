
        <div class="templatemo-content">

          <h1>Pickup Point Details</h1>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTdxOIiUh1ehTRUyaSYKBBkHSYPDYB22I&callback=initMap"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="jquery.min.js"></script>


<input id="LAT" type="hidden" value="17.00" >
<input id="LAG" type="hidden" value="74.00" >


<script type="text/javascript">
var geocoder = new google.maps.Geocoder();
var abcd = parseFloat(0.000001);
var latnew="";
var lagnew="";
var spdnew="";

function geocodePosition(pos) {
  geocoder.geocode({
    latLng: pos
  }, function(responses) {
    if (responses && responses.length > 0) {
      updateMarkerAddress(responses[0].formatted_address);
    } else {
      updateMarkerAddress('Cannot determine address at this location.');
    }
  });
}

function updateMarkerStatus(str) {
  //document.getElementById('markerStatus').innerHTML = str;
}

function updateMarkerPosition(latLng) {
  //document.getElementById('info').innerHTML = [
  //  latLng.lat(),
  //  latLng.lng()
  //].join(', ');
}

function updateMarkerAddress(str) {
  //document.getElementById('address').innerHTML = str;
  $("#content1").val(str);
}

function initialize() {
var cityCircle=new google.maps.Circle();
  var latLng = new google.maps.LatLng($("#LAT").val(),  $("#LAG").val());
  var map = new google.maps.Map(document.getElementById('mapCanvas'), {
    zoom: 15,
    center: latLng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  var marker = new google.maps.Marker({
    position: latLng,
    title: 'Point A',
    map: map,
    draggable: true
  });


  // Update current position info.
  updateMarkerPosition(latLng);
  geocodePosition(latLng);

  // Add dragging event listeners.
  google.maps.event.addListener(marker, 'dragstart', function() {
    updateMarkerAddress('Dragging...');
  });

  google.maps.event.addListener(marker, 'drag', function() {
    updateMarkerStatus('Dragging...');
    updateMarkerPosition(marker.getPosition());
	var lat = marker.getPosition().lat();
	var lng = marker.getPosition().lng();
	$("#content2").val(lat);
	$("#content3").val(lng);
	
  });

  google.maps.event.addListener(marker, 'dragend', function() {
    updateMarkerStatus('Drag ended');
    geocodePosition(marker.getPosition());
  });




}

// Onload handler to fire off the app.
google.maps.event.addDomListener(window, 'load', initialize);

</script>


<style>
  #mapCanvas {
    width: 50%;
    height: 450px;
    float: left;

  }
</style>

  <div id="mapCanvas"></div>
  <hr>

						
							
<div id="container">


<div id="cp_contact_form">
<form name="form" id="form">
<div class="col-md-6 margin-bottom-15">
<label for="author">ROUTE:*</label>
<input Type="text" name="content" id="content" class="form-control">
</div>
<div class="col-md-6 margin-bottom-15">
<label for="author">Pickup Points:*</label>
<input Type="text" name="content1" id="content1" class="form-control">
</div>
<div class="col-md-6 margin-bottom-15">
<label for="author">Latitude :*</label>
<input Type="text" name="content2" id="content2" class="form-control">
</div>
<div class="col-md-6 margin-bottom-15">
<label for="author">Longitude:*</label>
<input Type="text" name="content3" id="content3" class="form-control">
</div>

<div class="col-md-6 margin-bottom-15">
<label for="author">Time:*</label>
					<select type="text" name="content4" class="form-control" >
					<option value="6:00">6:00</option>
					<option value="6:10">6:10</option>
					<option value="6:20">6:20</option>
					<option value="6:30">6:30</option>   
					<option value="6:40">6:40</option> 
					<option value="6:50">6:50</option> 
					<option value="7:00">7:00</option>
					<option value="7:10">7:10</option>
					<option value="7:20">7:20</option>
					<option value="7:30">7:30</option>   
					<option value="7:40">7:40</option> 
					<option value="7:50">7:50</option> 

					<option value="8:00">8:00</option>
					<option value="8:10">8:10</option>
					<option value="8:20">8:20</option>
					<option value="8:30">8:30</option>   
					<option value="8:40">8:40</option> 
					<option value="8:50">8:50</option> 

					<option value="9:00">9:00</option>
					<option value="9:10">9:10</option>
					<option value="9:20">9:20</option>
					<option value="9:30">9:30</option>   
					<option value="9:40">9:40</option> 
					<option value="9:50">9:50</option> 
					
					</select>
					</div>
					
<div class="col-md-6 margin-bottom-15">
<input type="button" value="Post" name="submit" class="submit_button" style="width:74px;height:35px;border:1px #C0C0C0 solid;background-color:#000000;color:#FFFFFF;font-family:Arial;font-weight:bold;font-size:13px;"></div>
</form>
</div>


<script type="text/javascript">
// Insert Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".submit_button").click(function() {
var dataString = $('#form').serialize()+'&page=1';

document.getElementById("show").innerHTML="";
$("#show").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');

$.ajax({
type: "POST",
url: "pickupaction.php",
data: dataString,
cache: true,
success: function(html){
$("#show").fadeIn(400).html('');
$("#show").append(html);
}  
});

return false;
});
});
</script>

<hr><br><br>

<script type="text/javascript">
	$(document).ready(function(){

var dataString = 'page=1';//+ textcontent2;
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');

$.ajax({
type: "POST",
url: "pickupaction.php",
data: dataString,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
}  
});
return false;

});

</script>

<div id="show" class="show"></div>

</div>


</div>