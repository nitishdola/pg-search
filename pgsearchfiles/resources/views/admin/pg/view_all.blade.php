@extends('layouts.admin')

@section('content')
<?php $count = 1; ?>
<div class="row">
  <div class="col-md-12">
    <div class="portlet light bordered">
      <div class="portlet-title">
          <div class="caption">
              <i class="icon-settings font-red"></i>
              <span class="caption-subject font-red sbold uppercase">All PGs</span>
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
                          <th> Gender </th>
                          <th> Landmark </th>
                          <th> Location/SubLocation </th>
                          <th> Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($results as $k => $v)
                      <tr>
                          <td> {{ (($results->currentPage() - 1 ) * $results->perPage() ) + $count + $k }} </td>
                          <td> {{ $v->rent_admin['name'] }} </td>
                          <td> {{ $v->address }} </td>
                          <td> {{ $v->gender }} </td>
                          <td> {{ $v->landmark['name'] }} </td>
                          <td> {{ $v->location['name'] }}, {{ $v->sub_location['name'] }} </td>
                          <td> <a href="{{ route('admin.remove_pg_location', $v->id) }}" clas="btn btn-danger btn-xs" onclick="return confirm('Are you sure ?')"> Remove </a> </td>
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