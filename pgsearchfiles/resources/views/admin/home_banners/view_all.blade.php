@extends('layouts.admin')

@section('content')
<?php $count = 1; ?>
<div class="row">
  <div class="col-md-12">
    <div class="portlet light bordered">
      <div class="portlet-title">
          <div class="caption">
              <i class="icon-settings font-red"></i>
              <span class="caption-subject font-red sbold uppercase">All Home Banners</span>
          </div>
      </div>
      <div class="portlet-body">
          @if($results)
          <div class="table-scrollable">
              <table class="table table-hover table-light">
                  <thead>
                      <tr>
                          <th> # </th>
                          <th>  Banner </th>
                          <th>  Quote </th>
                          <th>  Sub Quote </th>
                          <th>  Status </th>
                          <th > Action  </th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($results as $k => $v)
                      <tr>
                          <td> {{ (($results->currentPage() - 1 ) * $results->perPage() ) + $count + $k }} </td>
                          <td> <img src="{{ asset('pgsearchfiles/public/uploads/home_banners/'.$v->banner_path) }}" width="200" height="200" > </td>
                          <td> {{ $v->quote }} </td>
                          <td> {{ $v->sub_quote }} </td>
                          <td> @if($v->status) <button class="btn btn-success btn-xs">Active</button> @else <button class="btn btn-danger btn-xs">Disabled</button> @endif </td>
                          <td width="30%"> 
                          <a href="{{ route('cms.edit_home_banner', $v->id) }}">Edit</a> <br> 
                          @if($v->status) <a href="{{ route('cms.disable_home_banner',$v->id) }}" onclick="return confirm('Are you sure ?')">Disable this Banner</a> @else <a href="{{ route('cms.activate_home_banner',$v->id) }}" onclick="return confirm('Are you sure ?')">Enable this Banner</a> @endif   
                          </td>
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