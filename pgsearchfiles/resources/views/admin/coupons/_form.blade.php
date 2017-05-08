<div class="form-group {{ $errors->has('coupon_code') ? 'has-error' : ''}}">
  {!! Form::label('coupon_code', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('coupon_code', null, ['class' => 'form-control', 'id' => 'coupon_code', 'placeholder' => 'Coupon Code', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('coupon_code', '<span class="help-inline">:message</span>') !!}
</div> 

<div class="form-group {{ $errors->has('discount_amount') ? 'has-error' : ''}}">
  {!! Form::label('discount_amount', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::number('discount_amount', null, ['class' => 'form-control',  'id' => 'discount_amount', 'placeholder' => 'Discount Amount eg 200.00', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('discount_amount', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('discount_type') ? 'has-error' : ''}}">
  <label class="col-sm-3 control-label">Inline Radio</label>
  <div class="col-sm-6">
    <label class="radio-inline"><input type="radio" checked="" name="discount_type" value="price"> Price </label>
    <label class="radio-inline"><input type="radio" name="discount_type" value="percentage"> Percentage</label>
  </div>
  {!! $errors->first('discount_type', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('active_date') ? 'has-error' : ''}}">
  {!! Form::label('active_date', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('active_date', date('Y-m-d'), ['class' => 'datePickFWD form-control',  'id' => 'active_date', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('active_date', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('expiry_date') ? 'has-error' : ''}}">
  {!! Form::label('expiry_date', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('expiry_date', null , ['class' => 'datePickFWD form-control',  'id' => 'expiry_date', 'placeholder' => 'Expiry Date']) !!}
  </div>
  {!! $errors->first('expiry_date', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('provider') ? 'has-error' : ''}}">
  {!! Form::label('provider', 'Select PG', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::select('provider', $pg_locations, null , ['class' => 'form-control',  'id' => 'provider', 'placeholder' => 'Valid for All PG']) !!}
  </div>
  {!! $errors->first('provider', '<span class="help-inline">:message</span>') !!}
</div>


<div class="form-group {{ $errors->has('coupon_type') ? 'has-error' : ''}}">
  {!! Form::label('coupon_type', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::select('coupon_type', $coupon_types, null , ['class' => 'form-control',  'id' => 'coupon_type', 'placeholder' => 'Select Coupon Type', 'required' => true]) !!}
  </div>
  {!! $errors->first('coupon_type', '<span class="help-inline">:message</span>') !!}
</div>
