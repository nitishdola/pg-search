@extends('layouts.admin')

@section('content')

<div class="row">
  <div class="col-md-12">
    {!! Form::open(array('route' => 'cms.post_home_banner', 'id' => 'cms.post_home_banner', 'class' => 'form-horizontal row-border', 'files' => true)) !!}

    <div class="portlet light bordered">
		<div class="portlet-title">
		  <div class="caption font-red-sunglo">
		      <i class="fa fa-map-pin font-red-sunglo"></i>
		      <span class="caption-subject bold uppercase"> ADD A BANNER</span>
		  </div>
		</div>
	    @include('admin.home_banners._form') 
	    <label class="col-md-3"></label>
	    <div class="col-md-9">
	        <button type="submit" class="btn btn-success btn-lg">ADD BANNER</button>
	    </div>
	    {!! Form::close() !!}
	  </div>
	</div>
</div>
@stop