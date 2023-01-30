<style>
    .badge_me {
        background-color: red;
        color: white;
        padding: 4px 8px;
        text-align: center;
        border-radius: 5px;

    }

</style>
<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/') }}">Infinity Shipping</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/') }}">IS</a>
        </div>
        <ul class="sidebar-menu">

            <?php $check = DB::table('role_permission')->leftJoin('role', 'role_permission.ref_role', '=', 'role.id')->where('role_permission.ref_role', Auth::guard('web')->user()->position)->first(); ?>
            @if($check->home_view == 1)
            <li class="menu-header">Home</li>
            <li class="<?php echo isset($active[0]) ? $active[0] : ''; ?>"><a class="nav-link"
                    href="{{ url('/backend/home/banner') }}"><i class="fas fa-bullhorn"></i> <span>Slide
                        Banner</span></a>
            </li>
            <li class="<?php echo isset($active[1]) ? $active[1] : ''; ?>"><a class="nav-link"
                    href="{{ url('/backend/home/logistics-service-topics') }}"><i class="fas fa-cogs"></i>
                    <span>Logistics Service Topics</span></a>
            </li>
            <li class="<?php echo isset($active[2]) ? $active[2] : ''; ?>"><a class="nav-link"
                    href="{{ url('/backend/home/main-services') }}"><i class="fas fa-users"></i>
                    <span>Main Services</span></a>
            </li>
            <li class="<?php echo isset($active[3]) ? $active[3] : ''; ?>"><a class="nav-link"
                    href="{{ url('/backend/home/infinity-content') }}"><i class="fas fa-building"></i>
                    <span>Infinity Content</span></a>
            </li>
            <li class="<?php echo isset($active[4]) ? $active[4] : ''; ?>"><a class="nav-link"
                    href="{{ url('/backend/home/image') }}"><i class="fas fa-bullhorn"></i> <span>Slide
                        Image</span></a>
            </li>
            <li class="<?php echo isset($active[5]) ? $active[5] : ''; ?>"><a class="nav-link"
                    href="{{ url('/backend/home/our-clients') }}"><i class="fas fa-image"></i> <span>Our
                        Clients</span></a>
            </li>
            @endif

            @if($check->aboutus_view == 1)
            <li class="menu-header">About Us</li>
            <li class="<?php echo isset($active[8]) ? $active[8] : ''; ?>"><a class="nav-link"
                    href="{{ url('/backend/about') }}"><i class="fas fa-copy"></i>
                    <span>About US</span></a>
            </li>
            @endif

            @if($check->service_view == 1)
            <li class="menu-header">Service</li>
            <li class="<?php echo isset($active[6]) ? $active[6] : ''; ?>"><a class="nav-link"
                    href="{{ url('/backend/services') }}"><i class="fas fa-wrench"></i>
                    <span>Service </span></a>
            </li>
            @endif

            @if($check->price_view == 1)
            <li class="menu-header">Prices</li>
            <li class="<?php echo isset($active[14]) ? $active[14] : ''; ?>"><a class="nav-link"
                    href="{{ url('/backend/price') }}"><i class="fas fa-credit-card"></i>
                    <span>Instant Quote</span></a>
            </li>
            <li class="<?php echo isset($active[10]) ? $active[10] : ''; ?>"><a class="nav-link"
                    href="{{ url('/backend/price/POL') }}"><i class="fas fa-location-arrow"></i>
                    <span>Port of loading</span></a>
            </li>
            <li class="<?php echo isset($active[11]) ? $active[11] : ''; ?>"><a class="nav-link"
                    href="{{ url('/backend/price/POD') }}"><i class="fas fa-map-marker"></i>
                    <span>Port of discharge</span></a>
            </li>
            <li class="<?php echo isset($active[12]) ? $active[12] : ''; ?>"><a class="nav-link"
                    href="{{ url('/backend/price/equipment-type') }}"><i class="fas fa-clipboard"></i>
                    <span>Equipment type</span></a>
            </li>
            <li class="<?php echo isset($active[13]) ? $active[13] : ''; ?>"><a class="nav-link"
                    href="{{ url('/backend/price/commodity') }}"><i class="fas fa-clipboard"></i>
                    <span>Commodity</span></a>
            </li>
            @endif

            @if($check->booking_view == 1)
            <li class="menu-header">Booking</li>
            <li class="<?php echo isset($active[15]) ? $active[15] : ''; ?>"><a class="nav-link"
                    href="{{ url('/backend/booking') }}"><i class="fas fa-book"></i>
                    <span>Booking</span></a>
            </li>
            <li class="<?php echo isset($active[16]) ? $active[16] : ''; ?>"><a class="nav-link"
                    href="{{ url('/backend/booking/term') }}"><i class="fas fa-clipboard"></i>
                    <span>Term</span></a>
            </li>
            @endif

            @if($check->schedules_view == 1)
            <li class="menu-header">Schedules</li>
            <li class="<?php echo isset($active[17]) ? $active[17] : ''; ?>"><a class="nav-link"
                    href="{{ url('/backend/schedules') }}"><i class="fas fa-calendar"></i>
                    <span>Schedules</span></a>
            </li>
            @endif

            @if($check->contactus_view == 1)
            <li class="menu-header">Contact US</li>
            <li class="<?php echo isset($active[7]) ? $active[7] : ''; ?>"><a class="nav-link"
                    href="{{ url('/backend/contact/edit/' . 1) }}"><i class="fas fa-phone"></i>
                    <span>Contact US </span></a>
            </li>
            @endif

            @if($check->management_view == 1)
            <li class="menu-header">MANAGEMENT</li>
            <li class="<?php echo isset($active[9]) ? $active[9] : ''; ?>"><a class="nav-link"
                    href="{{ url('/backend/member') }}"><i class="fas fa-users"></i>
                    <span>Members </span>
                </a>
            </li>
            <li class="<?php echo isset($active[18]) ? $active[18] : ''; ?>"><a class="nav-link"
                    href="{{ url('/backend/user-role') }}"><i class="fas fa-user"></i>
                    <span>User Role </span>
                </a>
            </li>
            <li class="<?php echo isset($active[19]) ? $active[19] : ''; ?>"><a class="nav-link"
                    href="{{ url('/backend/user-management') }}"><i class="fas fa-user"></i>
                    <span>User Management </span>
                </a>
            </li>
            @endif
        </ul>
    </aside>
</div>
