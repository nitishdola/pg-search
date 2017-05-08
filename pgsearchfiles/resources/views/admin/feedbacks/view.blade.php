@extends('layouts.admin')

@section('content')
<?php $count = 1; ?>
<div class="row">
  <div class="col-md-12">
    <div class="portlet light bordered">
      <div class="portlet-title">
          <div class="caption">
              <i class="icon-settings font-red"></i>
              <span class="caption-subject font-red sbold uppercase">All Feedbacks</span>
          </div>
      </div>
      <div class="portlet-body">
          @if($results)
          <div class="table-scrollable">
              <table class="table table-hover table-light">
                  <thead>
                      <tr>
                          <th> # </th>
                          <th>  Name </th>
                          <th>  Email </th>
                          <th>  Phone Number </th>
                          <th>  Subject </th>
                          <th width="30%"> Message  </th>
                          <th> Date </th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($results as $k => $v)
                      <tr>
                          <td> {{ (($results->currentPage() - 1 ) * $results->perPage() ) + $count + $k }} </td>
                          <td> {{ $v->name }} </td>
                          <td> {{ $v->email }} </td>
                          <td> {{ $v->mobile }} </td>
                          <td> {{ $v->subject }} </td>
                          <td width="30%"> {{ $v->message }}  </td>
                          <td> {{ date('d-m-Y', strtotime($v->created_at)) }} </td>
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