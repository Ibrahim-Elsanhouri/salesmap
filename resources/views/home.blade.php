@extends('layouts.app')
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
    
    function showPosition(position) {
        console.log('Latitude:  ' +position.coords.latitude+ 'Longitude:' + position.coords.longitude); 
    //  x.innerHTML = "Latitude: " + position.coords.latitude +
     // "<br>Longitude: " + position.coords.longitude;
     document.getElementById("add_to_me").innerHTML += 
              '<h3>Longtutide :  '+position.coords.longtude+'   , Latitude :'+position.coords.latitude+' </h3>';
    } 
</script>
@section('content')




<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <div class="row">
                        <form>
                            <button onclick="getLocation()">Get Location</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
