@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html>
  
<head>

    <title>Get Location</title>
    <style>
        body {
            text-align: center;
              
            padding: 5%;
        }
        h1{
            color:green;
        }
        #map {
  height: 400px;
  /* The height is 400 pixels */
  width: 100%;
  /* The width is the width of the web page */
}

    </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script>
  // Initialize and add the map
  function initMap() {
    // The location of Uluru
    const uluru = { lat: -25.344, lng: 131.036 };
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 4,
      center: uluru,
    });
    // The marker, positioned at Uluru
    const marker = new google.maps.Marker({
      position: uluru,
      map: map,
    });
  }
</script>

<script>
    var x = document.getElementById("demo");
    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else {
      //  x.innerHTML = "Geolocation is not supported by this browser.";
      console.log('Geolocation is not supported by this browser')
      
      }
    }
    
    function showPosition(position){
        console.log('Latitude:  ' +position.coords.latitude+ 'Longitude:' + position.coords.longitude);
        document.getElementById('lat').value=position.coords.latitude;
        document.getElementById('long').value=position.coords.longitude;


     //   document.getElementById("add_to_form").innerHTML = "Latitude: " + position.coords.latitude +
    // "<br>Longitude: " + position.coords.longitude;
  
              
                  } 
</script>

</head>
  
<body>
    <div class="container">
        <h1>TUV Austria Location Track</h1>
        <p>
            GIS Microservice - Welcome {{ Auth::user()->name }}
        </p> 
        <button type="submit" class="btn btn-info" onclick="getLocation()">Get Location<i class="fa fa-map"></i></button>

  <form   method="post" action="{{ route('sendmap') }}">
@csrf
<input type="text" id="lat" name="lat" readonly/>
<input type="text" id="long" name="long" readonly/>
<button type="submit" class="btn btn-success">Verify Location</button>
  </form>
</div>
<div class="text-center">

  <!--The div element for the map -->
  <div id="map"></div>

  <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
  <script
    src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap&libraries=&v=weekly"
    async
  ></script>





</div>
 
</body>
  
</html>
@endsection