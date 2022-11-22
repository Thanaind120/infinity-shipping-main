<!doctype html>
<html lang="th">
<head>      
    <title>Bulk Logistics - Infinity Shipping (Thailand)Co.,Ltd.</title>
    @include('layouts.frontend.inc_header')
</head>
<body>
    @include('layouts.frontend.inc_navbar')
    <div class="bg-white">
        <div class="container py-5">
            <div class="row">
                <div class="col-sm-6">
                    <div class="pe-5">
                        <h2 class="text-navy fw-bold">Bulk Logistics</h2>
                        <div class="lineL-red mb-4"></div>
                        <p class="text-justify">We are a global flexitank operator and have been ranked number 5 in the world in terms of number of flexitanks produced. We provide customised flexitank solution and related services such as advisory, installation and emergency response services to customers for bulk non-hazardous liquid transportation.</p> 
                        <p class="text-justify">Our flexitanks are fabricated from food grade polyethylene film that is tested and complied  with FDA and EU issued standard. These flexitanks provide a more cost effective transportation solution compared to the traditional tankers and ISO tanks. They are mainly used to transport liquids such as oils, juices, latex, wines and other food grade liquids.</p>
                        <p class="text-justify">We are an associate member of the Container Owners Association in Malaysia and one of the 17 flexitank providers accredited with the Flexitank Certificate of Compliance across the world. Our flexitanks are also Kosher and Halal certified.</p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <img src="{{ asset('frontend/images/service/bulk-01.png') }}" class="w-100 mw-100 mb-2">
                    <img src="{{ asset('frontend/images/service/bulk-02.png') }}" class="w-100 mw-100">
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