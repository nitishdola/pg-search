@extends('layouts.admin')

@section('content')
<?php $count = 1; ?>
<div class="row">
  <div class="col-md-12">
    <div class="portlet light bordered">
      <div class="portlet-title">
          <div class="caption">
              <i class="icon-settings font-red"></i>
              <span class="caption-subject font-red sbold uppercase">Landmarks Added</span>
          </div>
      </div>
      <div class="portlet-body">
          <div class="table-scrollable">
              <table class="table table-hover table-light">
                  <thead>
                      <tr>
                          <th> # </th>
                          <th> Name </th>
                          <th> Latitude </th>
                          <th> Longitude </th>
                          <th> Status </th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($landmarks as $k => $v)
                      <tr>
                          <td> {{ (($landmarks->currentPage() - 1 ) * $landmarks->perPage() ) + $count + $k }} </td>
                          <td> {{ $v->name }} </td>
                          <td> {{ $v->latitude }} </td>
                          <td> {{ $v->longitude }} </td>
                          <td>
                              @if($v->status)
                              <span class="label label-sm label-success"> Active </span>
                              @else
                              <span class="label label-sm label-success"> Disabled </span>
                              @endif
                          </td>
                      </tr>
                    @endforeach
                  </tbody>
              </table>
              <div class="pagination">
                {!! $landmarks->render() !!}
              </div>
          </div>
      </div>
  </div>        
  </div>
</div>
@stop