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
                        <div class="item"><img src="{{ asset('frontend/images/banner/banner-01.jpg') }}" class=""></div>
                        <div class="item"><img src="{{ asset('frontend/images/banner/banner-02.jpg') }}" class=""></div>
                        <div class="item"><img src="{{ asset('frontend/images/banner/banner-03.jpg') }}" class=""></div>
                        <div class="item"><img src="{{ asset('frontend/images/banner/banner-04.jpg') }}" class=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white">
        <div class="container py-5">
            <h2 class="text-navy text-center fw-bold">Our group is a logistics service</h2>
            <p class="text-center mb-4">with strong presence in Southeast Asia and business coverage over 15 countries</p>
            <div class="row">
                <div class="col-md-3">
                    <a href="{{ url('/landLogistics') }}">
                    <div class="box-service mb-3">
                        <div class="box-img">
                            <div class="img-bg" style="background-image:url('frontend/images/service/cover-LandLogistics.png');"></div>
                            <div class="hover-container">
                                <div class="icon">
                                    <i class='bx bx-search'></i>
                                </div>
                            </div>
                        </div>
                        <div class="service-title">
                            <div class="span-text">
                                Land Logistics
                            </div>    
                            <div class="span-arrow">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ url('/nvocc') }}">
                    <div class="box-service mb-3">
                        <div class="box-img">
                            <div class="img-bg" style="background-image:url('frontend/images/service/cover-NVOCC.png');"></div>
                            <div class="hover-container">
                                <div class="icon">
                                    <i class='bx bx-search'></i>
                                </div>
                            </div>
                        </div>
                        <div class="service-title">
                            <div class="span-text">
                                NVOCC
                            </div>    
                            <div class="span-arrow">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ url('/freightForwarding') }}">
                        <div class="box-service mb-3">
                            <div class="box-img">
                                <div class="img-bg" style="background-image:url('frontend/images/service/cover-FreightForwarding.png');"></div>
                                <div class="hover-container">
                                    <div class="icon">
                                        <i class='bx bx-search'></i>
                                    </div>
                                </div>
                            </div>
                            <div class="service-title">
                                <div class="span-text">
                                    Freight Forwarding
                                </div>    
                                <div class="span-arrow">
                                    <i class="fas fa-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ url('/bulkLogistics') }}">
                    <div class="box-service mb-3">
                        <div class="box-img">
                            <div class="img-bg" style="background-image:url('frontend/images/service/cover-BulkLogistics.png');"></div>
                            <div class="hover-container">
                                <div class="icon">
                                    <i class='bx bx-search'></i>
                                </div>
                            </div>
                        </div>
                        <div class="service-title">
                            <div class="span-text">
                            Bulk Logistics
                            </div>    
                            <div class="span-arrow">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-home-section2">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2 class="text-white mb-5">The <span class="bg-danger px-2">4</span> main services that we provided include</h2>
                            <ol id="ol-home" class="text-white">
                                <li>Flexitank Solution and Related Services</li>
                                <li>Integrated Freight Forwarding Services</li>
                                <li>Railroad Transportation Services</li>
                                <li>Logistics Centre and related services</li>
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
                        <h2 class="text-navy fw-bold">Infinity is ranked top fifth player in the Flexitank Solution and related services market</h2>
                        <p>In the world in terms of the flexitankproduced.We are also the largest landbridge services provider between Malaysia and Thailand.In addition, we are the fourth largest player as a NVOCC in the busiest port in Malaysia, namely Port Klang. On top of it, we are also one of the largest 20′ high cube containers operator in Southeast Asia.</p>
                    </div>
                </div>
            </div>       
            <div class="owl-carousel owl-carousel-stacked">
                <div class="item"><img src="{{ asset('frontend/images/home-slide/130713-24-truck-768x432.jpg') }}" /></div>
                <div class="item"><img src="{{ asset('frontend/images/home-slide/Agencies-1-768x432.jpg') }}" /></div>
                <div class="item"><img src="{{ asset('frontend/images/home-slide/Containnter.jpg') }}" /></div>
                <div class="item"><img src="{{ asset('frontend/images/home-slide/Freight-F-768x432.jpg') }}" /></div>
                <div class="item"><img src="{{ asset('frontend/images/home-slide/Freight-Village-3-1-768x432.jpg') }}" /></div>
                <div class="item"><img src="{{ asset('frontend/images/home-slide/Infinity_-2.jpg') }}" /></div>
                <div class="item"><img src="{{ asset('frontend/images/home-slide/Land-Log-2-768x432.jpg') }}" /></div>
            </div>
        </div>
    </div>
    <div class="bg-light">
        <div class="container py-5">
            <h2 class="text-navy text-center fw-bold">Our clients</h2>
            <div class="owl-carousel owl-theme" id="clientSlide">
                <div class="item text-center">
                    <img src="{{ asset('frontend/images/sample-logo-client.png') }}" class="" alt="">
                </div>
                <div class="item text-center">
                    <img src="{{ asset('frontend/images/sample-logo-client.png') }}" class="" alt="">
                </div>
                <div class="item text-center">
                    <img src="{{ asset('frontend/images/sample-logo-client.png') }}" class="" alt="">
                </div>
                <div class="item text-center">
                    <img src="{{ asset('frontend/images/sample-logo-client.png') }}" class="" alt="">
                </div>
                <div class="item text-center">
                    <img src="{{ asset('frontend/images/sample-logo-client.png') }}" class="" alt="">
                </div>
                <div class="item text-center">
                    <img src="{{ asset('frontend/images/sample-logo-client.png') }}" class="" alt="">
                </div>
                <div class="item text-center">
                    <img src="{{ asset('frontend/images/sample-logo-client.png') }}" class="" alt="">
                </div>
                <div class="item text-center">
                    <img src="{{ asset('frontend/images/sample-logo-client.png') }}" class="" alt="">
                </div>
                <div class="item text-center">
                    <img src="{{ asset('frontend/images/sample-logo-client.png') }}" class="" alt="">
                </div>
                <div class="item text-center">
                    <img src="{{ asset('frontend/images/sample-logo-client.png') }}" class="" alt="">
                </div>
            </div>
        </div>
    </div>
    @include('layouts.frontend.inc_footer') 
    <script>
    
    $('#linkMenuTop .nav-item').eq(0).addClass('active');   
    $('#banner-slide').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        dots:true,
        autoplay:true,
        navText : ["<i class='fas fa-chevron-left'></i>","<i class='fas fa-chevron-right'></i>"],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    })
    </script>
    <script>
        $('#clientSlide').owlCarousel({
            loop:true,
            margin:10,
            dots:false,
            nav:false,
            autoplay:true,
            autoplaySpeed:250,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
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
        autoWidth:true,
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