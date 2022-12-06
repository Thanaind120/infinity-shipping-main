<!doctype html>
<html lang="th">

<head>
    <title>Home - Infinity Shipping (Thailand)Co.,Ltd.</title>
    @include('layouts.frontend.inc_header')
</head>

<body>
    @include('layouts.frontend.inc_navbar')
    <div class="bg-white">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 px-0">
                    <div class="owl-carousel owl-theme" id="banner-slide">
                        @foreach ($banner as $key => $val)
                            <div class="item"><img
                                    src="{{ $val->img_banner != '' ? asset('backend/assets/img/banner/' . $val->img_banner) : asset('backend/assets/img/banner/nopic.jpg') }}"
                                    class=""></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white">
        <div class="container py-5">
            @foreach ($logistics_service_topics as $key => $val)
                <h2 class="text-navy text-center fw-bold">{{ $val->topic }}</h2>
                <p class="text-center mb-4">{{ $val->content }}</p>
            @endforeach
            <div class="row">
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
    <div class="bg-home-section2">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2 class="text-white mb-5">The
                                <span class="bg-danger px-2">
                                    @foreach ($sum_main_services as $key => $val)
                                        @if ($val->sum_main_services != '')
                                            {{ $val->sum_main_services }}
                                        @else
                                            0
                                        @endif
                                    @endforeach
                                </span>
                                &nbsp;main services that we provided include
                            </h2>
                            <ol id="ol-home" class="text-white">
                                @foreach ($main_services as $key => $val)
                                    <li>{{ $val->service_name }}</li>
                                @endforeach
                            </ol>
                        </div>
                        <div class="col-sm-6">
                            <img src="{{ asset('frontend/images/png-h-s.png') }}" class="mw-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-xl-9">
                    <div class="text-center">
                        <img src="{{ asset('frontend/images/logo.svg') }}" class="mb-4">
                        @foreach ($infinity_content as $key => $val)
                            <h2 class="text-navy fw-bold">{{ $val->topic }}</h2>
                            <p>{{ $val->content }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="owl-carousel owl-carousel-stacked">
                @foreach ($image as $key => $val)
                    <div class="item"><img
                            src="{{ $val->img_image != '' ? asset('backend/assets/img/image/' . $val->img_image) : asset('backend/assets/img/image/nopic.jpg') }}" />
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="bg-light">
        <div class="container py-5">
            <h2 class="text-navy text-center fw-bold">Our clients</h2>
            <div class="owl-carousel owl-theme" id="clientSlide">
                @foreach ($logo as $key => $val)
                    <div class="item text-center">
                        <img src="{{ $val->img_logo != '' ? asset('backend/assets/img/logo/' . $val->img_logo) : asset('backend/assets/img/logo/nopic.jpg') }}"
                            class="" alt="">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @include('layouts.frontend.inc_footer')
    <script>
        $('#linkMenuTop .nav-item').eq(0).addClass('active');
        $('#banner-slide').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: true,
            autoplay: true,
            navText: ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })
    </script>
    <script>
        $('#clientSlide').owlCarousel({
            loop: true,
            margin: 10,
            dots: false,
            nav: false,
            autoplay: true,
            autoplaySpeed: 250,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>
    <script>
        $(".owl-carousel-stacked").on("dragged.owl.carousel translated.owl.carousel initialized.owl.carousel",
            function(e) {
                $(".center")
                    .prev()
                    .addClass("left-of-center");
                $(".center")
                    .next()
                    .addClass("right-of-center");
            }
        );

        $(".owl-carousel-stacked").on("drag.owl.carousel", function(e) {
            $(".left-of-center").removeClass("left-of-center");
            $(".right-of-center").removeClass("right-of-center");
        });

        $(".owl-carousel-stacked").owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            items: 3,
            center: true,
            mouseDrag: true,
            touchDrag: false,
            pullDrag: false,
            autoplay: true,
            autoWidth: true,
            navText: [
                '<span class="fa-stack fa-lg"><i class="far fa-circle fa-stack-2x" ></i><i class="fas fa-caret-left fa-stack-1x"></i></span>',
                '<span class="fa-stack fa-lg"><i class="far fa-circle fa-stack-2x" ></i><i class="fas fa-caret-right fa-stack-1x"></i></span>'
            ]
        });

        $(".owl-carousel-stacked").on("translate.owl.carousel", function(e) {
            $(".left-of-center").removeClass("left-of-center");
            $(".right-of-center").removeClass("right-of-center");
        });
    </script>
</body>

</html>
