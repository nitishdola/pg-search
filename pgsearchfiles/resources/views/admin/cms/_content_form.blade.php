<div class="form-group {{ $errors->has('cms_code') ? 'has-error' : ''}}">
  {!! Form::label('select Contant', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::select('cms_code', $cms_codes,  null, ['class' => 'form-control',  'id' => 'cms_code', 'placeholder' => 'Select Content to Add', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('cms_code', '<span class="help-inline">:message</span>') !!}
</div>


<div class="form-group {{ $errors->has('discount_amount') ? 'has-error' : ''}}">
  {!! Form::label('title', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('title', null, ['class' => 'form-control',  'id' => 'title', 'placeholder' => 'Title', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('title', '<span class="help-inline">:message</span>') !!}
</div>


<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
  {!! Form::label('content', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::textarea('content', null, ['class' => 'form-control',  'id' => 'summernote', 'placeholder' => 'Enter Content', 'required' => 'true', 'rows' => 5]) !!}
  </div>
  {!! $errors->first('content', '<span class="help-inline">:message</span>') !!}
</div>
