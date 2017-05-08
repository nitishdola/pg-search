@extends('layouts.user')

@section('pageCss')
<style>
  .pac-item {
    padding: 5px;
  }
  .pac-icon:hover {
    color: #97F50F;
  }
 .center-block {
    float: none;
    margin-left: auto;
    margin-right: auto;
  }

  .input-group .icon-addon .form-control {
      border-radius: 0;
  }

  .icon-addon {
      position: relative;
      color: #555;
      display: block;
  }

  .icon-addon:after,
  .icon-addon:before {
      display: table;
      content: " ";
  }

  .icon-addon:after {
      clear: both;
  }

  .icon-addon.addon-md .glyphicon,
  .icon-addon .glyphicon, 
  .icon-addon.addon-md .fa,
  .icon-addon .fa {
      position: absolute;
      z-index: 2;
      left: 10px;
      font-size: 14px;
      width: 20px;
      margin-left: -2.5px;
      text-align: center;
      padding: 10px 0;
      top: 1px
  }

  .icon-addon.addon-lg .form-control {
      line-height: 1.33;
      height: 46px;
      font-size: 18px;
      padding: 10px 16px 10px 40px;
  }

  .icon-addon.addon-sm .form-control {
      height: 30px;
      padding: 5px 10px 5px 28px;
      font-size: 12px;
      line-height: 1.5;
  }

  .icon-addon.addon-lg .fa,
  .icon-addon.addon-lg .glyphicon {
      font-size: 18px;
      margin-left: 0;
      left: 11px;
      top: 4px;
  }

  .icon-addon.addon-md .form-control,
  .icon-addon .form-control {
      padding-left: 30px;
      float: left;
      font-weight: normal;
  }

  .icon-addon.addon-sm .fa,
  .icon-addon.addon-sm .glyphicon {
      margin-left: 0;
      font-size: 12px;
      left: 5px;
      top: -1px
  }

  .icon-addon .form-control:focus + .glyphicon,
  .icon-addon:hover .glyphicon,
  .icon-addon .form-control:focus + .fa,
  .icon-addon:hover .fa {
      color: #000000;
  }
</style>
@stop


@section('content')
<section id="home">
  <div class="container-fluid p-0">
    
    <!-- Slider Revolution Start -->
    <div class="rev_slider_wrapper">
      <div class="rev_slider rev_slider_default" data-version="5.0">
      
      <div  align="center" style="width:100%; position:absolute; z-index:9999; margin-top:15%">
      
        <div align="center" class="col-md-8 col-md-offset-2" >
          <div class="widget dark">
            <h5 class="widget-title mb-10">&nbsp;</h5>
            <!-- Mailchimp Subscription Form Starts Here -->
            <form class="newsletter-form" action="{{ route('pg.search_by_geolocation') }}">
              <div class="input-group">
                <div class="icon-addon addon-lg">
                    <input type="text" id="pgLocation" name="pg_location" placeholder="Search your space" class="form-control input-lg font-16" data-height="45px" style="height: 45px;">
                    <label for="email" class="glyphicon glyphicon-map-marker" rel="tooltip" title="PG Location"></label>
                </div>
                

                <input type="hidden" id="place" name="place" />
                <input type="hidden" id="placeLat" name="placeLat" />
                <input type="hidden" id="placeLong" name="placeLong" />  

                <span class="input-group-btn">
                  <button data-height="45px" class="btn btn-colored btn-theme-colored btn-xs m-0 font-14" type="submit">Search</button>
                </span>
              </div>
            </form>
          </div>
        </div>
      </div>
        <ul>

        @foreach($home_banners as $banner)
        <li data-index="rs-1" data-transition="slidingoverlayhorizontal" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="{{ asset('assets/user/images/bg/bg14.jpg') }}" data-rotate="0" data-saveperformance="off" data-title="Slide 1" data-description="">
            <!-- MAIN IMAGE -->
            <img src="{{ asset('pgsearchfiles/public/uploads/home_banners/'.$banner->banner_path) }}"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="10" data-no-retina>
            <!-- LAYERS -->

            <!-- LAYER NR. 1 -->
            <div class="tp-caption tp-resizeme text-uppercase  bg-dark-transparent text-white font-raleway pl-30 pr-30"
              id="rs-1-layer-1"
            
              data-x="['center']"
              data-hoffset="['0']"
              data-y="['middle']"
              data-voffset="['-90']" 
              data-fontsize="['28']"
              data-lineheight="['54']"
              data-width="none"
              data-height="none"
              data-whitespace="nowrap"
              data-transform_idle="o:1;s:500"
              data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
              data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
              data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
              data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
              data-start="1000" 
              data-splitin="none" 
              data-splitout="none" 
              data-responsive_offset="on"
              style="z-index: 7; white-space: nowrap; font-weight:400; border-radius: 30px;">{{ $banner->quote }}
            </div>

            <!-- LAYER NR. 2 -->
            <div class="tp-caption tp-resizeme text-uppercase bg-theme-colored-transparent text-white font-raleway pl-30 pr-30"
              id="rs-1-layer-2"

              data-x="['center']"
              data-hoffset="['0']"
              data-y="['middle']"
              data-voffset="['-20']"
              data-fontsize="['48']"
              data-lineheight="['70']"
              data-width="none"
              data-height="none"
              data-whitespace="nowrap"
              data-transform_idle="o:1;s:500"
              data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
              data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
              data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
              data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
              data-start="1000" 
              data-splitin="none" 
              data-splitout="none" 
              data-responsive_offset="on"
              style="z-index: 7; white-space: nowrap; font-weight:700; border-radius: 30px;">{{ $banner->sub_quote }}
            </div>
           
          </li>
        @endforeach
        </ul>
      </div>
    </div>
  </div>
