@extends('layouts.rent_admin')

@section('content')
<div class="row">
<div class="col-md-6 ">
    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption font-red-sunglo">
                <i class="icon-settings font-red-sunglo"></i>
                <span class="caption-subject bold uppercase"> Default Form</span>
            </div>
        </div>
        <div class="portlet-body form">
            <form role="form">
                <div class="form-body">
                    @include('rent_admin.pg_locations._create')
                </div>
            </form> 
        </div>
    </div>
</div>
</div>
@stop