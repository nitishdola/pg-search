@extends('layouts.rent_admin')

@section('content')
<?php $count = 1; ?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="fa fa-map-marker font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase">My Pgs</span>
                </div>
            </div>
            <div class="portlet-body form">
                <div class="form-body">
                    <div class="table-scrollable">
                      <table class="table table-hover table-light">
                          <thead>
                              <tr>
                                  <th> # </th>
                                  <th> Location Address </th>
                                  <th> Gender </th>
                                  <th> Landmark </th>
                                  <th> Location/SubLocation </th>
                                  <!-- <th> Action</th> -->
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($results as $k => $v)
                              <tr>
                                  <td> {{ (($results->currentPage() - 1 ) * $results->perPage() ) + $count + $k }} </td>
                                  <td> {{ $v->address }} </td>
                                  <td> {{ $v->gender }} </td>
                                  <td> {{ $v->landmark['name'] }} </td>
                                  <td> {{ $v->location['name'] }}, {{ $v->sub_location['name'] }} </td>
                                  <td> <a href="{{ route('rent_admin.view_pg_location', Crypt::encrypt($v->id)) }}" clas="btn btn-danger btn-xs"> View </a> </td>
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
</div>
@stop
