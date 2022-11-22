<!doctype html>
<html lang="th">

<head>
    <title>Profile - Infinity Shipping (Thailand)Co.,Ltd.</title>
    @include('layouts.frontend.inc_header')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js">
    </script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

</head>

<body>
    @include('layouts.frontend.inc_navbar')
    <div class="bg-light">
        <div class="container py-5">
            <div class="box-white p-3 mb-3 borderR-6">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <img src="{{ asset('frontend/images/profile-img.png') }}" alt="..." class="account-img">
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h4 class="text-navy mb-0 fw-semibold text-break">Thanyakan Preedaangkarakul <button
                                type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                data-bs-target="#editAccountModal"><i class='bx bxs-edit-alt'></i></button></h4>
                        <p class="small text-muted">Company: Company name</p>
                        <p class="mb-0"><i class='bx bx-envelope text-red me-2'></i>example@mail.com</p>
                    </div>
                </div>
            </div>
            <ul class="nav nav-pills mb-3" id="account-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">History Booking</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">History Price</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="box-white p-3 mb-3 borderR-6">
                        <table id="historyBook" class="display nowrap" style="width:100%">
                            <thead>
                                <tr class="align-top">
                                    <th>Shipment Ref.</th>
                                    <th>From<br><span class="fw-light">(Receipt or POL)</span></th>
                                    <th>POL<br><span class="fw-light">(ETD)</span></th>
                                    <th>Export Voyage Vessel</th>
                                    <th>POD<br><span class="fw-light">(ETA)</span></th>
                                    <th>Status</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-navy">ABC123456</td>
                                    <td class="text-uppercase">Bangkok, th</td>
                                    <td class="text-uppercase">
                                        Laem Chabang, th
                                        <br>
                                        <span class="text-muted fs-12">18-Oct-2022, 08:30</span>
                                    </td>
                                    <td class="text-uppercase">
                                        2CG2BN1NC
                                        <br>
                                        <span class="text-muted fs-12">CNC BANGKOK</span>
                                    </td>
                                    <td class="text-uppercase">
                                        MANILA, PH
                                        <br>
                                        <span class="text-muted fs-12">21-OCT-2022 21:30</span>
                                    </td>
                                    <td><span class="badge rounded-pill bg-primary fw-light">Booking Complete</span>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-outline-dark dropdown-toggle" type="button"
                                                id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                Action
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#cancelModal">Cancel</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-navy">ABC123456</td>
                                    <td class="text-uppercase">Bangkok, th</td>
                                    <td class="text-uppercase">
                                        Laem Chabang, th
                                        <br>
                                        <span class="text-muted fs-12">18-Oct-2022, 08:30</span>
                                    </td>
                                    <td class="text-uppercase">
                                        2CG2BN1NC
                                        <br>
                                        <span class="text-muted fs-12">CNC BANGKOK</span>
                                    </td>
                                    <td class="text-uppercase">
                                        MANILA, PH
                                        <br>
                                        <span class="text-muted fs-12">21-OCT-2022 21:30</span>
                                    </td>
                                    <td><span class="badge rounded-pill bg-primary fw-light">Booking Complete</span>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-outline-dark dropdown-toggle" type="button"
                                                id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                Action
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" href="#">Cancel</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-navy">ABC123456</td>
                                    <td class="text-uppercase">Bangkok, th</td>
                                    <td class="text-uppercase">
                                        Laem Chabang, th
                                        <br>
                                        <span class="text-muted fs-12">18-Oct-2022, 08:30</span>
                                    </td>
                                    <td class="text-uppercase">
                                        2CG2BN1NC
                                        <br>
                                        <span class="text-muted fs-12">CNC BANGKOK</span>
                                    </td>
                                    <td class="text-uppercase">
                                        MANILA, PH
                                        <br>
                                        <span class="text-muted fs-12">21-OCT-2022 21:30</span>
                                    </td>
                                    <td><span class="badge rounded-pill bg-danger fw-light">Cancel</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-outline-dark dropdown-toggle" type="button"
                                                id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                Action
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" href="#">Cancel</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-navy">ABC123456</td>
                                    <td class="text-uppercase">Bangkok, th</td>
                                    <td class="text-uppercase">
                                        Laem Chabang, th
                                        <br>
                                        <span class="text-muted fs-12">18-Oct-2022, 08:30</span>
                                    </td>
                                    <td class="text-uppercase">
                                        2CG2BN1NC
                                        <br>
                                        <span class="text-muted fs-12">CNC BANGKOK</span>
                                    </td>
                                    <td class="text-uppercase">
                                        MANILA, PH
                                        <br>
                                        <span class="text-muted fs-12">21-OCT-2022 21:30</span>
                                    </td>
                                    <td><span class="badge rounded-pill bg-primary fw-light">SI Processing</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-outline-dark dropdown-toggle" type="button"
                                                id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                Action
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" href="#">Cancel</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-navy">ABC123456</td>
                                    <td class="text-uppercase">Bangkok, th</td>
                                    <td class="text-uppercase">
                                        Laem Chabang, th
                                        <br>
                                        <span class="text-muted fs-12">18-Oct-2022, 08:30</span>
                                    </td>
                                    <td class="text-uppercase">
                                        2CG2BN1NC
                                        <br>
                                        <span class="text-muted fs-12">CNC BANGKOK</span>
                                    </td>
                                    <td class="text-uppercase">
                                        MANILA, PH
                                        <br>
                                        <span class="text-muted fs-12">21-OCT-2022 21:30</span>
                                    </td>
                                    <td><span class="badge rounded-pill bg-primary fw-light">Submit SI</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-outline-dark dropdown-toggle" type="button"
                                                id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                Action
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" href="#">Cancel</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-navy">ABC123456</td>
                                    <td class="text-uppercase">Bangkok, th</td>
                                    <td class="text-uppercase">
                                        Laem Chabang, th
                                        <br>
                                        <span class="text-muted fs-12">18-Oct-2022, 08:30</span>
                                    </td>
                                    <td class="text-uppercase">
                                        2CG2BN1NC
                                        <br>
                                        <span class="text-muted fs-12">CNC BANGKOK</span>
                                    </td>
                                    <td class="text-uppercase">
                                        MANILA, PH
                                        <br>
                                        <span class="text-muted fs-12">21-OCT-2022 21:30</span>
                                    </td>
                                    <td><span class="badge rounded-pill bg-primary fw-light">Draft BL</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-outline-dark dropdown-toggle" type="button"
                                                id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                Action
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" href="#">Cancel</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-navy">ABC123456</td>
                                    <td class="text-uppercase">Bangkok, th</td>
                                    <td class="text-uppercase">
                                        Laem Chabang, th
                                        <br>
                                        <span class="text-muted fs-12">18-Oct-2022, 08:30</span>
                                    </td>
                                    <td class="text-uppercase">
                                        2CG2BN1NC
                                        <br>
                                        <span class="text-muted fs-12">CNC BANGKOK</span>
                                    </td>
                                    <td class="text-uppercase">
                                        MANILA, PH
                                        <br>
                                        <span class="text-muted fs-12">21-OCT-2022 21:30</span>
                                    </td>
                                    <td><span class="badge rounded-pill bg-success fw-light">Final SI issued</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-outline-dark dropdown-toggle" type="button"
                                                id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                Action
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" href="#">Cancel</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="box-white p-3 mb-3 borderR-6">
                        <div class="row g-3 align-items-center mb-2">
                            <div class="col-auto">
                                <label for="inputPassword6" class="col-form-label">Sort:</label>
                            </div>
                            <div class="col-auto">
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Latest</option>
                                    <option value="2">Oldest</option>
                                </select>
                            </div>
                        </div>
                        <div class="row d-none d-lg-flex mb-2">
                            <div class="col-sm-2">
                                <b class="text-uppercase small">Date</b>
                            </div>
                            <div class="col-sm-8">
                                <b class="text-uppercase small">Route</b>
                            </div>
                            <div class="col-sm-2">
                                <b class="text-uppercase small">View</b>
                            </div>
                        </div>
                        <div class="card card-body">
                            <div class="row">
                                <div class="col-md-3 col-lg-2">
                                    <b class="text-uppercase d-block d-md-none">Date</b>
                                    <p>28/09/2022</p>
                                </div>
                                <div class="col-md-7 col-lg-8">
                                    <b class="text-uppercase d-block d-md-none">Route</b>
                                    <p class="text-uppercase mb-2 fw-medium"><i class='bx bx-anchor text-navy'></i> LAEM
                                        CHABANG, TH <i class='bx bx-right-arrow-alt text-muted mx-2'></i> <i
                                            class='bx bx-anchor text-navy'></i> LOME, TG</p>
                                    <p class="fs-12 mb-0">Vessal Departure : 01 OCT 2022 </p>
                                </div>
                                <div class="col-md-2 col-lg-2">
                                    <button type="button" class="btn btn-red rounded-pill text-uppercase fs-12"
                                        data-bs-toggle="modal" data-bs-target="#quotePriceModal">View Detail</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="editAccountModal" aria-labelledby="editAccountModalLabel"
        aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="editAccountModalLabel">Edit profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="text-navy fw-semibold">Account Setting</h5>
                    <div class="row g-3 pb-2">
                        <div class="col-md-6">
                            <label for="" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control borderR-6" id="" placeholder="Email" required>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Password <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" readonly class="form-control" value="**********"
                                    aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2"
                                    data-bs-target="#changePasswordModal" data-bs-toggle="modal">Change</button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h5 class="text-navy fw-semibold">User Information</h5>
                    <div class="row g-3 pb-2">
                        <div class="col-md-6">
                            <label for="" class="form-label">First name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control borderR-6" id="" placeholder="Enter your first name"
                                required>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Last name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control borderR-6" id="" placeholder="Enter your last name"
                                required>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Phone number <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">02 -</span>
                                <input type="text" class="form-control" placeholder="xxxxxxx" aria-label="Username"
                                    aria-describedby="basic-addon1" required>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h5 class="text-navy fw-semibold">Company Information</h5>
                    <div class="row g-3 pb-2">
                        <div class="col-md-6">
                            <label for="" class="form-label">Company name</label>
                            <input type="text" class="form-control borderR-6" id="" placeholder="Enter Company name">
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Company Type</label>
                            <select class="form-select mb-3" aria-label="Default select example" id="selectCompanyT">
                                <option selected>Choose company type</option>
                                <option value="1">Supplier / Explorter</option>
                                <option value="2">Freight Forwarder</option>
                                <option value="3">Other</option>
                            </select>
                            <div class="3 box">
                                <input type="text" class="form-control" placeholder="Enter text...">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Address</label>
                            <input type="text" class="form-control borderR-6" id="" placeholder="Enter Address">
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">For more information <i
                                    class="text-muted fw-light">(Optional)</i></label>
                            <input type="text" class="form-control borderR-6" id="" placeholder="Enter more address">
                        </div>
                        <div class="col-md-4">
                            <label for="" class="form-label">City</label>
                            <input type="text" class="form-control borderR-6" id="" placeholder="Enter City">
                        </div>
                        <div class="col-md-4">
                            <label for="" class="form-label">Zip code</label>
                            <input type="text" class="form-control borderR-6" id="" placeholder="Enter zip code">
                        </div>
                        <div class="col-md-4">
                            <label for="" class="form-label">Country / Region</label>
                            <select class="form-select" aria-label="Default select example" id="">
                                <option selected>Choose your country</option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="" class="form-label">Colleague's email <i
                                    class="text-muted fw-light">(Optional)</i></label>
                            <input type="text" class="form-control borderR-6 mb-3" id=""
                                placeholder="Enter his/her email address or booking reference">
                            <div class="alert alert-warning" role="alert">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <i class='bx bx-info-circle bx-sm'></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        Your data will be validated faster if you enter the email
                                        address of a colleague who has already registered with us or
                                        a booking reference.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="changePasswordModal" aria-hidden="true" aria-labelledby="changePasswordModal2">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="changePasswordModalLabel2">Change password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="" class="form-label">Old Password <span class="text-danger">*</span></label>
                            <div class="box-password">
                                <input id="password-field" type="password" class="form-control borderR-6"
                                    name="password" value="hello" placeholder="Password" required>
                                <span toggle="#password-field"
                                    class="far fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">New Password <span class="text-danger">*</span></label>
                            <div class="box-password">
                                <input id="password-field" type="password" class="form-control borderR-6"
                                    name="password" value="hello" placeholder="Password" required>
                                <span toggle="#password-field"
                                    class="far fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                            <div class="box-password">
                                <input id="passwordC-field" type="password" class="form-control borderR-6"
                                    name="password" value="hello" placeholder="Confirm Password" required>
                                <span toggle="#passwordC-field"
                                    class="far fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" data-bs-target="#editAccountModal"
                        data-bs-toggle="modal">Cancel</button>
                    <button class="btn btn-primary" data-bs-target="#editAccountModal" data-bs-toggle="modal">Change
                        password</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="quotePriceModal" aria-labelledby="quotePriceModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg  modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="quotePriceModalLabel">Quote date : 28 September, 2022</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card card-body bg-navy text-white mb-3 rounded-3">
                        <p class="text-uppercase mb-2 fw-medium"><i class='bx bx-anchor'></i> LAEM CHABANG, TH <i
                                class='bx bx-right-arrow-alt mx-2'></i> <i class='bx bx-anchor'></i> LOME, TG</p>
                        <p class="fs-12 mb-0">1 Container • 20’ Dry Standard • 210000 Kilograms • 01 OCT 2022 • Freight
                            all kinds </p>
                    </div>
                    <h6 class="text-navy fw-bold">Please find next voyage departures with associated price </h6>
                    <div class="card card-body mb-3 rounded-3">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <ul class="timeline">
                                    <li class="timeline-item">
                                        <div class="timeline-marker dot-none"><i
                                                class='bx-xs bx bxs-circle text-red'></i></div>
                                        <div class="timeline-content pb-4">
                                            <label for="" class="form-label text-navy fs-12"><b>Sun, 02 Oct 2022,</b>
                                                LAEM CHABANG TH</label>
                                        </div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-marker dot-none"><i class='bx-sm bx bxs-map text-red'></i>
                                        </div>
                                        <div class="timeline-content pb-0">
                                            <label for="" class="form-label text-navy fs-12"><b>Fri, 04 Nov 2022,</b>
                                                LOME TG</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-lg-3 bd-lr">
                                <p class="fs-12 text-muted mb-0">All in rate</p>
                                <div class="d-inline-flex">
                                    <div class="me-1">
                                        <h3 class="text-navy fw-bold">3578</h3>
                                    </div>
                                    <div class="fs-12 text-uppercase text-navy"><b>USD</b><br>/Container</div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 text-center">
                                <a type="button" class="btn btn-red rounded-pill px-5" href="{{ url('/booking-info') }}">Booking</a>
                            </div>
                        </div>
                    </div>
                    <div class="card card-body mb-3 rounded-3">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <ul class="timeline">
                                    <li class="timeline-item">
                                        <div class="timeline-marker dot-none"><i
                                                class='bx-xs bx bxs-circle text-red'></i></div>
                                        <div class="timeline-content pb-4">
                                            <label for="" class="form-label text-navy fs-12"><b>Sun, 02 Oct 2022,</b>
                                                LAEM CHABANG TH</label>
                                        </div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-marker dot-none"><i class='bx-sm bx bxs-map text-red'></i>
                                        </div>
                                        <div class="timeline-content pb-0">
                                            <label for="" class="form-label text-navy fs-12"><b>Fri, 04 Nov 2022,</b>
                                                LOME TG</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-lg-3 bd-lr">
                                <p class="fs-12 text-muted mb-0">All in rate</p>
                                <div class="d-inline-flex">
                                    <div class="me-1">
                                        <h3 class="text-navy fw-bold">3578</h3>
                                    </div>
                                    <div class="fs-12 text-uppercase text-navy"><b>USD</b><br>/Container</div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 text-center">
                                <a type="button" class="btn btn-red rounded-pill px-5" href="{{ url('/booking-info') }}">Booking</a>
                            </div>
                        </div>
                    </div>
                    <div class="card card-body mb-3 rounded-3">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <ul class="timeline">
                                    <li class="timeline-item">
                                        <div class="timeline-marker dot-none"><i
                                                class='bx-xs bx bxs-circle text-red'></i></div>
                                        <div class="timeline-content pb-4">
                                            <label for="" class="form-label text-navy fs-12"><b>Sun, 02 Oct 2022,</b>
                                                LAEM CHABANG TH</label>
                                        </div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-marker dot-none"><i class='bx-sm bx bxs-map text-red'></i>
                                        </div>
                                        <div class="timeline-content pb-0">
                                            <label for="" class="form-label text-navy fs-12"><b>Fri, 04 Nov 2022,</b>
                                                LOME TG</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-lg-3 bd-lr">
                                <p class="fs-12 text-muted mb-0">All in rate</p>
                                <div class="d-inline-flex">
                                    <div class="me-1">
                                        <h3 class="text-navy fw-bold">3578</h3>
                                    </div>
                                    <div class="fs-12 text-uppercase text-navy"><b>USD</b><br>/Container</div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 text-center">
                                <a type="button" class="btn btn-red rounded-pill px-5" href="{{ url('/booking-info') }}">Booking</a>
                            </div>
                        </div>
                    </div>
                    <div class="py-3">
                        <div class="pagination justify-content-center">
                            <a href="#" class="prev disabled"><i class='fas fa-angle-left' ></i></a>
                            <ol>
                                <li class="active"><a href="#1">1</a></li>
                                <li><a href="#2">2</a></li>
                                <li><a href="#3">3</a></li>
                                <li><a href="#4">4</a></li>
                                <li><a href="#5">5</a></li>
                                <li><a href="#6">6</a></li>
                                <li><a href="#7">7</a></li>
                                <li><a href="#8">8</a></li>
                            </ol>
                            <a href="#" class="next"><i class='fas fa-angle-right' ></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.frontend.inc_footer') 
    <!-- <script>
        $('#linkMenuTop .nav-item').eq(3).addClass('active');
    </script> -->
    <script>
        $(document).ready(function () {
            $('#historyBook').DataTable({
                scrollX: true,
            });
        });
    </script>
    <script>
        $(".toggle-password").click(function () {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
    <script>
        $(document).ready(function() {
  var CLASS_DISABLED = "disabled",
      CLASS_ACTIVE = "active",
      CLASS_SIBLING_ACTIVE = "active-sibling",
      DATA_KEY = "pagination";
  
  $(".pagination").each(initPagination);
  
  function initPagination() {
    var $this = $(this);
    
    $this.data(DATA_KEY, $this.find("li").index(".active"));
    
    $this.find(".prev").on("click", navigateSinglePage);
    $this.find(".next").on("click", navigateSinglePage);
    $this.find("li").on("click", function() {
      var $parent = $(this).closest(".pagination");
      $parent.data(DATA_KEY, $parent.find("li").index(this));
      changePage.apply($parent);
    });
  }
  
  function navigateSinglePage() {
    if(!$(this).hasClass(CLASS_DISABLED)) {
      var $parent = $(this).closest(".pagination"),
          currActive = parseInt($parent.data("pagination"), 10);
      
      currActive += 1 * ($(this).hasClass("prev") ? -1 : 1);
      $parent.data(DATA_KEY, currActive);
      
      changePage.apply($parent);
    }
  }
  
  function changePage(currActive) {
    var $list = $(this).find("li"),
        currActive = parseInt($(this).data(DATA_KEY), 10);
    
    $list.filter("."+CLASS_ACTIVE).removeClass(CLASS_ACTIVE);
    $list.filter("."+CLASS_SIBLING_ACTIVE).removeClass(CLASS_SIBLING_ACTIVE);
    
    $list.eq(currActive).addClass(CLASS_ACTIVE);
      
    if(currActive === 0) {
      $(this).find(".prev").addClass(CLASS_DISABLED);
    } else {
      $list.eq(currActive-1).addClass(CLASS_SIBLING_ACTIVE);
      $(this).find(".prev").removeClass(CLASS_DISABLED);
    }

    if(currActive == ($list.length - 1)) {
      $(this).find(".next").addClass(CLASS_DISABLED);
    } else {
      $(this).find(".next").removeClass(CLASS_DISABLED);
    }
  }
});
    </script>
    <script>
        $(document).ready(function(){
            $("#selectCompanyT").change(function(){
                $(this).find("option:selected").each(function(){
                    var optionValue = $(this).attr("value");
                    if(optionValue){
                        $(".box").not("." + optionValue).hide();
                        $("." + optionValue).show();
                    } else{
                        $(".box").hide();
                    }
                });
            }).change();
        });
    </script>
    <!-- Cancel Modal -->
<div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cancelModalLabel">Cancel booking</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="text-center">
            <img src="{{ asset('frontend/images/finish-book.png') }}" alt="" class="mw-100 mb-3">
            <p>Please wait for the cancellation confirmation by email.</p>
        </div>
        <div class="alert alert-warning">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                <label class="form-check-label" for="flexCheckDefault">
                CANCELLATION / POSTPONEMENT MUST BE INFORMED WITHIN 7 DAYS BEFORE THE CLOSING TIME. OTHERWISE, WE WILL COLLECT THE PENALTY CHARGE AT THB 3,000.00 PER CONTAINER FOR CY SHIPMENT AND THB 5,000.00 PER CONTAINER FOR CFS SHIPMENT.
                </label>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Confirm cancel</button>
      </div>
    </div>
  </div>
</div>
</body>

</html>