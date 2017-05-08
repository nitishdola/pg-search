@extends('layouts.rent_admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="fa fa-map-marker font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase">PG details</span>
                    </div>
                </div>
                {!! Form::model($pg_location,array( 'id' => 'pg_location.add_post', 'class' => 'form-horizontal row-border')) !!}
                <div class="portlet-body form">
                    <div class="form-body">
                        <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
                          {!! Form::label('address', 'Address', array('class' => 'col-md-3 control-label')) !!}
                          <div class="col-md-9">
                            {!! Form::textarea('address', null, ['class' => 'form-control', 'id' => 'address', 'rows' => 5, 'placeholder' => 'Address', 'disabled' => true, 'required' => 'true']) !!}
                          </div>
                          {!! $errors->first('address', '<span class="help-inline">:message</span>') !!}
                        </div>
                    </div>


                    <div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
                      {!! Form::label('gender', '', array('class' => 'col-md-3 control-label')) !!}
                      <div class="col-md-9">
                        {!! Form::select('gender', $gender, null, ['class' => 'form-control', 'id' => 'pin', 'placeholder' => 'Select Preferred Gender', 'disabled' => true, 'required' => 'true']) !!}
                      </div>
                      {!! $errors->first('gender', '<span class="help-inline">:message</span>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('pin') ? 'has-error' : ''}}">
                      {!! Form::label('pin', 'PIN Code', array('class' => 'col-md-3 control-label')) !!}
                      <div class="col-md-9">
                        {!! Form::number('pin', null, ['class' => 'form-control', 'id' => 'pin', 'placeholder' => 'PIN Number', 'maxlength' => '6', 'disabled' => true, 'autocomplete' => 'off', 'required' => 'true']) !!}
                      </div>
                      {!! $errors->first('pin', '<span class="help-inline">:message</span>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('pin') ? 'has-error' : ''}}">
                      {!! Form::label('state_id', 'State', array('class' => 'col-md-3 control-label')) !!}
                      <div class="col-md-9">
                        {!! Form::select('state_id', $states, null, ['class' => 'form-control', 'id' => 'state_id', 'placeholder' => 'Select State', 'disabled' => true, 'autocomplete' => 'off', 'required' => 'true']) !!}
                      </div>
                      {!! $errors->first('state_id', '<span class="help-inline">:message</span>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('city_id') ? 'has-error' : ''}}">
                      {!! Form::label('city_idl', 'City', array('class' => 'col-md-3 control-label')) !!}
                      <div class="col-md-9">
                        {!! Form::select('city_id', $cities, null, ['class' => 'form-control', 'id' => 'state_id', 'placeholder' => 'Select City', 'disabled' => true, 'autocomplete' => 'off', 'required' => 'true']) !!}
                      </div>
                      {!! $errors->first('city_id', '<span class="help-inline">:message</span>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('location_id') ? 'has-error' : ''}}">
                      {!! Form::label('location_id', 'Location', array('class' => 'col-md-3 control-label')) !!}
                      <div class="col-md-9">
                         {!! Form::select('location_id', $locations, null, ['class' => 'form-control', 'id' => 'location_id', 'placeholder' => 'Select Location', 'disabled' => true, 'autocomplete' => 'off', 'required' => 'true']) !!}
                      </div>
                      {!! $errors->first('location_id', '<span class="help-inline">:message</span>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('sub_location_id') ? 'has-error' : ''}}">
                      {!! Form::label('sub_location_id', 'Sub Location', array('class' => 'col-md-3 control-label')) !!}
                      <div class="col-md-9">
                        {!! Form::select('location_id', $sublocations, null, ['class' => 'form-control', 'id' => 'location_id', 'placeholder' => 'Select Location', 'disabled' => true, 'autocomplete' => 'off', 'required' => 'true']) !!}
                      </div>
                      {!! $errors->first('sub_location_id', '<span class="help-inline">:message</span>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('landmark_id') ? 'has-error' : ''}}">
                      {!! Form::label('landmark_id', 'Nearby Landmark', array('class' => 'col-md-3 control-label')) !!}
                      <div class="col-md-9">
                        {!! Form::select('landmark_id', $landmarks, null, ['class' => 'form-control col-md-8', 'id' => 'landmark_id', 'disabled' => true, 'placeholder' => 'Select Landmark', 'required' => 'true']) !!}
                      </div>
                      {!! $errors->first('landmark_id', '<span class="help-inline">:message</span>') !!}
                    </div> 

                    
                    <div class="form-group {{ $errors->has('latitude') ? 'has-error' : ''}}">
                      {!! Form::label('latitude', '', array('class' => 'col-md-3 control-label')) !!}
                      <div class="col-md-9">
                        {!! Form::text('latitude', null, ['class' => 'form-control', 'id' => 'latitude', 'placeholder' => 'Latitude', 'required' => 'true', 'disabled' => true]) !!}
                      </div>
                      {!! $errors->first('latitude', '<span class="help-inline">:message</span>') !!}
                    </div> 

                    <div class="form-group {{ $errors->has('longitude') ? 'has-error' : ''}}">
                      {!! Form::label('longitude', '', array('class' => 'col-md-3 control-label')) !!}
                      <div class="col-md-9">
                        {!! Form::text('longitude', null, ['class' => 'form-control', 'id' => 'longitude', 'placeholder' => 'Longitude', 'required' => 'true', 'disabled' => true]) !!}
                      </div>
                      {!! $errors->first('longitude', '<span class="help-inline">:message</span>') !!}
                    </div> 
                </div>
                {!! Form::close() !!}

                <a href="{{ route('rent_admin.edit_pg_lcoation_basic_info', Crypt::encrypt($pg_location->id)) }}" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
            </div>

            <div class="clearfix"></div>
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="fa fa-wifi font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> PG AMMENITIES</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="form-body">
                        @foreach($pg_amenities as $k => $v)
                        <label for="primary{{$v->id}}" class="btn btn-primary">{{$v->amenity['name']}} <input type="checkbox" id="primary{{$v->id}}", checked="checked" disabled="disabled"  value="{{$v->id}}" class="badgebox" name="amenities[]"><span class="badge">&check;</span></label>
                        @endforeach
                    </div>
                </div>
                <a href="{{ route('rent_admin.edit_pg_lcoation_ammenity_info', Crypt::encrypt($pg_location->id)) }}" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
            </div>

            <div class="clearfix"></div>
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="fa fa-building font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> PG ROOMS</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="form-body"> 
                        @foreach($pg_rooms as  $room)
                            <h4> {{ $room->room_types['name']}} </h4>
                            <p>  Price : {{ $room->rent_per_bed }} </p>
                        @endforeach
                    </div>
                </div>
                <a href="" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
            </div>


            <div class="clearfix"></div>
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="fa fa-building font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> PG RULES</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="form-body"> 
                        <h4> RULES </h4>
                        <p> {{ $pg_location->rules }} </p>
                    </div>

                    <div class="form-body"> 
                        <h4> DESCRIPTION </h4>
                        <p> {{ $pg_location->description }} </p>
                    </div>

                    <div class="form-body"> 
                        <h4> ADVANTAGES </h4>
                        <p> {{ $pg_location->advantages }} </p>
                    </div>
                </div>
                <a href="" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
            </div>

        </div>
    </div>
</div>
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

/* Hiding the checkbox, but allowing it to be focused */
.badgebox
{
    opacity: 0;
}

.badgebox + .badge
{
    /* Move the check mark away when unchecked */
    text-indent: -999999px;
    /* Makes the badge's width stay the same checked and unchecked */
    width: 27px;
}

.badgebox:focus + .badge
{
    /* Set something to make the badge looks focused */
    /* This really depends on the application, in my case it was: */
    
    /* Adding a light border */
    box-shadow: inset 0px 0px 5px;
    /* Taking the difference out of the padding */
}

.badgebox:checked + .badge
{
    /* Move the check mark back when checked */
    text-indent: 0;
}
.roomspg {
    margin-bottom: 10px;
    background: #f7f7f7;
    padding: 5px;
}
.left-align {
    text-align: left;
}
</style>
@stop