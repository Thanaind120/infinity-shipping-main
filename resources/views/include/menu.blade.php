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
            <li class="<?php echo (isset($active[0]))?$active[0]:'';?>"><a class="nav-link" href="{{ url('/backend/home/banner') }}"><i class="fas fa-bullhorn"></i> <span>Slide Banner</span></a></li>
            <li class="<?php echo (isset($active[1]))?$active[1]:'';?>"><a class="nav-link" href="{{ url('/backend/home/logistics-service-topics') }}"><i class="fas fa-wrench"></i> <span>Logistics Service Topics</span></a></li>
            
            <li class="menu-header">inventory</li>
            <li><a class="nav-link" href="/"><i class="fas fa-users"></i> <span>ซัพพลายเออร์</span></a></li>
        </ul>
    </aside>
    </div>