<!doctype html>
<html lang="th">
<head>      
    <title>NVOCC - Infinity Shipping (Thailand)Co.,Ltd.</title>
    @include('layouts.frontend.inc_header')
</head>
<body>
    @include('layouts.frontend.inc_navbar')
    <div class="bg-white">
        <div class="container py-5">
            <div class="row">
                <div class="col-sm-6">
                    <div class="pe-5">
                        <h2 class="text-navy fw-bold">NVOCC</h2>
                        <div class="lineL-red mb-4"></div>
                        <p class="text-justify">Our NVOCC services focus on providing full container load shipments and vessel space as carriers to our customers which are mainly freight forwarders. We obtain our vessel space by submitting e-booking instructions to various feeder operators and shipping lines to provide better option, in terms of route, frequency and volumes, for our customers.</p> 
                        <p class="text-justify">We entered into committed purchase arrangements quarterly with four shipping lines for the routes between (i) Port Klang and Chittagong; (ii) Port Klang and Surabaya; (iii) Port Klang and Laem Chabang; and (iv) Port Klang and Bangkok. Under our NVOCC services, our customers generally require us to provide containers for the purpose of the shipment. We operated a total of 1,851 containers comprised of general purpose containers, open top containers and high cube containers. In addition to the traditional general purpose containers and open top containers, our Group also operated high cube containers.</p>
                        <p class="text-justify">These high cube containers offer better payload providing extra 12% space utilisation compared to using a traditional general purpose Container and enable shippers to maximize their shipping cost per cubic meter and increase convenience to our customers. It is also best for shipping low density but bulky and oversized cargo such as chipboards, gypsum boards and sheet and offer better protection to sheet glass as compared to the method of using open-top container with canvas, thus lower the risk of breakage. We have maintained marine liability insurance and special transit liability insurance coverage for our NVOCC services.</p> 
                    </div>
                </div>
                <div class="col-sm-6">
                    <img src="{{ asset('frontend/images/service/nvocc-01.png') }}" class="w-100 mw-100 mb-2">
                    <img src="{{ asset('frontend/images/service/nvocc-02.jpg') }}" class="w-100 mw-100">
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
                    <a href="tel:+6626340610" class="btn btn-navy rounded-pill px-4 py-2"><i class="fas fa-phone"></i> Contact here</a>
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