@extends('layouts.admin')

@section('content')

<div class="row">
  <div class="col-md-12">
    {!! Form::model($home_banner,array('route' => ['cms.update_home_banner', $home_banner->id], 'id' => 'cms.update_home_banner', 'class' => 'form-horizontal row-border', 'files' => true)) !!}

    <div class="col-md-6 col-md-offset-3">
    <img src="{{ asset('pgsearchfiles/public/uploads/home_banners/'.$home_banner->banner_path) }}" width="500" height="400">
    </div>
    <div class="portlet light bordered">
		<div class="portlet-title">
		  <div class="caption font-red-sunglo">
		      <i class="fa fa-map-pin font-red-sunglo"></i>
		      <span class="caption-subject bold uppercase"> Edit A BANNER</span>
		  </div>
		</div>
	    @include('admin.home_banners._form') 
	    <label class="col-md-3"></label>
	    <div class="col-md-9">
	        <button type="submit" class="btn btn-success btn-lg">Update BANNER</button>
	    </div>
	    {!! Form::close() !!}
	  </div>
	</div>
</div>
@stop