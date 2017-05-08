<div class="form-group {{ $errors->has('pg_location_id') ? 'has-error' : ''}}">
  {!! Form::label('pg_location', 'Select PG Address', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::select('pg_location_id', $pg_locations, null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Select PG', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('pg_location_id', '<span class="help-inline">:message</span>') !!}
</div>


<div class="form-group {{ $errors->has('amount_paid') ? 'has-error' : ''}}">
  {!! Form::label('amount_paid', 'Amount Paid', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::number('amount_paid',  null, ['class' => 'form-control', 'id' => 'amount_paid', 'placeholder' => 'Amount Paid', 'step' => '0.01', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('amount_paid', '<span class="help-inline">:message</span>') !!}
</div>



<div class="form-group {{ $errors->has('premium_start_date') ? 'has-error' : ''}}">
  {!! Form::label('premium_start_date', 'Start Date', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-5">
    {!! Form::text('premium_start_date', null, ['class' => 'datepicker form-control', 'id' => 'premium_start_date', 'placeholder' => 'Select Date From ', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('premium_start_date', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('premium_expiry_date') ? 'has-error' : ''}}">
  {!! Form::label('premium_expiry_date', 'Expiry Date', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-5">
    {!! Form::text('premium_expiry_date', null, ['class' => 'datepicker form-control', 'id' => 'premium_expiry_date', 'placeholder' => 'Select Expiry Date ', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('premium_expiry_date', '<span class="help-inline">:message</span>') !!}
</div>