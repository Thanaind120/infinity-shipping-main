<div id="footer">
    <div class="bg-white">
        <div class="container-fluid cf-50 pt-4">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('frontend/images/logo.svg') }}" class="mw-100 mb-2" alt="">
                    <p class="text-navy ps-xl-2">109 CCT Bldg., 9th Fl., Unit 1, Surawongse Rd., Suriyawongse, Bangrak
                        Bangkok 10500.</p>
                    <p class="text-navy ps-xl-2">
                        TEL : 02 634 0610<br>
                        Fax :+662 6340617<br>
                        EMAIL : sales5@infinity.co.th
                    </p>
                </div>
                <div class="col-md-6">
                    <ul class="nav justify-content-end mt-xl-4" id="footer-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/about') }}">About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/service') }}">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/price') }}">Prices</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/booking') }}">Booking</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/schedule') }}">Schedules</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/contact') }}">Contact us</a>
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="row align-items-center">
                <div class="col-10 col-md-6 pb-2">
                    <p class="text-navy mb-0 fs-12">© 2021 Infinity Home. All Right Reserved.</p>
                </div>
                <div class="col-2 col-md-6 pb-2">
                    <ul class="nav justify-content-end mb-0">
                        <li class="nav-item">
                            <a class="nav-link p-0 text-navy" aria-current="page"
                                href="http://line.me/ti/p/@infinitythai"><i class="fab fa-line fa-2x"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@include('include.script')
