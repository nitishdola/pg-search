@extends('layouts.admin')

@section('content')
<?php $count = 1; ?>
<div class="row">
  <div class="col-md-12">
    <div class="portlet light bordered">
      <div class="portlet-title">
          <div class="caption">
              <i class="icon-settings font-red"></i>
              <span class="caption-subject font-red sbold uppercase">CMS Content Added</span>
          </div>
      </div>
      <div class="portlet-body">
          <div class="table-scrollable">
              <table class="table table-hover tbl-border">
                  <thead>
                      <tr>
                          <th> # </th>
                          <th> Title </th>
                          <th> Content </th>
                          <td> Action </td>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($results as $k => $v)
                      <tr>
                          <td> {{ (($results->currentPage() - 1 ) * $results->perPage() ) + $count + $k }} </td>
                          <td> {{ $v->title }} </td>
                          <td width="55%"> {!! $v->content !!} </td>
                          <td> <a href="{{ route('cms.edit', Crypt::encrypt($v->id)) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></td>
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