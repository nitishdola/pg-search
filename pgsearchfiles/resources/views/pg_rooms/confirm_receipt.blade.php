@extends('layouts.user')

@section('pageTitle') Booking Confirmed @stop
@section('content')
<section>
  <div class="container" style="background: #F4F4F4">
    <div class="row mtli-row-clearfix">
      <div class="col-sm-6 col-md-8 col-lg-8">
        <div class="causes bg-white maxwidth500 mb-30">

          <div class="progress-item mt-0">
            
          </div>
          <div class="causes-details clearfix border-bottom p-15 pt-10 pb-10">
            <h3 class="font-weight-600">Booking is confirmed !</h3>
          </div>
        
          <div class="causes-details clearfix border-bottom p-15 pt-10 pb-10">
            <h4 class="font-weight-600">{{$booking->pg_room->pg_location_id}} ENROLLSPACE {{ $booking->pg_room->pg_location->location['name']}}</h4>

            <h4>We will contact you soon </h4>
            <!-- <div class="row"> 
                <label class="col-md-4">Full Address :</label> 
                <div class="col-md-4"> 
                {{$booking->pg_room->pg_location['address']}}
                <p>{{ $booking->pg_room->pg_location->sub_location['name']}} {{ $booking->pg_room->pg_location->location['name']}}</p>
                <p>{{ $booking->pg_room->pg_location->city['name']}}</p>
                </div>
            </div> -->
            <!-- <div class="row">
                <label class="col-md-4">Owner Details :</label> 

                <div class="col-md-4"> 
                  <p>{{ $booking->pg_room->pg_location->rent_admin['name']}} </p>
                  <p><i class="fa fa-phone" aria-hidden="true"></i> {{ $booking->pg_room->pg_location->rent_admin['phone_number']}} </p>
                </div>
            </div> -->
          </div>

          <div class="causes-details clearfix border-bottom p-15 pt-10 pb-10">
            <div class="row">
                <div class="col-md-12" style="font-weight: 300"> 
                  <p> Booked By <b> {{ ucfirst(Auth::guard('user')->user()->name) }} </b> at <b>{{ date('d-m-Y h:i A', strtotime($booking->booking_date)) }}</b> . This Booking will be expired on {{ date('d-m-Y h:i A', strtotime($booking->booking_expiry_date)) }}, you need to contact owner on or before expiry date. </p>
                </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-4 col-lg-4" style="background: #FFF; padding: 15px;">
        <div class="sidebar sidebar-right mt-sm-30">
          <h4> Location</h4>
          <div class="widget">
            <h4 class="widget-title line-bottom"></h4>
            <div class="form-group">
             <div id="map"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@stop

@section('pageScripts')
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyCNxsOeBacT6ocUv3oNtWlqfOa5yuVggbY"></script>

<script>

var longitude = {{ $booking->pg_room->pg_location['longitude'] }};
var latitude  = {{ $booking->pg_room->pg_location['latitude'] }};
var mrkr      = "{{ asset('assets/images/mrkr.png') }}";

function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 12,
    center: {lat: latitude, lng: longitude}
  });

  var image = mrkr;
  var beachMarker = new google.maps.Marker({
    position: {lat: latitude, lng: longitude},
    map: map,
    icon: image
  });
}

initMap();
</script>
@stop

@section('pageCss')
<style>
#map {
  height: 300px;
}
</style>
@stop