@for($i = 0; $i < 3; $i++)
<div class="col-md-7 imagepg">
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
<button class="btn btn-warning btn-xs" id="addmorepic" type="button">Add More Image</button>
<button class="btn btn-danger btn-xs" id="removepic" type="button" style="display: none">Remove Image</button>
</div>
<div class="clearfix"></div>