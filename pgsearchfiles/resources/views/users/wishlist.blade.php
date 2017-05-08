@extends('layouts.user')

@section('content')
<section class="">
  <div class="container mt-30 mb-30 p-30">
    <div class="section-content">
      <div class="row">
        <div class="col-sm-12 col-md-9">
          <div class="row multi-row-clearfix">
            <div class="products">
            <h3>Wishlist</h3>
              <ul class="list-group">
                @foreach($results as $k => $v)
                <?php $pg_name = $v->pg_location['id'].' ENROLLSPACE '.$v->pg_location->location['name']; ?>
                <li class="list-group-item">
                <a href="{{ route('pg.view',[str_replace(' ', '-',$pg_name), 'find-pg-rooms-in-'.$v->pg_location->location['name'], Crypt::encrypt($v->pg_location['id'])] ) }}">{{ $pg_name }}</a></li>
                @endforeach
              </ul>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@stop
