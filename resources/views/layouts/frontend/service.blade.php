<!doctype html>
<html lang="th">

<head>
    <title>Services - Infinity Shipping (Thailand)Co.,Ltd.</title>
    @include('layouts.frontend.inc_header')
</head>

<body>
    @include('layouts.frontend.inc_navbar')
    <div class="bg-white">
        <div class="container py-5">
            <div class="row">
                <div class="col-sm-12">
                    <div class="pe-5">
                        <h2 class="text-navy fw-bold">Services</h2>
                        <div class="lineL-red mb-4"></div>
                        <!-- <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Porttitor leo a diam sollicitudin tempor id eu nisl nunc. Enim nunc faucibus a pellentesque sit amet porttitor.</b>  -->
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                @foreach ($services as $val)
                    @php
                        // เช็คค่า ถ้ามีช่องว่าให้มันเขียนทับไม่ให้มีช่องว่าง  เอาไว้ส่งชื่อ services เข้า url
                        $service_name = $string = str_replace(' ', '', $val->service_name);
                    @endphp
                    <div class="col-md-3">
                        <a href="{{ url('/service' . '/' . $service_name) }}">
                            <div class="box-service mb-3">
                                <div class="box-img">
                                    <div class="img-bg"
                                        style="background-image:url('{{ asset('backend/assets/img/services/' . $val->service_images1) }}');">
                                    </div>
                                    <div class="hover-container">
                                        <div class="icon">
                                            <i class='bx bx-search'></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-title">
                                    <div class="span-text">
                                        {{ $val->service_name }}
                                    </div>
                                    <div class="span-arrow">
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
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
                    <a href="tel:{{ $contact->contact_phone }}" class="btn btn-navy rounded-pill px-4 py-2"><i
                            class="fas fa-phone"></i>
                        Contact here</a>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.frontend.inc_footer')
    <script>
        $('#linkMenuTop .nav-item').eq(2).addClass('active');
    </script>
</body>

</html>
