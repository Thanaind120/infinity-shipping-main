<!DOCTYPE html>
<html lang="en">

<head>
    @include('include.style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet"
        href="{{ asset('backend/assets/vendors/bootstrap-fileupload/bootstrap-fileupload.min.css') }}" />
    <?php $active[15] = 'active'; ?>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            @include('include.nav')
            @include('include.menu')
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1 class="font-large-1">Edit Booking</h1>
                    </div>

                    <div class="section-body">
                        <div class="card col-8">
                            <div class="card-body p-0">
                                <form action="{{ url('backend/booking/updates/' . $Book->id_booking) }}"
                                    enctype="multipart/form-data" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id_booking" value="{{ $Book->id_booking }}">
                                    <!-- form update -->
                                    <div class="form-group row ml-4 mt-5">
                                        <label for="" class="col-form-label">Deadlines</label>&nbsp;&nbsp;
                                        <label for="" class="col-form-label">(PORT CUT-OFF) :</label>
                                        <div class="col-md-4">
                                            <input type="date" class="form-control" id="deadlines" name="deadlines"
                                                value="{{ $Book->deadlines }}">
                                        </div>
                                    </div>
                                    <!-- End : form update -->
                                    <div class="form-group mb-0 row">
                                        <div class="col-md-6">
                                            <a class="btn btn-secondary btn-sm waves-effect"
                                                href="{{ url('/backend/booking') }}">
                                                <i class="fa fa-reply font-size-16 align-middle mr-1"></i> Return
                                            </a>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <button type="submit" class="btn btn-success btn-sm waves-effect">
                                                <i class="fa fa-save font-size-16 align-middle mr-1"></i>
                                                Update
                                            </button>
                                        </div>
                                    </div><br>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            @include('include.footer')
        </div>
    </div>
    @include('include.script')
</body>

</html>
