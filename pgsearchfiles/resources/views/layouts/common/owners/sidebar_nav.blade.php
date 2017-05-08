<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <li class="nav-item active open">
                <a href="javascript:void(0)" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">PG Location and PGs</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start ">
                        <a href="{{ route('pg_location.add') }}" class="nav-link ">
                            <i class="icon-bulb"></i>
                            <span class="title">Add PG Location</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('rent_admin.view_all_pgs') }}" class="nav-link ">
                            <i class="icon-bulb"></i>
                            <span class="title">View Locations</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Guest Lists</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <!-- <li class="nav-item start ">
                        <a href="{{ route('pg_location.add') }}" class="nav-link ">
                            <i class="icon-bulb"></i>
                            <span class="title">View Guests List</span>
                        </a>
                    </li> -->

                    <li class="nav-item start ">
                        <a href="{{ route('accept.guest.lists') }}" class="nav-link ">
                            <i class="icon-bulb"></i>
                            <span class="title">Accept Guest Request</span>
                        </a>
                    </li>

                </ul>
            </li>
        </ul>
    </div>
    <!-- END SIDEBAR -->
</div>