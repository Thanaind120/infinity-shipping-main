<!doctype html>
<html lang="th">

<head>
    <title>About us - Infinity Shipping (Thailand)Co.,Ltd.</title>
    @include('layouts.frontend.inc_header')
</head>

<body>
    @include('layouts.frontend.inc_navbar')
    <div class="bg-white">
        <div class="container py-5">
            <div class="row">
                <div class="col-sm-6">
                    <div class="pe-5">
                        <h2 class="text-navy fw-bold mb-0">About Us</h2>
                        <h4 class="text-navy fw-bold">INFINITY SHIPPING <span class="text-red">(THAILAND)</span> CO.,LTD
                        </h4>
                        <div class="lineL-red mb-4"></div>
                        <p class="text-justify">Our group is a logistics service provider based in Malaysia with strong
                            presence in Southeast Asia and business coverage over 15 countries.</p>
                        <p><b>The 4 main services that we provide include</b>
                        <ol>
                            <li>Flexitank Solution and Related Services</li>
                            <li>Integrated Freight Forwarding Services</li>
                            <li>Railroad Transportation services</li>
                            <li>Logistics Centre and related services.</li>
                        </ol>
                        <p class="text-justify">Infinity is ranked top fifth player in the Flexitank Solution and
                            related services market in the world in terms of the flexitank produced. We are also the
                            largest landbridge services provider between Malaysia and Thailand. In addition, we are the
                            fourth largest player as a NVOCC in the busiest port in Malaysia, namely Port Klang. On top
                            of it, we are also one of the largest 20′ high cube containers operator in Southeast Asia.
                        </p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <img src="{{ asset('frontend/images/Containnter.jpg') }}" class="mw-100">
                </div>
            </div>
        </div>
    </div>
    <div class="bg-light">
        <div class="container py-5">
            <div class="row">
                <div class="col-sm-7">
                    <h4 class="text-navy fw-bold">If you want to ask for more information.</h4>
                    <p class="mb-0">Have questions or want to consult more information about transportation?</p>
                </div>
                <div class="col-sm-5 text-md-end">
                    <a href="tel:+6626340610" class="btn btn-navy rounded-pill px-4 py-2"><i class="fas fa-phone"></i>
                        Contact here </a>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.frontend.inc_footer')
    <script>
        $('#linkMenuTop .nav-item').eq(1).addClass('active');
    </script>
</body>

</html>
