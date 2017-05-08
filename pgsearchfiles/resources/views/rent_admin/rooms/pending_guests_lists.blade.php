@extends('layouts.rent_admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-social-dribbble font-green"></i>
                    <span class="caption-subject font-green bold uppercase">Accept Guest </span>
                </div>
            </div>
            <div class="portlet-body">
                @if(count($results))
                <div class="table-scrollable">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Guest Name </th>
                                <th> Booking Date </th>
                                <th> Expiry Date </th>
                                <th> Type of Booking </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($results as $k => $v)
                            <tr>
                                <td> {{ $k+1}} </td>
                                <td> {{ $v->user['name'] }} </td>
                                <td> {{ date('d-m-Y h:i A', strtotime($v->booking_date)) }} </td>
                                <td> {{ date('d-m-Y h:i A', strtotime($v->booking_expiry_date)) }} </td>
                                <th> {{ ucfirst($v->booking_type) }} </th>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('accept.guest', Crypt::encrypt($v->id))}}" class="btn btn-default">Accept</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    No Results Found
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@stop
