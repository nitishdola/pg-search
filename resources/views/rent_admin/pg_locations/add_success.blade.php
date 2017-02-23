@extends('layouts.rent_admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="fa fa-map-marker font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase">what's next ?</span>
                </div>
                <p>
                <a class="btn btn-square btn-sm red todo-bold" href="{{ route('pg_location.add') }}"> Add New PG Location </a>
                </p>

                <p>
                <a class="btn btn-square btn-sm green  todo-bold" href="{{ route('owner.home') }}"> Go to Home </a>
                </p>
            </div>
        </div>
    </div>
</div>
@stop
