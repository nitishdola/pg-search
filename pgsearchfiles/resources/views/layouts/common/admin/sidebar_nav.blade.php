<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <li class="nav-item active open">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    
                    <li class="nav-item start ">
                        <a href="{{ route('master.landmark.add') }}" class="nav-link ">
                            <i class="fa fa-map-signs" aria-hidden="true"></i>
                            <span class="title">Add Landmark</span>
                        </a>
                    </li> 

                    <li class="nav-item start ">
                        <a href="{{ route('landmark.index') }}" class="nav-link ">
                            <i class="icon-bulb"></i>
                            <span class="title">View All Landmarks</span>
                        </a>
                    </li>
                    <!-- <li class="heading">
                        <h3 class="uppercase">Mater</h3>
                    </li> -->
                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span class="title">Location</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item  ">
                                <a href="{{ route('location.add') }}" class="nav-link ">
                                    <span class="title">Add a Location</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="{{ route('location.index') }}" class="nav-link ">
                                    <span class="title">View all Locations</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-map" aria-hidden="true"></i>
                            <span class="title">Sub Location</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item  ">
                                <a href="{{ route('sub_location.add') }}" class="nav-link ">
                                    <span class="title">Add a Sub Location</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="{{ route('sub_location.index') }}" class="nav-link ">
                                    <span class="title">View all Sub Locations</span>
                                </a>
                            </li>
                        </ul>
                    </li> 

                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                            <span class="title">Premium Accounts</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item  ">
                                <a href="{{ route('premium.upgrade') }}" class="nav-link ">
                                    <span class="title">Upgrade to Premium</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="{{ route('premium.index') }}" class="nav-link ">
                                    <span class="title">View all Premiumm Accounts</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-bed" aria-hidden="true"></i>
                            <span class="title">PG</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item  ">
                                <a href="{{ route('view_all_pg') }}" class="nav-link ">
                                    <span class="title">View All PGs</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="{{ route('pg.view_owners') }}" class="nav-link ">
                                    <span class="title">View all PG Owners</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="{{ route('admin.all.bookings') }}" class="nav-link ">
                                    <span class="title">View all Bookings</span>
                                </a>
                            </li>

                        </ul>
                    </li>


                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span class="title">Users</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item  ">
                                <a href="{{ route('view_all_users') }}" class="nav-link ">
                                    <span class="title">View All Registered users</span>
                                </a>
                            </li>
                        </ul>
                    </li> 

                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-gift" aria-hidden="true"></i>
                            <span class="title">Discounts and Promotions</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item  ">
                                <a href="{{ route('coupon.add') }}" class="nav-link ">
                                    <span class="title">Add Coupon/Promotion</span>
                                </a>
                            </li>

                            <li class="nav-item  ">
                                <a href="{{ route('coupon.index') }}" class="nav-link ">
                                    <span class="title">View Coupon/Promotions</span>
                                </a>
                            </li>
                        </ul>
                    </li> 


                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-picture-o" aria-hidden="true"></i>
                            <span class="title">Banners</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item  ">
                                <a href="{{ route('deal.add') }}" class="nav-link ">
                                    <span class="title">Add Banner</span>
                                </a>
                            </li>

                            <!-- <li class="nav-item  ">
                                <a href="{{ route('deal.index') }}" class="nav-link ">
                                    <span class="title">View Banner</span>
                                </a>
                            </li> -->
                        </ul>
                    </li> 

                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            <span class="title">CMS</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item  ">
                                <a href="{{ route('cms.index') }}" class="nav-link ">
                                    <span class="title">View/Edit CMS Contents</span>
                                </a>
                            </li>

                            <li class="nav-item  ">
                                <a href="{{ route('cms.add') }}" class="nav-link ">
                                    <span class="title">Add CMS Content</span>
                                </a>
                            </li>

                            <li class="nav-item  ">
                                <a href="{{ route('cms.add_home_banner') }}" class="nav-link ">
                                    <span class="title">Add Home Banner</span>
                                </a>
                            </li>

                            <li class="nav-item  ">
                                <a href="{{ route('cms.view_all_home_banners') }}" class="nav-link ">
                                    <span class="title">View All Home Banner</span>
                                </a>
                            </li>
                        </ul>
                    </li> 
                    <li class="nav-item  ">
                        <a href="{{ route('admin.view_feedback') }}" class="nav-link ">
                            <span class="title">View Feedbacks</span>
                        </a>
                    </li>
                    <!-- <li class="nav-item start ">
                        <a href="dashboard_3.html" class="nav-link ">
                            <i class="icon-graph"></i>
                            <span class="title">Dashboard 3</span>
                            <span class="badge badge-danger">5</span>
                        </a>
                    </li> -->
                </ul> 
            </li>
        </ul>
    </div>
    <!-- END SIDEBAR -->
</div>