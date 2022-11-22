<!doctype html>
<html lang="th">
<head>      
    <title>Freight Forwarding - Infinity Shipping (Thailand)Co.,Ltd.</title>
    @include('layouts.frontend.inc_header') 
</head>
<body>
    @include('layouts.frontend.inc_navbar')
    <div class="bg-white">
        <div class="container py-5">
            <div class="row">
                <div class="col-sm-6">
                    <div class="pe-5">
                        <h2 class="text-navy fw-bold">Freight Forwarding</h2>
                        <div class="lineL-red mb-4"></div>
                        <p class="text-justify">Our integrated freight forwarding services cover the provision of carrier services and freight forwarding services mainly by ocean, with a small portion of air freight services. We provide international export and import shipment handling to our end customers from various industries including manufacturers and traders.</p> 
                        <p class="text-justify">Our export and import freight services encompass both ocean and air mode. Combining with the local transportation services in our logistics centre and related services, we are able to provide international door to door cargo transportation services upon our customers’ requests.</p>
                        <p class="text-justify">We also provide forwarding services, which mainly involve preparation of customs documents. Our forwarding division in our integrated freight forwarding services would handle the procedures and formalities of import and export in Malaysia.</p> 
                        <p class="text-justify">For export freight services, it involves the acquisition of cargo space from the relevant shipping lines or airlines, arrange ground</p>
                        <p class="text-justify">transportation to bring customers cargo to the terminal and load onto vessel or plane.</p>
                        <p class="text-justify">Upon request, we also engage overseas agents or network partners to arrange local delivery at destination. For import freight services, upon pre-alert and arrival notice, we arrange Customs clearance and ground transportation to deliver the goods to customers or consignees.</p>
                        <p class="text-justify">For forwarding services mainly involves in preparing and submitting declaration to the relevant customs department and in the cases where specific permits are required, we will liaise accordingly with the relevant governmental agencies for processing and obtaining approval until release status is granted for the shipment.</p>
                        <p class="text-justify">Subsequently, we arrange ground transportation to deliver the goods to location as instructed by the customers. We provide forwarding services as an ancillary service to our freight forwarding services as well as stand-alone service to our customers.</p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <img src="{{ asset('frontend/images/service/ff-01.png') }}" class="w-100 mw-100 mb-2">
                    <img src="{{ asset('frontend/images/service/ff-02.png') }}" class="w-100 mw-100">
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