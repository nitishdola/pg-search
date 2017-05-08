@for($i = 0; $i < 3; $i++)
<div class="col-md-7 roomspg">
    <div class="form-group {{ $errors->has('room_type_id') ? 'has-error' : ''}}">
      {!! Form::label('room_type', '', array('class' => 'col-md-3 control-label')) !!}
      <div class="col-md-6">
        {!! Form::select('room_type_id[]', $room_types, null, ['class' => 'form-control', 'id' => 'room_type_id', 'placeholder' => 'Select Room Type']) !!}
      </div>
      {!! $errors->first('room_type_id', '<span class="help-inline">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('rent_per_bed') ? 'has-error' : ''}}">
      {!! Form::label('rent_per_bed', '', array('class' => 'col-md-3 control-label')) !!}
      <div class="col-md-6">
        {!! Form::number('rent_per_bed[]', null, ['class' => 'form-control', 'id' => 'rent_per_bed', 'placeholder' => 'Rent Per Bed', 'step' => '0.01']) !!}
      </div>
      {!! $errors->first('rent_per_bed', '<span class="help-inline">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
      {!! Form::label('upload_image', '', array('class' => 'col-md-3 control-label')) !!}
      <div class="col-md-6">
        {!! Form::file('image[]', null) !!}
      </div>
      {!! $errors->first('image', '<span class="help-inline">:message</span>') !!}
    </div> 
     
</div>
@endfor
<div class="col-md-12">
<button class="btn btn-warning btn-xs" id="addmoreroom" type="button">Add More Room</button>
<button class="btn btn-danger btn-xs" id="removeroom" type="button" style="display: none">Remove Room</button>
</div>
<div class="clearfix"></div>