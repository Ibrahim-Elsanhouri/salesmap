<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')
  <!-- Your html goes here -->
  <div class='panel panel-default'>
    <div class='panel-heading'>Attendance Detail</div>
    <div class='panel-body'>      
        <div class='form-group'>
          <label>Empolyee</label>
          <p>{{$attendance->user->name}}</p>

        </div>
         <div class='form-group'>
          <label>Longtitute</label>
          <p>{{$attendance->long}}</p>
          
        </div>
        <div class='form-group'>
            <label>Latitute</label>
            <p>{{$attendance->lat}}</p>
            
          </div>
          <div class='form-group'>
            <label>Address</label>
            <p>{{$attendance->address}}</p>
            
          </div>
          <div class='form-group'>
            <label>User Device</label>
            <p>{{$attendance->device}}</p>
            
          </div>
          <div class='form-group'>
            <label>Time</label>
            <p>{{$attendance->created_at}}</p>
            
          </div>
          <div class='form-group'>
            <label>Duration</label>
            <p>{{$attendance->created_at->diffForHumans()}}</p>
            
          </div>
         
          <div class='form-group'>
            <label>Map</label>
            <p><a href="https://www.google.com/maps/@'{{$attendance->lat}}','{{$attendance->long}}'z" target="_blank()" class="btn btn=primary"><i class="fa fa-map-marker"></i>View Map</a></p>

          </div>
        <!-- etc .... -->
        
      </form>
    </div>
  </div>
@endsection