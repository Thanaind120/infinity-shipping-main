<!DOCTYPE html>
<html lang="en">

<head>
    @include('include.style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet"
        href="{{ asset('backend/assets/vendors/bootstrap-fileupload/bootstrap-fileupload.min.css') }}" />
    <?php $active[7] = 'active'; ?>
</head>
<style>
    textarea {
        outline: none !important;
        border-color: #e4e6fc;
        border-radius: 4px;
        /* box-shadow: 0 0 10px #719ECE; */
    }
</style>

<body>
    <div id="app">
        <div class="main-wrapper">
            @include('include.nav')
            @include('include.menu')
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        @if (!isset($services))
                            <h1 class="font-large-1">Create Services</h1>
                        @else
                            <h1 class="font-large-1">Edit Services</h1>
                        @endif
                    </div>

                    <div class="section-body">
                        <div class="card col-12">
                            <div class="card-body p-0">
                                @if (!isset($services))
                                    <form action="{{ route('services.store') }}" enctype="multipart/form-data"
                                        method="POST">
                                        @csrf
                                        <input type="hidden" name="type" value="1">
                                    @else
                                        <form action="{{ url('backend/services/update/' . $services->id) }}"
                                            enctype="multipart/form-data" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="id" value="{{ $services->id }}">
                                            <input type="hidden" name="type" value="2">
                                @endif
                                <!-- form insert -->
                                @if (!isset($services))
                                    <label for="" class="col-md-4 col-form-label mt-3  ">Service Name :</label>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="service_name" id=""
                                            required>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="" class="col-md-4 col-form-label">Description :</label>
                                            <textarea name="service_description" class="  mx-3" id="" cols="100" rows="10">

                                            </textarea required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="" class="col-md-4 col-form-label">Image No. 1 :</label>
                                            <input type="file" accept="image/jpeg, image/png, image/jpg"
                                                class="form-control" id="service_images1" name="service_images1"
                                                >
                                            <div class="d-flex justify-content-center">
                                                <img src="" id="images1" width="40%"
                                                    class="mt-3 mb-3 d-flex">
                                            </div>

                                            <hr>
                                            <label for="" class="col-md-4 col-form-label">Image No. 2 :</label>
                                            <input type="file" accept="image/jpeg, image/png, image/jpg"
                                                class="form-control" id="service_images2" name="service_images2"
                                                >
                                            <div class="d-flex justify-content-center">
                                                <img src="" id="images2" width="40%"
                                                    class="mt-3 mb-3 d-flex">
                                            </div>

                                        </div>
                                    </div>
                                    @else
                                    <!-- End : form insert -->
                                    <!-- form update -->
                                    <label for="" class="col-md-4 col-form-label mt-3  ">Service Name :</label>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="service_name" id=""
                                            value="{{ $services->service_name }}">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="" class="col-md-4 col-form-label">Description :</label>
                                            <textarea name="service_description" class=" mx-3" id="" cols="100" rows="10">{{ $services->service_description }}</textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="" class="col-md-4 col-form-label">Image No. 1 :</label>
                                            <input type="file" accept="image/jpeg, image/png, image/jpg"
                                                class="form-control" id="service_images1" name="service_images1">
                                            <div class="d-flex justify-content-center">
                                                <img src="{{ $services->service_images1 != '' ? asset('backend/assets/img/services/' . $services->service_images1) : asset('backend/assets/img/services/nopic.jpg') }}"
                                                    id="images1" width="40%" class="mt-3 mb-3 d-flex">
                                            </div>

                                            <hr>
                                            <label for="" class="col-md-4 col-form-label">Image No. 2
                                                :</label>
                                            <input type="file" accept="image/jpeg, image/png, image/jpg"
                                                class="form-control" id="service_images2" name="service_images2">
                                            <div class="d-flex justify-content-center">
                                                <img src="{{ $services->service_images2 != '' ? asset('backend/assets/img/services/' . $services->service_images2) : asset('backend/assets/img/services/nopic.jpg') }}"
                                                    id="images2" width="40%" class="mt-3 mb-3 d-flex">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group row ml-4 mt-5">
                                        <label class="col-md-2 col-form-label">Status :</label>
                                        <div class="col-md-10 mt-2">
                                            <div class="custom-control custom-switch">
                                                @if (empty($services))
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customSwitch" name="status" value="1" checked>
                                                @else
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customSwitch" name="status" value="1"
                                                        {{ @$services->status == '1' ? 'checked' : '' }}>
                                                @endif
                                                <label class="custom-control-label" for="customSwitch"> Active /
                                                    Deactive</label>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <!-- End : form update -->

                                <div class="form-group mb-0 row mt-5">
                                    <div class="col-md-6">
                                        <a class="btn btn-secondary btn-sm waves-effect"
                                            href="{{ url('/backend/services') }}">
                                            <i class="fa fa-reply font-size-16 align-middle mr-1"></i> Return
                                        </a>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <button type="submit" class="btn btn-success btn-sm waves-effect">
                                            <i class="fa fa-save font-size-16 align-middle mr-1"></i>
                                            @if (!isset($services))
                                                Save
                                            @else
                                                Update
                                            @endif
                                        </button>
                                    </div>
                                </div><br>
                                @if (!isset($services))
                                    </form>
                                @else
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            @include('include.footer')
        </div>
    </div>

    @include('include.script')
    <script>
        var _URL = window.URL || window.webkitURL;

        // Start : image 1
        $("#service_images1").change(function() {

            var image, file;

            var value_input = this;

            if ((file = this.files[0])) {

                image = new Image();

                image.onload = function() {

                    signature1(value_input);

                };

                image.src = _URL.createObjectURL(file);

            }

        });

        function signature1(input) {

            if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function(e) {

                    $('#images1').attr('src', e.target.result);

                }

                reader.readAsDataURL(input.files[0]);

            }

        }
        //  End : image 1

        // Start : image 2
        $("#service_images2").change(function() {

            var image, file;

            var value_input = this;

            if ((file = this.files[0])) {

                image = new Image();

                image.onload = function() {

                    signature2(value_input);

                };

                image.src = _URL.createObjectURL(file);

            }

        });

        function signature2(input) {

            if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function(e) {

                    $('#images2').attr('src', e.target.result);

                }

                reader.readAsDataURL(input.files[0]);

            }

        }
        //  End : image 2

        function success_alert() {
            Swal.fire(
                'Success!',
                'Data is save!',
                'success'
            )
        }
    </script>

</body>

</html>
