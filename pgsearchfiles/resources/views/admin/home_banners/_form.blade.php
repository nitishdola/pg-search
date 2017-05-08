
  <div class="portlet-body form">
      <div class="form-body">
          <div class="col-md-9">
              <div class="form-group {{ $errors->has('banner_path') ? 'has-error' : ''}}">
                {!! Form::label('banner_path*', '', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-9">
                  {!! Form::file('banner_path', null, ['class' => 'form-control', 'id' => 'banner_path']) !!}
                </div>
                <p>** Maximum size 2MB. Only jpg/png formats are allowed</p>
                {!! $errors->first('banner_path', '<span class="help-inline">:message</span>') !!}
              </div> 

              <div class="form-group {{ $errors->has('quote') ? 'has-error' : ''}}">
                {!! Form::label('quote', '', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-9">
                  {!! Form::text('quote', null, ['class' => 'form-control', 'id' => 'quote']) !!}
                </div>

                {!! $errors->first('quote', '<span class="help-inline">:message</span>') !!}
              </div> 

              <div class="form-group {{ $errors->has('sub_quote') ? 'has-error' : ''}}">
                {!! Form::label('sub_quote', '', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-9">
                  {!! Form::text('sub_quote', null, ['class' => 'form-control', 'id' => 'sub_quote']) !!}
                </div>

                {!! $errors->first('sub_quote', '<span class="help-inline">:message</span>') !!}
              </div> 

          </div>
          <div class="clearfix"></div>
      </div>
  </div>
</div>