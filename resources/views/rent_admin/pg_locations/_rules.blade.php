<div class="col-md-7">
  <div class="form-group {{ $errors->has('rules') ? 'has-error' : ''}}">
    <div class="col-md-12" id="summertext">
      {!! Form::textarea('rules', null, ['class' => 'form-control summertext']) !!}
    </div>
    {!! $errors->first('rules', '<span class="help-inline">:message</span>') !!}
  </div> 
</div>