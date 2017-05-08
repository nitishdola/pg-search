<div class="header-top p-0 bg-theme-colored xs-text-center" data-bg-img="{{ asset('assets/user/images/footer-bg.png') }}">
  <div class="container pt-20 pb-20">
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="widget no-border m-0">
          <a class="menuzord-brand pull-left flip xs-pull-center mb-15" href="{{ url('/') }}"><img src="{{ asset('assets/user/images/logo-wide-white.png') }}" alt=""></a>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="widget no-border clearfix m-0 mt-5">
          <ul class="list-inline pull-right flip sm-pull-none sm-text-center mt-5">
            <li>
              <a class="text-white1" href="{{ url('/rent/admin/login') }}">List Your PG</a>
            </li>
            <li class="text-white1">|</li>
            <li>
              <a class="text-white1" href="{{ route('user.view_wishlist') }}">MY WISHLIST</a>
            </li>

            <li class="text-white1">|</li>

            <!-- <li>
              <a class="text-white1" href="#">Help</a>
            </li>
            <li class="text-white1">|</li> -->

            @if(Auth::guard('user')->user())
              <li class="dropdown">
                <a class="text-white1 dropdown-toggle" href="#"  data-toggle="dropdown">Hi ! {{ Auth::guard('user')->user()->name }} <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="{{ route('user.edit_profile') }} ">Edit Profile</a></li>
                  <li><a href="{{ route('user.bookings') }}">My Bookings</a></li>
                  <li><a href="{{ url('/logout') }}">Log Out</a></li>
                </ul>
              </li>
            @else
            <li>
              <a class="text-white1" href="{{ url('/login') }}">Login</a>
            </li>
            @endif
          </ul>
        </div>
        <div class="widget no-border clearfix m-0 mt-5">
          <ul class="styled-icons icon-gray icon-theme-colored icon-circled icon-sm pull-right flip sm-pull-none sm-text-center mt-sm-15">
            <li><a href="https://www.facebook.com/enrollspace"><i class="fa fa-facebook"></i></a></li>
            <li><a href="https://www.twitter.com/enrollspace"><i class="fa fa-twitter"></i></a></li>
            <!-- <li><a href="#"><i class="fa fa-google-plus"></i></a></li> -->
            <li><a href="https://urlgeni.us/instagram/Yb6H"><i class="fa fa-instagram"></i></a></li>
            <!-- <li><a href="#"><i class="fa fa-linkedin"></i></a></li> -->
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
