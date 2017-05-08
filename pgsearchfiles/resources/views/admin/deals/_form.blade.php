<div class="form-group {{ $errors->has('banner_path') ? 'has-error' : ''}}">
  {!! Form::label('banner_path', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::file('banner_path', null, ['class' => 'form-control', 'id' => 'banner_path']) !!}
  </div>
  {!! $errors->first('banner_path', '<span class="help-inline">:message</span>') !!}
</div> 

<div class="form-group {{ $errors->has('coupon_id') ? 'has-error' : ''}}">
  {!! Form::label('coupon_id', 'Select Coupon (Optional)', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::select('coupon_id', $coupons, null, ['class' => 'form-control',  'id' => 'coupon_id', 'placeholder' => 'Select Coupon',]) !!}
  </div>
  {!! $errors->first('coupon_id', '<span class="help-inline">:message</span>') !!}
</div>
