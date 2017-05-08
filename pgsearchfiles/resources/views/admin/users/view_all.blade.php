@extends('layouts.admin')

@section('content')
<?php $count = 1; ?>
<div class="row">
  <div class="col-md-12">
    <div class="portlet light bordered">
      <div class="portlet-title">
          <div class="caption">
              <i class="icon-settings font-red"></i>
              <span class="caption-subject font-red sbold uppercase">All Registered Users</span>
          </div>
      </div>
      <div class="portlet-body">
          <div class="table-scrollable">
              <table class="table table-hover table-light">
                  <thead>
                      <tr>
                          <th> # </th>
                          <th>  Name </th>
                          <th> Permanent Address </th>
                          <th> District </th>
                          <th> State </th>
                          <th> Mobile Number </th>
                          <th> Email </th>

                          <th> Member Since </th>
                          <th> Remove </th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($results as $k => $v)
                      <tr>
                          <td> {{ (($results->currentPage() - 1 ) * $results->perPage() ) + $count + $k }} </td>
                          <td> {{ $v->name }} </td>
                          <td> {{ $v->permanent_address }} </td>
                          <td> {{ $v->district['name'] }} </td>
                          <td> {{ $v->state['name']}} </td>
                          <td> {{ $v->mobile_number}} </td>
                          <td> {{ $v->email }} </td>
                          <td> {{ date('d-m-Y', strtotime($v->created_at)) }} </td>
                          <td> <a href="{{ route('remove_user', $v->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure ?')">Delete User</a></td> 
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