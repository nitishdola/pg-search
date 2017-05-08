@extends('layouts.admin')

@section('content')
<?php $count = 1; ?>
<div class="row">
  <div class="col-md-12">
    <div class="portlet light bordered">
      <div class="portlet-title">
          <div class="caption">
              <i class="icon-settings font-red"></i>
              <span class="caption-subject font-red sbold uppercase">Coupons Added</span>
          </div>
      </div>
      {{ dd($results)}}
      <div class="portlet-body">
          <div class="table-scrollable">
              <table class="table table-hover tbl-border table-light">
                  <thead>
                      <tr>
                          <th> # </th>
                          <th> Coupon Code </th>
                          <th> Discount Amount </th>
                          <th> Discount Type </th>
                          <th> Active Date </th>
                          <th> Expiry Date </th>
                          <th> Provider </th>
                          <th> Coupon Type </th>
                          <th> Status </th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($results as $k => $v)
                      <tr>
                          <td> {{ (($results->currentPage() - 1 ) * $results->perPage() ) + $count + $k }} </td>
                          <td> {{ $v->coupon_code }} </td>
                          <td> {{ $v->discount_amount }} </td>
                          <td> {{ $v->discount_type }} </td>
                          <td width="10%"> {{ $v->active_date }} </td>
                          <td width="10%"> {{ $v->expiry_date }} </td>
                          <td width="25%"> <b>{{ $v->cpn_provider->rent_admin['name']}}</b> <br> PG Add : {{ $v->cpn_provider['address'] }} </td>
                          <td> {{ $v->coupon_type }} </td>
                          <td> <?php echo  ($v->status == 1) ? '<span class="btn btn-success"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Active</span>' : '<span class="btn btn-danger"><i class="fa fa-thumbs-down" aria-hidden="true"></i> Disabled</span>'; ?> </td>
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