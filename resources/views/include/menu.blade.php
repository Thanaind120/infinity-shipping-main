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
            <li class="{{ Request::segment(1) == 'backend' && Request::segment(2) == 'home' && Request::segment(3) == 'banner' || Request::segment(4) == 'create' || Request::segment(4) == 'edit' ? 'active' : null }}"><a class="nav-link" href="{{ url('/backend/home/banner') }}"><i class="fas fa-bullhorn"></i> <span>Banner</span></a></li>
            
            <li class="menu-header">inventory</li>
            <li><a class="nav-link" href="/"><i class="fas fa-users"></i> <span>ซัพพลายเออร์</span></a></li>
        </ul>
    </aside>
    </div>