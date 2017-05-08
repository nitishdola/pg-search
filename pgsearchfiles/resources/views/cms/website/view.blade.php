@extends('layouts.user')

@section('pageTitle') {{ str_replace('-',' ',$contents->title) }} @stop
@section('content')

<section>
  <div class="container" style="background: #F4F4F4">
    <div class="row mtli-row-clearfix">
      <div class="col-sm-6 col-md-10 col-lg-10">
        <div class="causes maxwidth500 mb-30">
        <h3> {{ $contents->title }} </h3>
        {!! $contents->content !!}
        </div>
    </div>
  </div>
</section>

@stop
