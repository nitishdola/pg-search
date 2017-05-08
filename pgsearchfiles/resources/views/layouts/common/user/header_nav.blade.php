<div class="header-nav">
  <div class="header-nav-wrapper navbar-scrolltofixed bg-silver-light">
    <div class="container">
      <nav id="menuzord" class="menuzord default bg-silver-light">
        <ul class="menuzord-menu">
          <li class="active"><a href="{{ route('home') }}">Home</a></li>
          <?php $all_locations = getAllLocations(); ?>
          @foreach($all_locations as $v)
          <li><a href="{{ route('pg.search_by_location',[config('globals.APP_SEARCH_STRING').$v->slug]) }}"> {{ $v->name }} </a>
            <div class="megamenu">
              <div class="megamenu-row">
                <h4 style="color:#FFF">{{ $v->name }}</h4>
                <?php $sub_locations = getAllSubLocations($v->id); ?>
                @foreach($sub_locations as $ks)
                <?php $count = 1; ?>
                @if($count%3 == 1)
                <div class="col3">
                  <ul class="list-unstyled list-dashed">
                @endif
                    <li>

                    <a href="{{ route('pg.search_by_location',[config('globals.APP_SEARCH_STRING').$v->slug,  'sub_location' => $ks->slug]) }}"> {{ $ks->name }} 
                    </a>

                    </li>
                @if($count%3 == 1)
                  </ul>
                </div>
                @endif
                <?php $count++; ?>
                @endforeach
              </div>
            </div>
          </li>
          @endforeach
          <li><a href="{{ route('pg.search_by_location', config('globals.APP_FULL_SEARCH_STRING')) }}"> All Places</a></li>
        </ul>
        <ul class="list-inline pull-right flip hidden-sm hidden-xs">
        </ul>
      </nav>
    </div>
  </div>
</div>