<!DOCTYPE html>
<html lang="en">

<head>
    @include('include.style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet"
        href="{{ asset('backend/assets/vendors/bootstrap-fileupload/bootstrap-fileupload.min.css') }}" />
    <link href="{{ asset('backend/assets/summernote/summernote-lite.min.css') }}" rel="stylesheet">
    <?php $active[8] = 'active'; ?>
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
                        @if (!isset($about))
                        <h1 class="font-large-1">Create About Us</h1>
                        @else
                        <h1 class="font-large-1">Edit About Us</h1>
                        @endif
                    </div>

                    <div class="section-body">
                        <div class="card col-8">
                            <div class="card-body p-0">
                                @if (!isset($about))
                                <form action="{{ route('about.store') }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <input type="hidden" name="type" value="1">
                                    @else
                                    <form action="{{ url('backend/about/update/' . $about->id) }}"
                                        enctype="multipart/form-data" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $about->id }}">
                                        <input type="hidden" name="type" value="2">
                                        @endif
                                        <!-- form insert -->
                                        @if (!isset($about))
                                        <div class="form-group row ml-4 mt-5">
                                            <label for="" class="col-md-2 col-form-label">Images :</label>
                                            <div class="col-md-8">
                                                <input type="file" accept="image/jpeg, image/png, image/jpg"
                                                    class="form-control" id="img_about" name="img_about" required>
                                            </div>
                                        </div>

                                        <div class="form-group row ml-4 mt-5">
                                            <label for="" class="col-md-2 col-form-label">Description :</label>
                                            <div class="col-md-10">
                                                <textarea type="text" id="description" name="description" class="mx-3" cols="68"
                                                    rows="10"></textarea>
                                            </div>
                                        </div>
                                        @else
                                        <!-- End : form insert -->
                                        <!-- form update -->
                                        <div class="form-group row ml-4 mt-5">
                                            <label for="" class="col-md-2 col-form-label">Images :</label>
                                            <div class="col-md-8">
                                                <input type="file" accept="image/jpeg, image/png, image/jpg"
                                                    class="form-control" id="img_about" name="img_about">
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4 mt-5">
                                            <div class="col-md-8" align="center">
                                                <img src="{{ $about->img_about != '' ? asset('backend/assets/img/about/' . $about->img_about) : asset('backend/assets/img/about/nopic.jpg') }}"
                                                    id="images" width="40%">
                                            </div>
                                        </div>

                                        <div class="form-group row ml-4 mt-5">
                                            <label for="" class="col-md-2 col-form-label">Description :</label>
                                            <div class="col-md-10">
                                                <textarea type="text" id="description" name="description" class="mx-3" cols="68"
                                                    rows="10">{!! $about->description !!}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row ml-4 mt-5">
                                            <label class="col-md-2 col-form-label">Status :</label>
                                            <div class="col-md-10 mt-2">
                                                <div class="custom-control custom-switch">
                                                    @if (empty($about))
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customSwitch" name="status" value="1" checked>
                                                    @else
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customSwitch" name="status" value="1"
                                                        {{ @$about->status == '1' ? 'checked' : '' }}>
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
                                                    href="{{ url('/backend/about') }}">
                                                    <i class="fa fa-reply font-size-16 align-middle mr-1"></i> Return
                                                </a>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <button type="submit" class="btn btn-success btn-sm waves-effect">
                                                    <i class="fa fa-save font-size-16 align-middle mr-1"></i>
                                                    @if (!isset($about))
                                                    Save
                                                    @else
                                                    Update
                                                    @endif
                                                </button>
                                            </div>
                                        </div><br>
                                        @if (!isset($about))
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
    <script src="{{ asset('backend/assets/summernote/summernote-lite.min.js') }}"></script>
    <script>
        $('#description').summernote({
            tabsize: 2,
            height: ($(window).height() - 300),
            acceptImageFileTypes: "image/*",
        });

        var _URL = window.URL || window.webkitURL;

        $("#img_about").change(function () {

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
