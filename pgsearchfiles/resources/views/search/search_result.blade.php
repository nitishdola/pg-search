@extends('layouts.user')

@section('content')
<section class="">
  <div class="container mt-30 mb-30 p-30">
    <div class="section-content">
      <div class="row">
        <div class="col-sm-12 col-md-9">
          <div class="row multi-row-clearfix">
            <div class="products">

            @if(count($results))
            	@foreach($results as $v)
        				<div class="col-sm-6 col-md-6 col-lg-6">
        					<div class="schedule-box maxwidth500 bg-lighter mb-30">
        						<div class="owl-carousel-1col" data-nav="true">
        							@if(count($v->pg_images))
                        @foreach($v->pg_images as $img)
          							<div class="item">
          								<img src="{{ asset('pgsearchfiles/public/uploads/'.$img->image_location) }}" alt="">
          								<h4 class="mt-15"><span class="font-13"></span></h4>
          							</div>
          							@endforeach
                      @else
                      <div class="item">
                        <img src="{{ asset('assets/images/no-image-available-enrollspace-pg-search.jpg') }}" alt="">
                        <h4 class="mt-15"><span class="font-13"></span></h4>
                      </div>
                      @endif
        						</div>
        						<div class="schedule-details clearfix p-15 pt-10">
        							<?php $pg_name = $v->id.' ENROLLSPACE '.$v->location['name']; ?>
        							<h4 class="title mt-0"><a href="{{ route('pg.view',[str_replace(' ', '-',$pg_name), 'find-pg-rooms-in-'.$v->location['name'], Crypt::encrypt($v->id)] ) }}" target="_blank"> {{$v->id}} ENROLLSPACE {{ $v->location['name']}}</a></h4>

        							<div class="clearfix"></div>
                      <p> For <strong>{{ $v->gender }}</strong> </p>
        							<p class="mt-10">{{ $v->sub_location['name'] }}, {{ $v->location['name'] }} {{ $v->city['name'] }}</p>
        							<div class="mt-10">
        								<!-- <a class="btn btn-dark btn-theme-colored btn-sm mt-10" href="{{ route('pg.view',[str_replace(' ', '-',$pg_name), 'find-pg-rooms-in-'.$v->location['name'], Crypt::encrypt($v->id)] ) }}" target="_blank">₹ {{ $v->pg_min_price }}</a> -->
                       <a class="btn btn-dark btn-theme-colored btn-sm mt-10" href="javascript:void(0)" target="_blank">₹ {{ $v->pg_min_price }}</a>
                        
        							 <a href="{{ route('pg.view',[str_replace(' ', '-',$pg_name), 'find-pg-rooms-in-'.$v->location['name'], Crypt::encrypt($v->id)] ) }}" class="btn btn-default btn-sm mt-10" target="_blank">Book For Free</a>
        							</div>
        						</div>
        					</div>
        				</div>
              	@endforeach
              @else
                <div class="alert alert-danger">
                  <strong>Oops !</strong> No PG found !
                </div>
              @endif
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-3">
          <div class="sidebar sidebar-right mt-sm-30">
            <div class="widget">
              <h5 class="widget-title line-bottom"><strong>LOCATION</strong></h5>
              
            </div>
            <div class="widget">
              
              <div class="categories" id="locations">
                <div class="search-form">
                  <form>
                    <div class="input-group">
                      <input type="text" placeholder="Search in Guwahati" class="search form-control search-input">
                      <span class="input-group-btn">
                      <button type="submit" disabled="disabled" class="btn search-button"><i class="fa fa-search"></i></button>
                      </span>
                    </div>
                  </form>
                </div>
                <ul class="list list-border angle-double-right"  style="max-height: 300px;overflow:scroll; overflow-x: hidden; scrollbar-base-color:#ffeaff">
                  <?php $sub_locations = getAllLocations(); ?>
                  @foreach($sub_locations as $v)
                  <li><label class="radio-inline"><input type="radio" class="search-by-location" name="location" value="{{ $v->slug }}">
                  <span class="locname"> 
                  {{$v->name}}</span></label></li>
                  @endforeach
                </ul>
              </div>
            </div>
            <div class="widget">
                <label for="amount">Price range:</label>
                <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                <div id="slider-range"></div>
                <ul class="list list-border angle-double-right">
                  <li><label class="radio-inline"><input type="radio" class="search-by-price" value="0-1299" name="t3" >Below ₹ 1299</label></li>
                  <li><label class="radio-inline"><input type="radio" class="search-by-price" value="1300-2399" name="t3">₹ 1300 - ₹ 2399</label></a></li>
                  <li><label class="radio-inline"><input type="radio" class="search-by-price" value="2400-50000" name="t3">Above ₹ 2400</label></li>
                </ul>
              </div>
            </div>


            <div class="widget">
              <h5 class="widget-title line-bottom"><strong>GENDER</strong></h5>
              <div class="top-sellers">
                <ul class="list list-border angle-double-right">
                  @foreach($preferred_gender as $gender)
                  <li><label class="radio-inline"><input type="radio" class="search-by-gender" value="{{ $gender }}" name="t3" >{{ $gender }}</label></li>
                  @endforeach
                </ul>
              </div>
            </div>

            <div class="widget">
              <h5 class="widget-title line-bottom"><strong>Room Type</strong></h5>
              <div class="top-sellers">
                <ul class="list list-border angle-double-right">
                  {!! Form::select('room_type_id[]', $room_types, null, ['class' => 'form-control', 'id' => 'room_type_id', 'placeholder' => 'Select Room Type']) !!}
                </ul>
              </div>
            </div>

            
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@stop

