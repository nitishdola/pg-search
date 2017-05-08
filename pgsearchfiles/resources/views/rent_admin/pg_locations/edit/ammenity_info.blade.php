@extends('layouts.rent_admin')

@section('content')
<div class="row">
        <!-- BEGIN SAMPLE FORM PORTLET-->
            {!! Form::model($pg_location, array('route' => ['rent_admin.update_pg_lcoation_basic_info', Crypt::encrypt($pg_location->id)], 'id' => 'pg_location.update', 'class' => 'form-horizontal row-border')) !!}
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="fa fa-map-marker font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase">PG Basic Details</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="form-body">
                        @include('rent_admin.pg_locations._create')
                    </div>
                </div>
            </div>

            <label class="col-md-3"></label>
            <div class="col-md-9">
                <button type="submit" class="btn btn-success btn-lg">Update</button>
            </div>
            {!! Form::close() !!}
</div>
@stop