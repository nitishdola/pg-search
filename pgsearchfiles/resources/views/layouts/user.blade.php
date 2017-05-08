<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="@yield('pageDescription')" />
<meta name="keywords" content="@yield('pageKeywords')" />
<meta name="author" content="nitishwebcom" />
<meta content="Enroll Space" property="og:site_name">
<meta property="og:description" content="@yield('pageDescription')">
<meta property="og:title" content="@yield('pageTitle')">
<meta content="https://www.facebook.com/nitishdola" property="og:publisher">
<meta content="NOINDEX, NOFOLLOW" name="ROBOTS">
<meta name="google-site-verification" content="rrI-M9EFjJK-zbQ-zFtY_-Tlev7Zmh8creNz3VgXXR0" />
<!-- Page Title -->
<title>Enrollspace @yield('pageTitle')</title>
<!-- Favicon and Touch Icons -->
<!-- Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/user/css/css-plugin-collections.css') }}" rel="stylesheet"/>
<!-- CSS | menuzord megamenu skins -->
<link id="menuzord-menu-skins" href="{{ asset('assets/user/css/menuzord-skins/menuzord-rounded-boxed.css') }}" rel="stylesheet"/>
<!-- CSS | Main style file -->
<link href="{{ asset('assets/user/css/style-main.css') }}" rel="stylesheet" type="text/css">
<!-- CSS | Preloader Styles -->
<link href="{{ asset('assets/user/css/preloader.css') }}" rel="stylesheet" type="text/css">
<!-- CSS | Custom Margin Padding Collection -->
<link href="{{ asset('assets/user/css/custom-bootstrap-margin-padding.css') }}" rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href="{{ asset('assets/user/css/responsive.css') }}" rel="stylesheet" type="text/css">

<!-- Revolution Slider 5.x CSS settings -->
<link  href="{{ asset('assets/user/js/revolution-slider/css/settings.css') }}" rel="stylesheet" type="text/css"/>
<link  href="{{ asset('assets/user/js/revolution-slider/css/layers.css') }}" rel="stylesheet" type="text/css"/>
<link  href="{{ asset('assets/user/js/revolution-slider/css/navigation.css') }}" rel="stylesheet" type="text/css"/>

<!-- CSS | Theme Color -->
<link href="{{ asset('assets/user/css/colors/theme-skin-blue.css') }}" rel="stylesheet" type="text/css">

<!-- external javascripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="{{ asset('assets/user/js/jquery-plugin-collection.js') }}"></script>

<!-- Revolution Slider 5.x SCRIPTS -->
<script src="{{ asset('assets/user/js/revolution-slider/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('assets/user/js/revolution-slider/js/jquery.themepunch.revolution.min.js') }}"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

@yield('pageCss')

<style>
ul.dd {
    padding: 0;
    margin: 0;
}
ul.dd li {
  display: inline;
  position: relative;
}
ul.dd ul {
  position: absolute;
  display: none;
}

ul.dd li:hover ul {
    display: block;
}
</style>
</head>
<body class="">
<div id="wrapper" class="clearfix">
  <!-- preloader -->
  <div id="preloader">
    @include('layouts.common.user.preloader')
  </div>
  
  <!-- Header -->
  <header id="header" class="header">
    @include('layouts.common.user.header_top')
    @include('layouts.common.user.header_nav')
  </header>
  
  <div class="main-content" style="background: #F4F4F4">
  @if(Session::has('message'))
    <div class="row">
      <div class="col-lg-12">
          <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
              <button type="button" class="close" data-dismiss="alert">×</button>
              {!! Session::get('message') !!}
          </div>
      </div>
    </div>
    @endif
        
  @yield('content')
  @include('layouts.common.user.footer')
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
  </div>
<script src="{{ asset('assets/user/js/custom.js') }}"></script>

<script type="text/javascript" src="{{ asset('assets/user/js/revolution-slider/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/user/js/revolution-slider/js/extensions/revolution.extension.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/user/js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/user/js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/user/js/revolution-slider/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/user/js/revolution-slider/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/user/js/revolution-slider/js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/user/js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/user/js/revolution-slider/js/extensions/revolution.extension.video.min.js') }}"></script>

@yield('pageScripts')
</body>
</html>