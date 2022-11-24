<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Infinity Shipping</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">IS</a>
        </div>
        <ul class="sidebar-menu">
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

            <li class="menu-header">Service</li>
            <li class="<?php echo isset($active[6]) ? $active[6] : ''; ?>"><a class="nav-link"
                    href="{{ url('/backend/services') }}"><i class="fas fa-wrench"></i>
                    <span>Service </span></a>
            </li>

            <li class="menu-header">Contact US</li>
            <li class="<?php echo isset($active[7]) ? $active[7] : ''; ?>"><a class="nav-link"
                    href="{{ url('/backend/contact/edit/' . 1) }}"><i class="fas fa-phone"></i>
                    <span>Contact US </span></a>
            </li>

        </ul>
    </aside>

</div>
