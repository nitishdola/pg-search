@extends('layouts.admin')

@section('content')

<div class="row">
  <div class="col-md-12">
    {!! Form::model($location, array('route' => ['location.update', $location->id], 'id' => 'location.update', 'class' => 'form-horizontal row-border', 'files' => true)) !!}
    <div class="portlet light bordered">
      <div class="portlet-title">
          <div class="caption font-red-sunglo">
              <i class="fa fa-map-pin font-red-sunglo"></i>
              <span class="caption-subject bold uppercase"> Edit LOCATION</span>
          </div>
      </div>
      <div class="portlet-body form">
          <div class="form-body">
              <div class="col-md-9">
                  @include('admin.master.locations._create') 
              </div>
              <div class="clearfix"></div>
          </div>
      </div>
    </div>
    
    <label class="col-md-3"></label>
    <div class="col-md-9">
        <button type="submit" class="btn btn-success btn-lg">Update</button>
    </div>
    {!! Form::close() !!}
  </div>
</div>
 @stop