</section>

<section class="bg-silver-light1">
    <div class="container">
        <div class="section-title text-center">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                  <h2 class="text-uppercase line-bottom-center mt-0">Search your Guest House or PG</h2>
                  <p>We are all over the Guwahati!</p>
                </div>
            </div>
        </div>


        <div class="owl-carousel-4col">
            
          @foreach($locations as $location)
          <div class="item">
            <div class="causes bg-white maxwidth500 mb-sm-30">
              <div class="thumb">
                <a href="/search/{{ config('globals.APP_SEARCH_STRING').$location->slug }}">
                @if($location->image != '')
                <img src="{{ asset('pgsearchfiles/public/uploads/'.$location->image) }}" width="320" height="240" alt="" class="img-fullwidth">
                @else
                <img src="{{ asset('assets/images/no-image-available-enrollspace-pg-search.jpg') }}" width="320" height="240" alt="" class="img-fullwidth">
                @endif
                </a>
              </div>
              <p align="center"><a href=""> {{ $location->name }} </a></p>
            </div>
          </div>
          @endforeach
        </div>
    </div>
</section>


<section  class="bg-silver-light1">
  <div style="background-color:#FFF" class="container">
    <div class="section-content">
      <div class="row">
        
        <div class="col-md-12">
          <h3 class="text-uppercase title line-bottom mt-0 mb-30 mt-sm-40"><i class="fa fa-thumb-tack text-gray-darkgray mr-10"></i>Limited<span class="text-theme-colored">&nbsp;Deals</span></h3>
          <div class="owl-carousel-4col">
          
          @if($deals)
          @foreach($deals as $deal)
            <div class="item">
              <div class="causes bg-white maxwidth500 mb-sm-30">
                <div class="thumb">
                  
                  <img src="{{ asset('uploads/deals/'.$deal->banner_path) }}" alt="" class="img-fullwidth">
                   <div class="overlay-donate-now">
                    @if($deal->coupon_id == 0)
                    <a href="{{ route('pg.search_by_location', ['find-pg-in-easy-way']) }}" class="btn btn-dark btn-theme-colored btn-flat btn-sm pull-left mt-10">Details</a>
                    @else
                      @if($deal->coupon->cpn_provider != null)
                      <?php $pg_name = $deal->coupon->cpn_provider['id'].' ENROLLSPACE '.$deal->coupon->cpn_provider->location['name']; ?>
                      <a href="{{ route('pg.view',[str_replace(' ', '-',$pg_name), 'find-pg-rooms-in-'.$deal->coupon->cpn_provider->location['name'], Crypt::encrypt( $deal->coupon->cpn_provider['id'] ), 'coupon_code' => $deal->coupon['coupon_code']] ) }}" target="_blank" class="btn btn-dark btn-theme-colored btn-flat btn-sm pull-left mt-10"> Details </a>
                      @else
                      <a href="{{ route('pg.search_by_location', ['find-pg-in-easy-way' , 'coupon_code' => $deal->coupon['coupon_code']]) }}" class="btn btn-dark btn-theme-colored btn-flat btn-sm pull-left mt-10">Details</a>
                      @endif
                    @endif
                  </div>
                </div>
              </div>
            </div>
          @endforeach
          @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="divider parallax layer-overlay overlay-dark-4" data-bg-img="{{ asset('assets/user/images/guest/11.jpg') }}" data-parallax-ratio="0.7">
  <div class="container pt-110 pb-110">
    
    <div class="container pt-0">
      <div class="section-content">
        <div class="row equal-height-inner home-boxes">
          @if(count($banners))
          @foreach($banners as $banner)
          <div class="col-sm-12 col-md-6 pr-0 pr-sm-15 sm-height-auto mt-sm-0 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.1s" style="margin:10px 0">
            <div class="sm-height-auto bg-theme-colored">
               <img src="{{ asset('uploads/banners/'.$banner->banner_path) }}" alt="" class="img-fullwidth">
            </div>
          </div>
          @endforeach
          @endif
         
        </div>
      </div>
    </div>


  </div>
