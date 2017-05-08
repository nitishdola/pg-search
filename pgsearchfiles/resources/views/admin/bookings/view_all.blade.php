@extends('layouts.admin')

@section('content')
<?php $count = 1; ?>
<div class="row">
  <div class="col-md-12">
    <div class="portlet light bordered">
      <div class="portlet-title">
          <div class="caption">
              <i class="icon-settings font-red"></i>
              <span class="caption-subject font-red sbold uppercase">All Bookings</span>
          </div>
      </div>
      <div class="portlet-body">
          @if($results)
          <div class="table-scrollable">
              <table class="table table-hover table-light">
                  <thead>
                      <tr>
                          <th> # </th>
                          <th> Tenant Name </th>
                          <th> Tenant Address </th>
                          <th> Tenant Phone Number </th>
                          <th> Booking Date </th>
                          <th width="30%"> PG Location  </th>
                          <th> PG Owner Phone Number </th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($results as $k => $v)
                      <tr>
                          <td> {{ (($results->currentPage() - 1 ) * $results->perPage() ) + $count + $k }} </td>
                          <td> {{ $v->user['name'] }} </td>
                          <td> {{ $v->user['permanent_address'] }} </td>
                          <td> {{ $v->user['mobile_number'] }} </td>
                          <td> {{ date('d-m-Y h:i A', strtotime($v->booking_date)) }} </td>
                          <td width="30%"> {{ $v->pg_room->pg_location['address'] }}  </td>
                          <td> {{ $v->pg_room->pg_location->rent_admin['name'] }} ( {{ $v->pg_room->pg_location->rent_admin['phone_number'] }} )</td>
                         
                      </tr>
                    @endforeach
                  </tbody>
              </table>
              <div class="pagination">
                {!! $results->render() !!}
              </div>
          </div>
          @else
          <h4>NO RESULTS FOUND</h4>
          @endif
      </div>
  </div>        
  </div>
</div>
@stop