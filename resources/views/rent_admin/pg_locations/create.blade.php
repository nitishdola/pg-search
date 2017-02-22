@extends('layouts.rent_admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="fa fa-map-marker font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase"> ADD PG LOCATION</span>
                </div>
            </div>
            <div class="portlet-body form">
                {!! Form::open(array('route' => 'pg_location.add_post', 'id' => 'pg_location.add_post', 'class' => 'form-horizontal row-border')) !!}
                    <div class="form-body">
                        @include('rent_admin.pg_locations._create')
                        <label class="col-md-3"></label>
                        <button type="submit" class="btn btn-success btn-lg">ADD</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop

@section('pageScript')
<script>
$('#state_id').change(function() {
    var $this = $(this);
    state_id = $this.val();
    if(state_id != '') {
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
                alert('Oops ! Something error loading cities. Please try again later')
                $.unblockUI();
            },
            success : function(resp) { 
                $.unblockUI();
                renderCitiesUI(resp);
            }
        });
    }
});

function renderCitiesUI(resp) {
    var html = '';
    html += '';

    $.each(resp, function(index, value) {
        html += '<option value="">Select City</option>';
        html += '<option value="'+value.id+'">'+value.name+'</option>';
    });

    $('#cities').html(html);
}


//landmark longlat
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
        landmark_lat = 26.149822;    
    }else{
        landmark_lat = parseFloat($('#landlat').val());   
    }


    if($('#landlong').val() == '') {
        landmark_long = 91.785180;    
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
#description {
    font-family: Roboto;
    font-size: 15px;
    font-weight: 300;
}

#infowindow-content .title {
    font-weight: bold;
}

#infowindow-content {
    display: none;
}

#map #infowindow-content {
    display: inline;
}

.pac-card {
    margin: 10px 10px 0 0;
    border-radius: 2px 0 0 2px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    outline: none;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    background-color: #fff;
    font-family: Roboto;
}

#pac-container {
    padding-bottom: 12px;
    margin-right: 12px;
}

.pac-controls {
display: inline-block;
padding: 5px 11px;
}

.pac-controls label {
font-family: Roboto;
font-size: 13px;
font-weight: 300;
}

#pac-input {
background-color: #fff;
font-family: Roboto;
font-size: 15px;
font-weight: 300;
margin-left: 12px;
padding: 0 11px 0 13px;
text-overflow: ellipsis;
width: 400px;
}

#pac-input:focus {
border-color: #4d90fe;
}

#title {
color: #fff;
background-color: #4d90fe;
font-size: 25px;
font-weight: 500;
padding: 6px 12px;
}
#target {
width: 345px;
}
</style>
@stop