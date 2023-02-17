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
        width: 100%;
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
                        @if (!isset($contact))
                            <h1 class="font-large-1">Create Contact Us</h1>
                        @else
                            <h1 class="font-large-1">Edit Contact Us</h1>
                        @endif
                    </div>

                    <div class="section-body">
                        <div class="card col-8 ">
                            <div class="card-body p-0">
                                @if (!isset($contact))
                                    <form action="{{ route('contact.store') }}" enctype="multipart/form-data"
                                        method="POST">
                                        @csrf
                                        <input type="hidden" name="type" value="1">
                                    @else
                                        <form action="{{ url('backend/contact/update/' . $contact->id) }}"
                                            enctype="multipart/form-data" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="id" value="{{ $contact->id }}">
                                            <input type="hidden" name="type" value="2">
                                @endif
                                <!-- form insert -->
                                @if (!isset($contact))
                                @else
                                    <!-- End : form insert -->
                                    <!-- form update -->

                                    <h3 class="mt-3 ml-3">Contact Us</h3>
                                    <div class="col-md-12">
                                        <label for="" class="ml-2 col-form-label">Description :</label>
                                        <textarea name="contact_description" class="ml-2 mt-2" id="" cols="" rows="4">{{ $contact->contact_description }}</textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="" class="ml-2 col-form-label">Address :</label>
                                        <textarea name="contact_address" class="ml-2 mt-2" id="" cols="" rows="4">{{ $contact->contact_address }}</textarea>
                                    </div>
                                    <div class="row mr-2">
                                        <div class="col-md-6">
                                            <label for="" class="ml-3 col-form-label">Phone number :</label>
                                            <input type="text" class="form-control ml-3 mt-2" name="contact_phone"
                                                id="" value="{{ $contact->contact_phone }}" required>
                                        </div>

                                        <div class="col-md-6 ">
                                            <label for="" class="ml-3 col-form-label">Fax :</label>
                                            <input type="text" class="form-control ml-3 mt-2" name="contact_fax"
                                                id="" value="{{ $contact->contact_fax }}" required>
                                        </div>

                                    </div>
                                    <div class="row mr-2">
                                        <div class="col-md-6 ">
                                            <label for="" class="ml-3 col-form-label">Email :</label>
                                            <input type="text" class="form-control ml-3 mt-2" name="contact_email"
                                                id="" value="{{ $contact->contact_email }}" required>
                                        </div>

                                        <div class="col-md-6 ">
                                            <label for="" class="ml-3 col-form-label">Line : </label>
                                            <input type="text" class="form-control ml-3 mt-2" name="contact_line"
                                                id="" value="{{ $contact->contact_line }}" required>
                                        </div>

                                    </div>
                                    <h6 class="ml-3 mt-3"> SALES & MARKETING TEAM @if($check->contactus_create == 1) <input id=""
                                            class="btn btn-primary contact_add_sales" type="button" value="+"> @endif
                                    </h6>

                                    <input type="hidden" name="sales_old_delete" id="sales_old_delete">
                                    @foreach ($contactsales as $item)
                                        <div class="row mr-2" id="sales_old{{ $item->id }}">
                                            <div class="col-md-5">
                                                <input type="hidden" name="contact_sales_id[]"
                                                    value="{{ $item->id }}">
                                                <label for="" class="ml-3 col-form-label">Sales
                                                    Name :</label>
                                                <input type="text" class="form-control ml-3 mt-2"
                                                    name="sales_name_old[]" id=""
                                                    value="{{ $item->sales_name }}" required>
                                            </div>

                                            <div class="col-md-5">
                                                <label for="" class="ml-3 col-form-label">Tel :</label>
                                                <input type="text" value="{{ $item->tel }}"
                                                    class="form-control ml-3 mt-2" name="tel_old[]" id=""
                                                    required>
                                            </div>
                                            @if($check->contactus_delete == 1)
                                            <div class="col-md-2">
                                                <br>
                                                <input id="" class="mt-4 btn btn-danger"
                                                    onclick="delete_sales_old({{ $item->id }})" type="button"
                                                    value="X">
                                            </div>
                                            @endif
                                        </div>
                                    @endforeach
                                    <div id="output">

                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <label for="" class="ml-2 col-form-label">Link Google Maps (Iframe)
                                            :
                                        </label>
                                        <input type="text" name="link_map" class="form-control"
                                            value="{{ $contact->link_map }}">
                                    </div>
                                    @if($check->contactus_edit == 1)
                                    <div class="form-group row ml-4 mt-5">
                                        <label class="col-md-2 col-form-label">Status :</label>
                                        <div class="col-md-10 mt-2">
                                            <div class="custom-control custom-switch">
                                                @if (empty($contact))
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customSwitch" name="status" value="1" checked>
                                                @else
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customSwitch" name="status" value="1"
                                                        {{ @$contact->status == '1' ? 'checked' : '' }}>
                                                @endif
                                                <label class="custom-control-label" for="customSwitch"> Active /
                                                    Deactive</label>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endif
                                <!-- End : form update -->

                                <div class="form-group mb-0 row mt-5">
                                    {{-- <div class="col-md-6">
                                        <a class="btn btn-secondary btn-sm waves-effect"
                                            href="{{ url('/backend/services') }}">
                                            <i class="fa fa-reply font-size-16 align-middle mr-1"></i> Return
                                        </a>
                                    </div> --}}
                                    @if($check->contactus_edit == 1)
                                    <div class="col-md-6 text-right">
                                        <button type="submit" class="btn btn-success btn-sm waves-effect">
                                            <i class="fa fa-save font-size-16 align-middle mr-1"></i>
                                            @if (!isset($contact))
                                                Save
                                            @else
                                             Update 
                                            @endif
                                        </button>
                                    </div>
                                    @endif
                                </div><br>
                                @if (!isset($contact))
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
        // เพิ่มช่องกรอกข้อมูล Sales
        $(document).ready(function() {

            var count = 1;
            dynamic_field(count);

            function dynamic_field(count) {
                if (count > 1) {
                    $(`#output`).append(
                        `                
                     <div class="row mr-2" id="sales${count}">
                        <div class="col-md-5">
                            <label for="" class="ml-3 col-form-label">Sales Name :</label>
                            <input type="text" class="form-control ml-3 mt-2" name="sales_name[]"
                                id="" required>
                        </div>

                        <div class="col-md-5">
                            <label for="" class="ml-3 col-form-label">Tel :</label>
                            <input type="text" class="form-control ml-3 mt-2" name="tel[]"
                                id="" required>
                        </div>
                        <div class="col-md-2">
                            <br> 
                            <input id=""  class="mt-4 btn btn-danger"  onclick="delete_sales(${count})" type="button"
                                value="X">
                        </div>
                    </div>
                          `
                    );
                }
            }




            $(document).on('click', '.contact_add_sales', function() {
                count++;
                dynamic_field(count);
            });


        });
    </script>
    <script>
        function delete_sales(id) {
            $(`#sales${id}`).html(' ');
        }

        // เอาของ id ที่ลบ sales เข้า array (ข้อมูลเก่า)
        const count_delete = [];

        function delete_sales_old(id) {
            // alert(id);
            count_delete.push(id);
            $('#sales_old_delete').val(count_delete);
            // alert(count_delete);
            $(`#sales_old${id}`).html(' ');
        }
    </script>
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
