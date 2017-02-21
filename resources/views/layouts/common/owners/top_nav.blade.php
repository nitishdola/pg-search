<ul class="nav navbar-nav pull-right">
    <li class="dropdown dropdown-user">
        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
            <span class="username username-hide-on-mobile"> {{ getOwnerInfo(Auth::guard('rent_admin')->user()->id)->name }} </span>
            <i class="fa fa-angle-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-default">
            
<!--             <li>
                <a href="page_user_lock_1.html">
                    <i class="icon-lock"></i> Lock Screen </a>
            </li>
 -->            <li>
                <a href="{{ route('rent_admin.logout') }}">
                    <i class="icon-key"></i> Log Out </a>
            </li>
        </ul>
    </li>
</ul>