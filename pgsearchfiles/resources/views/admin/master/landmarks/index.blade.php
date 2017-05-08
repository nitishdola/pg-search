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
                          <th> Edit </th>
                          <th> Remove </th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($landmarks as $k => $v)
                      <tr>
                          <td> {{ (($landmarks->currentPage() - 1 ) * $landmarks->perPage() ) + $count + $k }} </td>
                          <td> {{ $v->name }} </td>
                          <td> {{ $v->latitude }} </td>
                          <td> {{ $v->longitude }} </td>
                          <td> <a href="{{ route('master.landmark.edit', Crypt::encrypt($v->id) ) }}" title="Edit Landmark" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit </a> </td>
                          <td>
                              <a href="{{ route('master.landmark.remove', Crypt::encrypt($v->id) ) }}" title="Remove Landmark" onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i> Remove </a>
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