@extends('layouts.user')

@section('content')
<section class="">
  <div class="container mt-30 mb-30 p-30">
    <div class="section-content">
      <div class="row">
        <div class="col-sm-12 col-md-9">
          <div class="row multi-row-clearfix">
            <div class="products">
            <h3>Edit Profile</h3>
              {!! Form::model($user, array('route' => 'user.update_profile', 'id' => 'user.update_profile', 'class' => 'form-horizontal row-border', 'files' => true)) !!}
              
              <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', 'Name', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-9">
                  {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name',  'maxlength' => '6', 'autocomplete' => 'off', 'required' => 'true']) !!}
                </div>
                {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
              </div>

              <div class="form-group {{ $errors->has('permanent_address') ? 'has-error' : ''}}">
                {!! Form::label('permanent_address', '', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-9">
                  {!! Form::textarea('permanent_address', null, ['class' => 'form-control', 'id' => 'permanent_address',  'rows' => '4', 'autocomplete' => 'off', 'required' => 'true']) !!}
                </div>
                {!! $errors->first('permanent_address', '<span class="help-inline">:message</span>') !!}
              </div>

               <div class="form-group {{ $errors->has('pin') ? 'has-error' : ''}}">
                {!! Form::label('state_id', 'State', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-9">
                  {!! Form::select('state_id', $states, null, ['class' => 'form-control', 'id' => 'state_id', 'placeholder' => 'Select State', 'autocomplete' => 'off', 'required' => 'true']) !!}
                </div>
                {!! $errors->first('state_id', '<span class="help-inline">:message</span>') !!}
              </div>

              <div class="form-group {{ $errors->has('city_id') ? 'has-error' : ''}}">
                {!! Form::label('city_idl', 'City', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-9">
                  <select id="cities" name="city_id" class="form-control"></select> 
                </div>
                {!! $errors->first('city_id', '<span class="help-inline">:message</span>') !!}
              </div>

              <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                {!! Form::label('email', '', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-9">
                  {!! Form::text('email', null, ['class' => 'form-control', 'reaonly' => true, 'id' => 'mobile_number', 'autocomplete' => 'off', 'required' => 'true']) !!}
                </div>
                {!! $errors->first('email', '<span class="help-inline">:message</span>') !!}
              </div>

              <div class="form-group {{ $errors->has('mobile_number') ? 'has-error' : ''}}">
                {!! Form::label('mobile_number', '', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-9">
                  {!! Form::text('mobile_number', null, ['class' => 'form-control', 'id' => 'mobile_number',  'maxlength' => '6', 'autocomplete' => 'off', 'required' => 'true']) !!}
                </div>
                {!! $errors->first('mobile_number', '<span class="help-inline">:message</span>') !!}
              </div>

              <!-- <div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
                {!! Form::label('photo', '', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-9">
                  {!! Form::file('photo', null, ['class' => 'form-control']) !!}
                </div>
                {!! $errors->first('photo', '<span class="help-inline">:message</span>') !!}
              </div>

              <div class="form-group {{ $errors->has('marksheet') ? 'has-error' : ''}}">
                {!! Form::label('marksheet', '', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-9">
                  {!! Form::file('marksheet', null, ['class' => 'form-control']) !!}
                </div>
                {!! $errors->first('marksheet', '<span class="help-inline">:message</span>') !!}
              </div> -->

              <label class="col-md-3"></label>
              <div class="col-md-9">
                  <button type="submit" class="btn btn-success btn-lg">Update Profile</button>
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


@section('pageScripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>
<script>

$(document).ready(function() { 
  $sid = $('#state_id').val();
  showCities($sid);
});
$('#state_id').change(function() {
    var $this = $(this);
    state_id = $this.val();
    showCities(state_id);
});


function showCities(state_id) { 
  if(state_id != '') {
    var data = '';
    var url  = '';

    data += '&state_id='+state_id;
    url  += "{{ route('rest.get_cities') }}";
    $.blockUI();
    $.ajax({
        data     : data,
        url      : url,
        type     : 'get',
        dataType : 'json',

        error : function(resp) {
            console.log(resp);
            alert('Oops ! Something error loading cities. Please try again later')
            $.unblockUI();
        },
        success : function(resp) { 
            $.unblockUI();
            renderCitiesUI(resp);
        }
    });
  }
}

function renderCitiesUI(resp) {
    var html = '';
    html += '';

    $.each(resp, function(index, value) {
        html += '<option value="">Select City</option>';
        if($sid == value.id) {
        html += '<option selected="selected" value="'+value.id+'">'+value.name+'</option>';  
        }
        html += '<option value="'+value.id+'">'+value.name+'</option>';
    });

    $('#cities').html(html);
}
</script>
@stop
