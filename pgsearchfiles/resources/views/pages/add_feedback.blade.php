@extends('layouts.user')

@section('content')
<section class="">
  <div class="container mt-30 mb-30 p-30">
    <div class="section-content">
      <div class="row">
        <div class="col-sm-12 col-md-9">
          <div class="row multi-row-clearfix">
            <h3>Feedback</h3>
            <div class="products">
               {!! Form::open(array('route' => 'user.post_feedback', 'id' => 'user.post_feedback', 'class' => 'form-horizontal row-border')) !!}
               <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                  {!! Form::label('name', 'Name*', array('class' => 'col-md-3 control-label')) !!}
                  <div class="col-md-9">
                    {!! Form::text('name', null, ['class' => 'form-control required', 'id' => 'name',  'autocomplete' => 'off', 'required' => 'true']) !!}
                  </div>
                  {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('mobile') ? 'has-error' : ''}}">
                  {!! Form::label('mobile', 'Mobile*', array('class' => 'col-md-3 control-label')) !!}
                  <div class="col-md-9">
                    {!! Form::text('mobile', null, ['class' => 'form-control required', 'id' => 'mobile',  'autocomplete' => 'off', 'required' => 'true']) !!}
                  </div>
                  {!! $errors->first('mobile', '<span class="help-inline">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                  {!! Form::label('email', '', array('class' => 'col-md-3 control-label')) !!}
                  <div class="col-md-9">
                    {!! Form::email('email', null, ['class' => 'form-control required', 'id' => 'email',  'autocomplete' => 'off']) !!}
                  </div>
                  {!! $errors->first('email', '<span class="help-inline">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('subject') ? 'has-error' : ''}}">
                  {!! Form::label('subject', 'Subject*', array('class' => 'col-md-3 control-label')) !!}
                  <div class="col-md-9">
                    {!! Form::text('subject', null, ['class' => 'form-control required', 'id' => 'subject',  'autocomplete' => 'off', 'required' => 'true']) !!}
                  </div>
                  {!! $errors->first('subject', '<span class="help-inline">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('message') ? 'has-error' : ''}}">
                  {!! Form::label('message', 'Message*', array('class' => 'col-md-3 control-label')) !!}
                  <div class="col-md-9">
                    {!! Form::textarea('message', null, ['class' => 'form-control required', 'id' => 'message',  'rows' => 3, 'autocomplete' => 'off', 'required' => 'true']) !!}
                  </div>
                  {!! $errors->first('message', '<span class="help-inline">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('message') ? 'has-error' : ''}}">
                  {!! Form::label('', '', array('class' => 'col-md-3 control-label')) !!}
                  <div class="col-md-9">
                    <button class="btn btn-success">Submit</button>
                  </div>
                  {!! $errors->first('message', '<span class="help-inline">:message</span>') !!}
                </div>
               {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@stop
