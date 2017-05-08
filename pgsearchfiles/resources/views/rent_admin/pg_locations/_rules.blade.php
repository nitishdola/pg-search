<div class="col-md-7">
  <div class="form-group {{ $errors->has('rules') ? 'has-error' : ''}}">
    {!! Form::label('rules', '', array('class' => 'col-md-3 control-label left-align')) !!}
    <div class="col-md-12 ">
      {!! Form::textarea('rules', null, ['class' => 'form-control summertext', 'required' => 'true']) !!}
    </div>
    {!! $errors->first('rules', '<span class="help-inline">:message</span>') !!}
  </div> 
</div>

<div class="col-md-7">
  <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', '', array('class' => 'col-md-3 control-label left-align')) !!}
    <div class="col-md-12">
      {!! Form::textarea('description', null, ['cols' => 4, 'class' => 'form-control summertext', 'required' => 'true']) !!}
    </div>
    {!! $errors->first('description', '<span class="help-inline">:message</span>') !!}
  </div> 
</div>

<div class="col-md-7">
  <div class="form-group {{ $errors->has('advantages') ? 'has-error' : ''}}">
    {!! Form::label('advantages', '', array('class' => 'col-md-3 control-label left-align')) !!}
    <div class="col-md-12">
      {!! Form::textarea('advantages', null, ['class' => 'form-control summertext']) !!}
    </div>
    {!! $errors->first('advantages', '<span class="help-inline">:message</span>') !!}
  </div> 
</div>
<div class="clearfix"></div>