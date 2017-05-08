@extends('layouts.user')

@section('pageTitle') {{ str_replace('-',' ',$seo_friend) }} @stop
@section('content')
<section>
  <div class="container">
    <div class="row mtli-row-clearfix">
      <div class="col-sm-6 col-md-8 col-lg-8">
        <div class="causes bg-white maxwidth500 mb-30">

           <div class="owl-carousel-1col" data-nav="true">

          @foreach($images as $img)
          <div class="item">
            <img src="{{ asset('pgsearchfiles/public/uploads/'.$img->image_location) }}" alt="">
          </div>
          @endforeach
        </div>
          <div class="progress-item mt-0">
            <h2> {{ str_replace('-', ' ', $subname) }}</h2>
          </div>
          <div class="causes-details clearfix border-bottom p-15 pt-10 pb-10">
            <h3 class="font-weight-600"><a href="javascript:void(0)">Description</a></h3>
            <p>{!! $info->description !!} </p>
            
          </div>
          @if($info->advantages)
          <div class="causes-details clearfix border-bottom p-15 pt-10 pb-10">
            <h3 class="font-weight-600"><a href="javascript:void(0)">Advantages</a></h3>
            <p>{!! $info->advantages !!} </p>
            
          </div>
          @endif
        </div>

        <div class="causes-details clearfix border-bottom p-15 pt-10 pb-10">
          <h3 class="font-weight-600"><a href="javascript:void(0)">Map Location</a></h3>
          <div id="map"></div>
        </div>
        
      </div>
      <div class="col-sm-6 col-md-4 col-lg-4">
        <div class="sidebar sidebar-right mt-sm-30">
          <div class="widget">
            <h4 class="widget-title line-bottom">PG Rules and Regulations</h4>
         
            <p>{!! $info->rules !!}</p>
          </div>
          <div class="widget">
            <h4 class="widget-title line-bottom">Amenities</h4>
            <ul class="list-divider list-border list check">
              @foreach($amenities as $amenity)
              <li><a href="#">
              <img src="{{ asset('assets/images/'.$amenity->amenity['icon']) }}" width="24" height="24" alt="">
              &nbsp;{{ $amenity->amenity['name'] }}</a></li>
              @endforeach
            </ul>
          </div>
          <div class="widget" style="display: none">
            <a href="javascript:void(0)" data-toggle="tooltip" title="Loved this PG ?" class="love"><i class="fa fa-heart-o fa-2x" aria-hidden="true"></i></a> Love this PG
          </div>

          <div class="widget">
            <h4 class="widget-title line-bottom">Rooms</h4>
            {!! Form::open(array('route' => ['book_pg', $subname, $seo_friend], 'id' => 'book_pg', 'class' => 'form-horizontal row-border', 'method' => 'get')) !!}
            <div class="form-group">
              <div class="col-md-9">
                <select id="pg_room_id" name="pg_room_id" class="form-control">
                  @foreach($rooms as $room)
                  <option value="{{ Crypt::encrypt($room->id) }}"> {{ $room->room_types['name'] }} </option>
                   @endforeach
                </select> 
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-9">
                
                <p id="room_price_per_bed" style="font-weight: 500; color: #444; font-size: 1.1em">
                   <img src="{{ asset('assets/images/price-load.gif') }}" alt="Loading please wait">
                </p>
                <p id="available_rooms" style="font-weight: 500; color: #444; font-size: 1.1em"></p>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6">
                <button class="btn btn-danger" type="submit" disabled="disabled" id="book"> <span class="glyphicon glyphicon-chevron-right"></span> Book Now</button>
              </div>

            {!! Form::close() !!}
              <div class="col-md-6">
                <button class="btn btn-info" type="button" id="wishlist"> <i class="fa fa-heart-o" aria-hidden="true"></i> Add to Wishlist</button>
              </div>

          </div>
          
          <div class="widget">
            <h4 class="widget-title line-bottom">Location</h4>
            <p>{{ $info->sub_location['name'] }} , {{ $info->location['name'] }} {{ $info->city['name'] }}</p>
          </div>


           <div class="widget">
            <h4 class="widget-title line-bottom">Distance Calculator</h4>
            <form class="form-horizontal row-border">
              <div class="form-group">
                <div class="col-md-12">
                  <input type="text" id="pgLocation" class="form-control" placeholder="Search nearby places from PG">
                </div>
                <div class="col-md-12">
                  <span id="distance"></span>
                </div>
              </div>

              <div class="form-group" style="margin-top: 10px;">
                <div class="col-md-9">
                  <p id="room_price_per_bed" style="font-weight: 500; color: #444; font-size: 1.1em"></p>

                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

@stop

@section('pageScripts')

<script>
getRoomPrice();

function getRoomPrice() {
  $('#available_rooms').text('');
  $('#book').prop('disabled', true);
  pg_room_id = $('#pg_room_id').val();

  var data = '';
  var url  = '';

  url   += "{{ route('rest.pg_room_info') }}";
  data  += '&pg_room_id='+pg_room_id;
  if(pg_room_id != '')  {
    $.ajax({
      data : data,
      url  : url,
      type : 'get',
      dataType : 'json',
      error : function(resp) {
        alert('unable to get room price');
      },

      success : function(resp) {
        $('#book').prop('disabled', false);
        $('#room_price_per_bed').text('Rs. '+resp.rent_per_bed+' per bed');
        if(resp.available_beds > 0) 
        {
          $('#available_rooms').html('Available Beds : '+resp.available_beds);
        }else{
          $('#available_rooms').html('Sorry ! All Beds are booked for this room ! '); 
          $('#book').prop('disabled', true); 
        }
      }
    });
  }
}

