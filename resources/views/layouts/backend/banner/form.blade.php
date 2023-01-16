<!DOCTYPE html>
<html lang="en">

<head>
    @include('include.style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet"
        href="{{ asset('backend/assets/vendors/bootstrap-fileupload/bootstrap-fileupload.min.css') }}" />
    <?php $active[0] = 'active'; ?>
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
                        @if (!isset($banner))
                        <h1 class="font-large-1">Create Slide Banner</h1>
                        @else
                        <h1 class="font-large-1">Edit Slide Banner</h1>
                        @endif
                    </div>

                    <div class="section-body">
                        <div class="card col-8">
                            <div class="card-body p-0">
                                @if (!isset($banner))
                                <form action="{{ route('banner.store') }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <input type="hidden" name="type" value="1">
                                    @else
                                    <form action="{{ url('backend/home/banner/update/' . $banner->id) }}"
                                        enctype="multipart/form-data" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $banner->id }}">
                                        <input type="hidden" name="type" value="2">
                                        @endif
                                        <!-- form insert -->
                                        @if (!isset($banner))
                                        <div class="form-group row ml-4 mt-5">
                                            <label for="" class="col-md-2 col-form-label">Banner :</label>
                                            <div class="col-md-8">
                                                <input type="file" accept="image/jpeg, image/png, image/jpg"
                                                    class="form-control" id="img_banner" name="img_banner[]" multiple
                                                    required>
                                            </div>
                                        </div>
                                        @else
                                        <!-- End : form insert -->
                                        <!-- form update -->
                                        <div class="form-group row ml-4 mt-5">
                                            <label for="" class="col-md-2 col-form-label">Banner :</label>
                                            <div class="col-md-8">
                                                <input type="file" accept="image/jpeg, image/png, image/jpg"
                                                    class="form-control" id="img_banner" name="img_banner">
                                            </div>
                                        </div>

                                        <div class="form-group row ml-4 mt-5">
                                            <div class="col-md-8" align="center">
                                                <img src="{{ $banner->img_banner != '' ? asset('backend/assets/img/banner/' . $banner->img_banner) : asset('backend/assets/img/banner/nopic.jpg') }}"
                                                    id="images" width="40%">
                                            </div>
                                        </div>

                                        <div class="form-group row ml-4 mt-5">
                                            <label class="col-md-2 col-form-label">Status :</label>
                                            <div class="col-md-10 mt-2">
                                                <div class="custom-control custom-switch">
                                                    @if (empty($banner))
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customSwitch" name="status" value="1" checked>
                                                    @else
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customSwitch" name="status" value="1"
                                                        {{ @$banner->status == '1' ? 'checked' : '' }}>
                                                    @endif
                                                    <label class="custom-control-label" for="customSwitch"> Active /
                                                        Deactive</label>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        <!-- End : form update -->
                                        <div class="form-group mb-0 row">
                                            <div class="col-md-6">
                                                <a class="btn btn-secondary btn-sm waves-effect"
                                                    href="{{ url('/backend/home/banner') }}">
                                                    <i class="fa fa-reply font-size-16 align-middle mr-1"></i> Return
                                                </a>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <button type="submit" class="btn btn-success btn-sm waves-effect">
                                                    <i class="fa fa-save font-size-16 align-middle mr-1"></i>
                                                    @if (!isset($banner))
                                                    Save
                                                    @else
                                                    Update
                                                    @endif
                                                </button>
                                            </div>
                                        </div><br>
                                        @if (!isset($banner))
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

        $("#img_banner").change(function () {

            var image, file;

            var value_input = this;

            if ((file = this.files[0])) {

                image = new Image();

                image.onload = function () {

                    signature(value_input);

                };

                image.src = _URL.createObjectURL(file);

            }

        });

        function signature(input) {

            if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function (e) {

                    $('#images').attr('src', e.target.result);

                }

                reader.readAsDataURL(input.files[0]);

            }

        }

    </script>

</body>

</html>
