@extends('layouts.admin')

@section('content')

<div class="row">
  <div class="col-md-12">
    {!! Form::open(array('route' => 'premium.upgrade.post', 'id' => 'premium.upgrade.post', 'class' => 'form-horizontal row-border')) !!}
    <div class="portlet light bordered">
      <div class="portlet-title">
          <div class="caption font-red-sunglo">
              <i class="fa fa-bolt font-red-sunglo"></i>
              <span class="caption-subject bold uppercase"> Upgrade to Premium</span>
          </div>
      </div>
      <div class="portlet-body form">
          <div class="form-body">
              <div class="col-md-9">
                  @include('admin.master.premium_account._form') 
              </div>
              <div class="clearfix"></div>
          </div>
      </div>
    </div>
    
    <label class="col-md-3"></label>
    <div class="col-md-9">
        <button type="submit" class="btn btn-success btn-lg">Upgrade</button>
    </div>
    {!! Form::close() !!}
  </div>
</div>
 @stop

 @section('pageCSS')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Zebra_datepicker/1.9.4/css/default.css">
<style>
.Zebra_DatePicker {
  z-index: 99999;
}
</style>
 @stop
 @section('pageScript')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Zebra_datepicker/1.9.4/javascript/zebra_datepicker.js"></script>

<script>
 $('input.datepicker').Zebra_DatePicker({ direction: true });
 </script>
 @stop