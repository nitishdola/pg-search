@extends('layouts.admin')

@section('content')
<?php $count = 1; ?>
<div class="row">
  <div class="col-md-12">
    <div class="portlet light bordered">
      <div class="portlet-title">
          <div class="caption">
              <i class="icon-settings font-red"></i>
              <span class="caption-subject font-red sbold uppercase">Sub Locations Added</span>
          </div>
      </div>
      <div class="portlet-body">
        <div style="padding:10px; border:1px solid  #CDCFD1"> 
          {!! Form::open(array('route' => 'sub_location.index', 'method' => 'GET', 'id' => 'sub_location.index', 'class' => 'form-horizontal row-border')) !!}
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="fa fa-map-pin font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase"> Search</span>
                </div>
            </div>

            <div class="form-group">
              {!! Form::label('location_name', '', array('class' => 'col-md-3 control-label')) !!}
              <div class="col-md-6">
                {!! Form::select('location_id', $locations, null, ['class' => 'form-control', 'id' => 'location_id', 'placeholder' => 'Select a Location', 'required' => 'true']) !!}
              </div>

              <div class="col-md-3">
                <button type="submit" class="btn btn-success">Search</button>
              </div>
            </div>
          {!! Form::close() !!}
        </div>

          <div class="table-scrollable">
              
              <table class="table table-hover table-light">
                  <thead>
                      <tr>
                          <th> # </th>
                          <th> Location</th>
                          <th> Sub Location </th>
                          <th> Action </th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($results as $k => $v)
                      <tr>
                          <td> {{ (($results->currentPage() - 1 ) * $results->perPage() ) + $count + $k }} </td>
                          <td> {{ $v->location['name'] }}</td>
                          <td> {{ $v->name }} </td>
                          <td> <a class="btn btn-info btn-xs" href="{{ route('sub_location.edit', $v->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                          <a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure ?');" href="{{ route('sub_location.remove', $v->id) }}"><i class="fa fa-trash" aria-hidden="true"></i> Remove</a>
                           </td>
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