@extends('layouts.user')

@section('content')
<section class="">
  <div class="container mt-30 mb-30 p-30">
    <div class="section-content">
      <div class="row">
        <div class="col-sm-12 col-md-9">
          <div class="row multi-row-clearfix">
            <h3>Feedback</h3>
            <div class="products">
              @if(Session::has('feedback_message'))
              <div class="row">
                <div class="col-lg-12">
                    <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {!! Session::get('feedback_message') !!}
                    </div>
                </div>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@stop
