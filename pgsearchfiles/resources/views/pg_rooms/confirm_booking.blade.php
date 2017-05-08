@extends('layouts.user')

@section('pageTitle') {{ str_replace('-',' ',$seo_friend) }} @stop
@section('content')

<section>
  <div class="container" style="background: #F4F4F4">
    <div class="row mtli-row-clearfix">
      <div class="col-sm-6 col-md-8 col-lg-8">
        <div class="causes bg-white maxwidth500 mb-30">

          <div class="progress-item mt-0">
            
          </div>
          <div class="causes-details clearfix border-bottom p-15 pt-10 pb-10">
            <h3 class="font-weight-600">{{$info->pg_location_id}} ENROLLSPACE {{ $info->pg_location->location['name']}}</h3>
          </div>
        
          <div class="causes-details clearfix border-bottom p-15 pt-10 pb-10">
            <h4 class="font-weight-600">Review Your Booking</h4>
            <div class="row"> 
                <label class="col-md-4">Room Type :</label> 
                <div class="col-md-8"> 
                {{ $info->room_types->name }} 
                @for($i = 0; $i < $info->room_types->number_of_beds; $i++)
                 <i class="fa fa-bed" aria-hidden="true"></i>
                @endfor
                </div>
            </div>
            <div class="row">
                <label class="col-md-4">Rent per bed :</label> 

                <div class="col-md-4"> 
                {{ $info->rent_per_bed }} per month
                </div>
            </div>
          </div>

          <div class="causes-details clearfix border-bottom p-15 pt-10 pb-10">
            <h4 class="font-weight-600">Owner Info</h4>

            <div class="row">
                <label class="col-md-4">Owner :</label> 

                <div class="col-md-8"> 
                {{ $info->pg_location->rent_admin['name'] }}
                </div>
            </div>

            <div class="row">
                <label class="col-md-4">Contact Number :</label> 

                <div class="col-md-8"> 
                  {{ get_starred($info->pg_location->rent_admin['phone_number']) }}
                </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-4 col-lg-4" style="background: #FFF; padding: 15px;">
        <div class="sidebar sidebar-right mt-sm-30">
          {!! Form::open(array('route' => 'confirm_book_pg', 'id' => 'book_pg', 'class' => 'form-horizontal row-border', 'method' => 'get', 'onsubmit' => "return validateForm()")) !!}
          <div class="widget">
            <!-- <h4 class="widget-title line-bottom">Booking Type</h4> -->
            <!-- <div class="form-group">
              <div class="col-md-12">
                <div class="boxes">
                  <input type="checkbox" value="paid" class="chkbx" id="box-1" checked>
                  <label for="box-1">I want to pay now</label>

                  <input type="checkbox" value="free" class="chkbx" id="box-2" >
                  <label for="box-2">I want to pay later</label>
                </div>
              </div>
            </div> -->

            <!-- <div class="form-group">
              <div class="col-md-12">
                <span id="paybleamount""></span>
              </div>
            </div> -->
            <div class="form-group">
              <div class="col-md-9">
              <!-- <button class="btn btn-danger" type="submit" id="book_1"> <span class="glyphicon glyphicon-chevron-right"></span> Confirm Booking</button> -->

              <a href="{{ route('confirm_free_book_pg', Crypt::encrypt($info->id)) }}" class="btn btn-danger" id="booklink"> <span class="glyphicon glyphicon-chevron-right"></span> Confirm Booking</a>
              </div>
            </div>
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</section>

<?php
  $free_days = $info->pg_location['free_booking_days'];
  $paid_days = $info->pg_location['paid_booking_days'] ;

  $free_hold = date('d-m-Y', strtotime("+$free_days days"));
  $paid_hold = date('d-m-Y', strtotime("+$paid_days days"));
?>

@stop

@section('pageScripts')
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyCNxsOeBacT6ocUv3oNtWlqfOa5yuVggbY"></script>

<script>

var paybleamount = 0;
basepay       = "{{ $info->rent_per_bed }}";
paybleamount  = basepay*({{ $paid_days/100 }});

$('#paybleamount').html('Booking Amount : <b>'+paybleamount+'</b> <br>(Room will be hold on booking for {{ $paid_days }} days. You need to contact owner on or before {{ $paid_hold }})');

$('#box-1').on('change',function(){

  //$('#book').prop('disabled', false);

  var th = $(this), name = th.prop('name');
  if(th.is(':checked')){
    $('#box-2').prop('checked', false);
  }
  basepay       = "{{ $info->rent_per_bed }}";
  paybleamount  = basepay*({{ $paid_days }}/100);

  $('#paybleamount').html('Booking Amount : <b>'+paybleamount+'</b> <br>(Room will be hold on booking for {{ $paid_days }} days. You need to contact owner on or before {{ $paid_hold }})');
  $('#booklink').hide();
  $('#book').fadeIn();
});


$('#box-2').on('change',function(){

  //$('#book').prop('disabled', false);

  var th = $(this), name = th.prop('name');
  if(th.is(':checked')){
    $('#box-1').prop('checked', false);
  }
  paybleamount = '0.00';
  $('#paybleamount').html('Booking Amount : <b>'+paybleamount+'</b> <br>(Room will be hold on booking for {{ $free_days }} days. You need to contact owner on or before {{ $free_hold }})');

  $('#book').hide();
  $('#booklink').fadeIn();
});

function validateForm() {
  if($(".chkbx:checked").length < 1) {
    alert('Please select booking type !');
    return false;
  }
} 
</script>
@stop

@section('pageCss')
<style>
.boxes {
  margin: auto;
  padding: 50px;
}

/*Checkboxes styles*/
input[type="checkbox"] { display: none; }

input[type="checkbox"] + label {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 20px;
  font: 14px/20px 'Open Sans', Arial, sans-serif;
  color: #787878;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
}

input[type="checkbox"] + label:last-child { margin-bottom: 0; }

input[type="checkbox"] + label:before {
  content: '';
  display: block;
  width: 20px;
  height: 20px;
  border: 1px solid #6cc0e5;
  position: absolute;
  left: 0;
  top: 0;
  opacity: .6;
  -webkit-transition: all .12s, border-color .08s;
  transition: all .12s, border-color .08s;
}

input[type="checkbox"]:checked + label:before {
  width: 10px;
  top: -5px;
  left: 5px;
  border-radius: 0;
  opacity: 1;
  border-top-color: transparent;
  border-left-color: transparent;
  -webkit-transform: rotate(45deg);
  transform: rotate(45deg);
}
</style>
@stop
