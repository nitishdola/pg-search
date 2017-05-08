@extends('layouts.rent_admin')

@section('content')
<div class="row">
        <!-- BEGIN SAMPLE FORM PORTLET-->
            {!! Form::model($pg_location, array('route' => ['rent_admin.update_pg_lcoation_basic_info', Crypt::encrypt($pg_location->id)], 'id' => 'pg_location.update', 'class' => 'form-horizontal row-border')) !!}
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="fa fa-map-marker font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase">PG Basic Details</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="form-body">
                        @include('rent_admin.pg_locations._create')
                    </div>
                </div>
            </div>

            <label class="col-md-3"></label>
            <div class="col-md-9">
                <button type="submit" class="btn btn-success btn-lg">Update</button>
            </div>
            {!! Form::close() !!}
</div>
@stop

@section('pageScript')
<script>



showCities($('#state_id').val());

$('#state_id').change(function() {
    var $this = $(this);
    state_id = $this.val();
    if(state_id != '') {
        showCities(state_id);
    }
});


function showCities(state_id) {
    if(state_id != ''){
        var data = '';
        var url  = '';

        data += '&state_id='+state_id;
        url  += "{{ route('rest.get_cities') }}";
        $.blockUI();
        $.ajax({
            data     : data,
            url      : url,
            type     : 'get',
            dataType : 'json',

            error : function(resp) {
                console.log(resp);
                alert('Oops ! Something error loading cities. Please try again later');
                $.unblockUI();
            },
            success : function(resp) { 
                $.unblockUI();
                renderCitiesUI(resp);
            }
        });
    }
}
function renderCitiesUI(resp) {
    var html = '';
    html += '';
    var city_id = "{{ $pg_location->city_id }}";
    $.each(resp, function(index, value) {
        html += '<option value="">Select City</option>';
        if(city_id == value.id) {
            html += '<option selected="selected" value="'+value.id+'">'+value.name+'</option>';
        }else{
            html += '<option value="'+value.id+'">'+value.name+'</option>';    
        }
        
    });

    $('#cities').html(html);
}


showSubLocations($('#location_id').val());
$('#location_id').change(function() {
    var $this = $(this);
    location_id = $this.val();
    showSubLocations(location_id);
});

function showSubLocations(location_id) {
    if(location_id != '') {
        var data = '';
        var url  = '';

        data += '&location_id='+location_id;
        url  += "{{ route('rest.get_sublocations') }}";
        $.blockUI();
        $.ajax({
            data     : data,
            url      : url,
            type     : 'get',
            dataType : 'json',

            error : function(resp) {
                console.log(resp);
                alert('Oops ! Something error loading sub locations. Please try again later')
                $.unblockUI();
            },
            success : function(resp) { 
                $.unblockUI();
                renderSubLocationsUI(resp);
            }
        });
    }
}
function renderSubLocationsUI(resp) {
    var html = '';
    var sub_location_id = "{{ $pg_location->sub_location_id }}";
    html += '';
    html += '<option value="">Select Sub Location </option>';
    $.each(resp, function(index, value) {
        if(sub_location_id == value.id) {
            html += '<option selected="selected" value="'+value.id+'">'+value.name+'</option>';
        }else{
            html += '<option value="'+value.id+'">'+value.name+'</option>';
        }
    });

    $('#sub_location_id').html(html);
}

$('#landmark_id').change(function() {
    var $this = $(this);
    landmark_id = $this.val();
    if(landmark_id != '') {
        var data = '';
        var url  = '';

        data += '&landmark_id='+landmark_id;
        url  += "{{ route('rest.get_landmark_info') }}";
        $.blockUI();
        $.ajax({
            data     : data,
            url      : url,
            type     : 'get',
            dataType : 'json',

            error : function(resp) {
                $.unblockUI();
                console.log(resp);
                alert('Oops ! Something error loading longitude and latitude of landmar !');
            },
            success : function(resp) { 
                $.unblockUI();
                land_lat  = resp.latitude;
                land_long = resp.longitude;
                //$('#latitude').val(land_lat);
                //$('#longitude').val(land_long);

                $('#landlat').val(land_lat);
                $('#landlong').val(land_long);

                initMap();
            }
        });
    }
});
</script>

<script>
function initMap() {

    if($('#landlat').val() == '') {
        lat1 = "{{ $pg_location->latitude }}";
        landmark_lat    = parseFloat(lat1);    
    }else{
        landmark_lat = parseFloat($('#landlat').val());   
    }


    if($('#landlong').val() == '') {
        lng1 = "{{ $pg_location->longitude }}"
        landmark_long   = parseFloat(lng1);
    }else{
        landmark_long = parseFloat($('#landlong').val());    
    }
    
    var uluru = {lat: landmark_lat, lng: landmark_long};
    var map = new google.maps.Map(document.getElementById('map'), {
        center : uluru,
        zoom: 15,
        mapTypeId: 'roadmap'
    });
    var marker = new google.maps.Marker({
        draggable: true,
        position: uluru,
        map: map
    });


    google.maps.event.addListener(marker, 'click', function (event) {
        document.getElementById("latitude").value = event.latLng.lat();
        document.getElementById("longitude").value = event.latLng.lng();
    });

    google.maps.event.addListener(marker, 'click', function (event) {
        document.getElementById("latitude").value = this.getPosition().lat();
        document.getElementById("longitude").value = this.getPosition().lng();
    });

    google.maps.event.addListener(marker, 'dragend', function (event) {
        document.getElementById("latitude").value = this.getPosition().lat();
        document.getElementById("longitude").value = this.getPosition().lng();
    });
  }
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNxsOeBacT6ocUv3oNtWlqfOa5yuVggbY&libraries=places&callback=initMap">
</script>
@stop

@section('pageCSS')
<style>
 #map {
    height: 400px;
    width: 100%;
}
</style>
@stop