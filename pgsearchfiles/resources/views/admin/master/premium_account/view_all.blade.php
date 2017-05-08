@extends('layouts.admin')

@section('content')
<?php $count = 1; ?>
<div class="row">
  <div class="col-md-12">
    <div class="portlet light bordered">
      <div class="portlet-title">
          <div class="caption">
              <i class="icon-settings font-red"></i>
              <span class="caption-subject font-red sbold uppercase">All Premium Accounts</span>
          </div>
      </div>
      <div class="portlet-body">
          <div class="table-scrollable">
              <table class="table table-hover table-light">
                  <thead>
                      <tr>
                          <th> # </th>
                          <th> Owner Name </th>
                          <th> Location Address </th>
                          <th> Amount Paid </th>
                          <th> Satrts </th>
                          <th> Expires </th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($results as $k => $v)
                      <tr>
                          <td> {{ (($results->currentPage() - 1 ) * $results->perPage() ) + $count + $k }} </td>
                          <td> {{ $v->pg_location->rent_admin['name'] }} </td>
                          <td> {{ $v->pg_location->address }} </td>
                          <td> {{ $v->amount_paid }} </td>
                          <td> {{ date('d-m-Y', strtotime($v->premium_start_date)) }} </td>
                          <td> {{ date('d-m-Y', strtotime($v->premium_expiry_date)) }} </td>
                      </tr>
                    @endforeach
                  </tbody>
              </table>
              <div class="pagination">
                {!! $results->render() !!}
              </div>
          </div>
      </div>
  </div>        
  </div>
</div>
@stop