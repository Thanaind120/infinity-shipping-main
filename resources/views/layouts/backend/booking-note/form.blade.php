<!DOCTYPE html>

<html lang="en">



<head>

    @include('include.style')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <link rel="stylesheet"
        href="{{ asset('backend/assets/vendors/bootstrap-fileupload/bootstrap-fileupload.min.css') }}" />

    <?php $active[20] = 'active'; ?>

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

                        <h1 class="font-large-1">Edit Notes On Booking</h1>

                    </div>

                    <div class="section-body">

                        <div class="card col-8">

                            <div class="card-body p-0">

                                <form action="{{ url('backend/notes-on-booking/update/' . $remark->id) }}"
                                    enctype="multipart/form-data" method="POST">

                                    @csrf

                                    @method('PUT')

                                    <input type="hidden" name="id" value="{{ $remark->id }}">

                                    <!-- form update -->

                                    <div class="form-group row ml-4 mt-5">

                                        <label for="" class="col-md-2 col-form-label">Remark :</label>

                                        <div class="col-md-8">

                                            <textarea type="text" id="remark" name="remark" class="mx-3" cols="62"
                                                rows="5">{{ $remark->remark }}</textarea>

                                        </div>

                                    </div>

                                    <div class="form-group row ml-4 mt-5">

                                        <label for="" class="col-md-2 col-form-label">Notes :</label>

                                        <div class="col-md-8">

                                            <textarea type="text" id="note" name="note" class="mx-3" cols="62"
                                                rows="5">{{ $remark->note }}</textarea>

                                        </div>

                                    </div>

                                    <div class="form-group row ml-4 mt-5">

                                        <label class="col-md-2 col-form-label">Status :</label>

                                        <div class="col-md-10 mt-2">

                                            <div class="custom-control custom-switch">

                                                @if(empty($remark))

                                                <input type="checkbox" class="custom-control-input" id="customSwitch"
                                                    name="status" value="1" checked>

                                                @else

                                                <input type="checkbox" class="custom-control-input" id="customSwitch"
                                                    name="status" value="1" {{ ( @$remark->status=='1')?'checked':'' }}>

                                                @endif

                                                <label class="custom-control-label" for="customSwitch"> Active /

                                                    Deactive</label>

                                            </div>

                                        </div>

                                    </div>

                                    <!-- End : form update -->

                                    <div class="form-group mb-0 row">

                                        <div class="col-md-6">

                                            <a class="btn btn-secondary btn-sm waves-effect"
                                                href="{{ url("/backend/notes-on-booking") }}">

                                                <i class="fa fa-reply font-size-16 align-middle mr-1"></i> Return

                                            </a>

                                        </div>

                                        <div class="col-md-6 text-right">

                                            <button type="submit" class="btn btn-success btn-sm waves-effect">

                                                <i class="fa fa-save font-size-16 align-middle mr-1"></i>

                                                Update

                                            </button>

                                        </div>

                                    </div>

                                    <br>

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