$('#pg_room_id').change(function() {
  getRoomPrice();
});
</script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyCNxsOeBacT6ocUv3oNtWlqfOa5yuVggbY"></script>

<script>

var pg_longitude = {{ $info->longitude }};
var pg_latitude  = {{ $info->latitude }};
var pg_name      = "{{ str_replace('-', ' ', $subname) }}"; 

var lm_longitude = {{ $info->landmark['longitude'] }};
var lm_latitude  = {{ $info->landmark['latitude'] }};
var lm_name      = "{{ $info->landmark['name'] }}";

var mrkr      = "{{ asset('assets/images/mrkr.png') }}";

console.log('Nothing here bro ! just the latitude n longitude :)'+lm_latitude+'->'+lm_longitude+'->'+pg_latitude+'->'+pg_longitude);

var mrkr      = "{{ asset('assets/images/mrkr.png') }}";


function initMap() {
  var map;
  var bounds = new google.maps.LatLngBounds();
  var mapOptions = {
      mapTypeId: 'roadmap'
  };
  
  var pg_image = mrkr;

  // Display a map on the page
  map = new google.maps.Map(document.getElementById("map"), mapOptions);
  map.setTilt(45);
      
  // Multiple Markers
  var markers = [
      //[pg_name, pg_latitude,pg_longitude]
      [lm_name, lm_latitude,lm_longitude]
  ];
                      
  // Info Window Content
  var infoWindowContent = [
      ['<div class="info_content">' +
      '<h3>'+pg_name+'</h3>' +
      '<p>Your PG is located around here.</p>' +        '</div>'],
      ['<div class="info_content">' +
      '<h3>'+lm_name+'</h3>' +
      '<p>Your Nearest Landmark</p>' +
      '</div>']
  ];
      
  // Display multiple markers on a map
  var infoWindow = new google.maps.InfoWindow(), marker, i;
  
  // Loop through our array of markers & place each one on the map  
  for( i = 0; i < markers.length; i++ ) {
      var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
      bounds.extend(position);

    
      if(i == 0) {
        marker = new google.maps.Marker({
          position: position,
          map: map,
          //icon: pg_image,
          title: markers[i][0]
        });
      }else{
        marker = new google.maps.Marker({
          position: position,
          map: map,
          title: markers[i][0]
        });
      }

      // Allow each marker to have an info window    
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
          return function() {
            infoWindow.setContent(infoWindowContent[i][0]);
            infoWindow.open(map, marker);
          }
      })(marker, i));

      // Automatically center the map fitting all markers on the screen
      map.fitBounds(bounds);
  }

  // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
  var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
      this.setZoom(14);
      google.maps.event.removeListener(boundsListener);
  });
}

initMap();
</script>

<script>

function initialize() {
        var input = document.getElementById('pgLocation');
        var autocomplete = new google.maps.places.Autocomplete(input);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            destlat   = place.geometry.location.lat();
            destlong  = place.geometry.location.lng();
            calculateDistance(destlat,destlong);
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);

</script>

<script>
function calculateDistance(destlat, destlong) {
  $('#distance').html('<br>Fetching distance...please wait !');
  var url   = '';
  var data  = '';

  orglat  = {{ $info->latitude }};
  orglong = {{ $info->longitude }};
  url   +=  "{{ route('rest.get_distance') }}";
  data  += '&srclat='+orglat+'&srclong='+orglong+'&destlat='+destlat+'&destlong='+destlong;

  $.ajax({
    url : url,
    data : data,
    type : 'get',

    error : function(resp) {
      alert('Oops ! Something went wrong. Please try again')
      console.log('Deveopers please go through here :( '+resp);
    },

    success : function(resp) {
      $('#distance').html('<br>PG is just <b>'+resp+'</b> Km away from this location');
    }
  });
}

$('.love').click(function() {
  url = '';
  data = '';

  url   += "{{ route('rest.love_pg') }}";
  data  += "&pg_locaton_id={{$info->id}}";

  $.ajax({
    data : data,
    url  : url,
    dataType : 'json',
    type : 'get',

    error : function(resp) {
      alert('Oops ! Something went wrong .');
    },

    success : function(resp) {
      if(resp.success) {
        alert('Thank you for the love !');
      }else{
        alert(resp.message);
      }
    }
  });
});

$('#wishlist').click(function(e) {
  e.preventDefault();
  //check if login
  
  @if(Auth::guard('user')->user())
  $login = true;
  @else
  $login = false;
  @endif
  if($login) {
    data = '';
    url  = '';

    data += '&pg_location_id='+{{ $info->id }};
    url  += "{{ route('rest.add_to_wishlist') }}";

    $.ajax({
      data : data,
      url  : url,
      type : 'get',
      dataType : 'json',

      error : function(resp) {
        alert('Something went wrong');
      },

      success : function(resp) {
        alert('Added to wishlist');
      }
    });
  }else{
    alert('You must login to add wishlist');
  }
});
</script>

@stop

@section('pageCss')

<style>

#map {
  height: 300px;
}
.love {
  color:#ED0E0E;
}

.love:hover {
  color:#ED0E0E;
}
</style>
@stop