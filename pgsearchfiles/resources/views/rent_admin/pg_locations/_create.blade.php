<div class="col-md-7">
    <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
      {!! Form::label('address', 'Address', array('class' => 'col-md-3 control-label')) !!}
      <div class="col-md-9">
        {!! Form::textarea('address', null, ['class' => 'form-control', 'id' => 'address', 'rows' => 3, 'placeholder' => 'Address', 'required' => 'true']) !!}
      </div>
      <p> ** Minimum 10 charecters </p>
      {!! $errors->first('address', '<span class="help-inline">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
      {!! Form::label('gender', '', array('class' => 'col-md-3 control-label')) !!}
      <div class="col-md-9">
        {!! Form::select('gender', $gender, null, ['class' => 'form-control', 'id' => 'pin', 'placeholder' => 'Select Preferred Gender', 'required' => 'true']) !!}
      </div>
      {!! $errors->first('gender', '<span class="help-inline">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('pin') ? 'has-error' : ''}}">
      {!! Form::label('pin', 'PIN Code', array('class' => 'col-md-3 control-label')) !!}
      <div class="col-md-9">
        {!! Form::number('pin', null, ['class' => 'form-control', 'id' => 'pin', 'placeholder' => 'PIN Number', 'maxlength' => '6', 'autocomplete' => 'off', 'required' => 'true']) !!}
      </div>
      {!! $errors->first('pin', '<span class="help-inline">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('pin') ? 'has-error' : ''}}">
      {!! Form::label('state_id', 'State', array('class' => 'col-md-3 control-label')) !!}
      <div class="col-md-9">
        {!! Form::select('state_id', $states, null, ['class' => 'form-control', 'id' => 'state_id', 'placeholder' => 'Select State', 'autocomplete' => 'off', 'required' => 'true']) !!}
      </div>
      {!! $errors->first('state_id', '<span class="help-inline">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('city_id') ? 'has-error' : ''}}">
      {!! Form::label('city_idl', 'City', array('class' => 'col-md-3 control-label')) !!}
      <div class="col-md-9">
        <select id="cities" name="city_id" class="form-control"></select> 
      </div>
      {!! $errors->first('city_id', '<span class="help-inline">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('location_id') ? 'has-error' : ''}}">
      {!! Form::label('location_id', 'Location', array('class' => 'col-md-3 control-label')) !!}
      <div class="col-md-9">
         {!! Form::select('location_id', $locations, null, ['class' => 'form-control', 'id' => 'location_id', 'placeholder' => 'Select Location', 'autocomplete' => 'off', 'required' => 'true']) !!}
      </div>
      {!! $errors->first('location_id', '<span class="help-inline">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('sub_location_id') ? 'has-error' : ''}}">
      {!! Form::label('sub_location_id', 'Sub Location', array('class' => 'col-md-3 control-label')) !!}
      <div class="col-md-9">
        <select id="sub_location_id" name="sub_location_id" class="form-control"></select> 
      </div>
      {!! $errors->first('sub_location_id', '<span class="help-inline">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('landmark_id') ? 'has-error' : ''}}">
      {!! Form::label('landmark_id', 'Nearby Landmark', array('class' => 'col-md-3 control-label')) !!}
      <div class="col-md-9">
        {!! Form::select('landmark_id', $landmarks, null, ['class' => 'select2 col-md-8', 'id' => 'landmark_id', 'placeholder' => 'Select Landmark', 'required' => 'true']) !!}
      </div>
      {!! $errors->first('landmark_id', '<span class="help-inline">:message</span>') !!}
    </div> 

    <div class="form-group">
      <i>**Drag the marker in map to get the latitude and longitude of your location</i>
    </div>
    <div class="form-group {{ $errors->has('latitude') ? 'has-error' : ''}}">
      {!! Form::label('latitude', '', array('class' => 'col-md-3 control-label')) !!}
      <div class="col-md-9">
        {!! Form::text('latitude', null, ['class' => 'form-control', 'id' => 'latitude', 'placeholder' => 'Latitude', 'required' => 'true', 'readonly' => true]) !!}
      </div>
      {!! $errors->first('latitude', '<span class="help-inline">:message</span>') !!}
    </div> 

    <div class="form-group {{ $errors->has('longitude') ? 'has-error' : ''}}">
      {!! Form::label('longitude', '', array('class' => 'col-md-3 control-label')) !!}
      <div class="col-md-9">
        {!! Form::text('longitude', null, ['class' => 'form-control', 'id' => 'longitude', 'placeholder' => 'Longitude', 'required' => 'true', 'readonly' => true]) !!}
      </div>
      {!! $errors->first('longitude', '<span class="help-inline">:message</span>') !!}
    </div> 
</div>

<div class="col-md-5">
    <div class="form-group" style="margin:15px 0">
        <!-- <input id="pac-input" class="controls form-control" type="text" placeholder="Search Box"> -->
        <div id="map"></div>
    </div>
    <input type="hidden" id="landlat" name="landlat">
    <input type="hidden" id="landlong" name="landlong">
</div>
<div class="clearfix"></div>





