<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
  {!! Form::label('location_name', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::select('location_id', $locations, null, ['class' => 'form-control', 'id' => 'location_id', 'placeholder' => 'Select a Location', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('location_id', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
  {!! Form::label('sub_location_name', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Sub location Name eg Rajgarh', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
</div>