</section>
@endsection


@section('pageScripts')
<script>
    $(document).ready(function(e) {
        $(".rev_slider_default").revolution({
          sliderType:"standard",
          sliderLayout: "auto",
          dottedOverlay: "none",
          delay: 5000,
          navigation: {
            keyboardNavigation: "off",
            keyboard_direction: "horizontal",
            mouseScrollNavigation: "off",
            onHoverStop: "off",
            touch: {
              touchenabled: "on",
              swipe_threshold: 75,
              swipe_min_touches: 1,
              swipe_direction: "horizontal",
              drag_block_vertical: false
            },
            arrows: {
              style:"zeus",
              enable:true,
              hide_onmobile:true,
              hide_under:600,
              hide_onleave:true,
              hide_delay:200,
              hide_delay_mobile:1200,
              tmp:'<div class="tp-title-wrap">    <div class="tp-arr-imgholder"></div> </div>',
              left: {
                h_align:"left",
                v_align:"center",
                h_offset:30,
                v_offset:0
              },
              right: {
                h_align:"right",
                v_align:"center",
                h_offset:30,
                v_offset:0
              }
            },
            bullets: {
              enable:true,
              hide_onmobile:true,
              hide_under:600,
              style:"metis",
              hide_onleave:true,
              hide_delay:200,
              hide_delay_mobile:1200,
              direction:"horizontal",
              h_align:"center",
              v_align:"bottom",
              h_offset:0,
              v_offset:30,
              space:5,
              tmp:'<span class="tp-bullet-img-wrap">  <span class="tp-bullet-image"></span></span><span class="tp-bullet-title">PG</span>'
            }
          },
          responsiveLevels: [1240, 1024, 778],
          visibilityLevels: [1240, 1024, 778],
          gridwidth: [1170, 1024, 778, 480],
          gridheight: [400, 300, 300, 320],
          lazyType: "none",
          parallax: {
            origo: "slidercenter",
            speed: 1000,
            levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 100, 55],
            type: "scroll"
          },
          shadow: 0,
          spinner: "off",
          stopLoop: "on",
          stopAfterLoops: 0,
          stopAtSlide: -1,
          shuffle: "off",
          autoHeight: "off",
          fullScreenAutoWidth: "off",
          fullScreenAlignForce: "off",
          fullScreenOffsetContainer: "",
          fullScreenOffset: "0",
          hideThumbsOnMobile: "off",
          hideSliderAtLimit: 0,
          hideCaptionAtLimit: 0,
          hideAllCaptionAtLilmit: 0,
          debugMode: false,
          fallbacks: {
            simplifyAll: "off",
            nextSlideOnWindowFocus: "off",
            disableFocusListener: false,
          }
        });
    });
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places&key=AIzaSyCNxsOeBacT6ocUv3oNtWlqfOa5yuVggbY"></script>

    <script>
      function initialize() {
        var input = document.getElementById('pgLocation');
        var autocomplete = new google.maps.places.Autocomplete(input);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            document.getElementById('place').value = place.name;
            document.getElementById('placeLat').value = place.geometry.location.lat();
            document.getElementById('placeLong').value = place.geometry.location.lng();
            //alert("This function is working!");
            //alert(place.name);
           // alert(place.address_components[0].long_name);

        });
    }
    google.maps.event.addDomListener(window, 'load', initialize); 
    </script>
@stop