@section('pageCss')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@stop

@section('pageScripts')
<script type="text/javascript" src="{{ asset('assets/user/js/list.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$('.search-by-price').click(function() {
  var paramName   = 'price_range';
  var paramValue  = $(this).val();
  changeSearch(paramName,paramValue);
});

$('.search-by-gender').click(function() {
  var paramName   = 'gender';
  var paramValue  = $(this).val();
  changeSearch(paramName,paramValue);
});

$('.search-by-location').click(function() {
  var paramValue  = $(this).val();
  var config_string = "{{ config('globals.APP_SEARCH_STRING') }}";
  base_url = "{{ URL::to('/') }}";
  url = base_url+'/search/'+config_string+paramValue;
  window.location.href = url;
});


function getParameterByName(name, url) {
    if (!url) {
      url = window.location.href;
    }
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}



$( "#slider-range" ).slider({
  range: true,
  min: 0,
  max: 10000,
  values: [ 500, 10000 ],
  slide: function( event, ui ) {
    $( "#amount" ).val( "₹ " + ui.values[ 0 ] + " - ₹ " + ui.values[ 1 ] );
  }
}).bind('slidechange',function(event,ui){  


  var paramName   = 'price_range';
  var paramValue  = ui.values[ 0 ]+'-'+ui.values[ 1 ];
  changeSearch(paramName,paramValue);

});;
$( "#amount" ).val( "₹ " + $( "#slider-range" ).slider( "values", 0 ) +
  " - ₹ " + $( "#slider-range" ).slider( "values", 1 ) );




function changeSearch(paramName,paramValue) {
  var url   = window.location.href;
  var hash  = location.hash;
  url       = url.replace(hash, '');
  if (url.indexOf(paramName + "=") >= 0)
  {
    var prefix = url.substring(0, url.indexOf(paramName));
    var suffix = url.substring(url.indexOf(paramName));
    suffix = suffix.substring(suffix.indexOf("=") + 1);
    suffix = (suffix.indexOf("&") >= 0) ? suffix.substring(suffix.indexOf("&")) : "";
    url = prefix + paramName + "=" + paramValue + suffix;
  }
  else
  {
    if (url.indexOf("?") < 0)
      url += "?" + paramName + "=" + paramValue;
    else
      url += "&" + paramName + "=" + paramValue;
  }
  window.location.href = url + hash;
}
</script>
@stop