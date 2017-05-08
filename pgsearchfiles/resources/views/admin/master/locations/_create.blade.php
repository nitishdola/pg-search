<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
  {!! Form::label('location_name', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Location Name eg Kahilipara', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
</div>


<div class="form-group {{ $errors->has('file') ? 'has-error' : ''}}">
  {!! Form::label('Location Image', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::file('file', null, ['class' => 'form-control', 'id' => 'file', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('file', '<span class="help-inline">:message</span>') !!}
</div>