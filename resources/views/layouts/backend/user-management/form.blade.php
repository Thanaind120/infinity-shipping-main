<!DOCTYPE html>

<html lang="en">



<head>

    @include('include.style')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <link rel="stylesheet"

        href="{{ asset('backend/assets/vendors/bootstrap-fileupload/bootstrap-fileupload.min.css') }}" />

    <?php $active[19] = 'active'; ?>

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

                        @if (!isset($users))

                        <h1 class="font-large-1">Create User Management</h1>

                        @else

                        <h1 class="font-large-1">Edit User Management</h1>

                        @endif

                    </div>



                    <div class="section-body">

                        <div class="card col-8">

                            <div class="card-body p-0">

                                @if (!isset($users))

                                <form action="{{ route('user.store') }}" enctype="multipart/form-data" method="POST"

                                    autocomplete="off">

                                    @csrf

                                    <input type="hidden" name="type" value="1">

                                    @else

                                    <form action="{{ url('backend/user-management/update/' . $users->id) }}"

                                        enctype="multipart/form-data" method="POST">

                                        @csrf

                                        @method('PUT')

                                        <input type="hidden" name="id" value="{{ $users->id }}">

                                        <input type="hidden" name="type" value="2">

                                        @endif

                                        <!-- form insert -->

                                        @if (!isset($users))

                                        <div class="form-group row ml-4 mt-5">

                                            <label for="" class="col-md-2 col-form-label">Username :</label>

                                            <div class="col-md-4">

                                                <input type="text" class="form-control" id="username" name="username"

                                                    value="" required>

                                            </div>

                                        </div>

                                        <div class="form-group row ml-4 mt-5">

                                            <label for="" class="col-md-2 col-form-label">Name :</label>

                                            <div class="col-md-5">

                                                <input type="text" class="form-control" id="name" name="name" value=""

                                                    required>

                                            </div>

                                        </div>

                                        <div class="form-group row ml-4 mt-5">

                                            <label for="" class="col-md-2 col-form-label">E-mail :</label>

                                            <div class="col-md-5">

                                                <input type="text" class="form-control" id="email" name="email"

                                                    value="" required>

                                            </div>

                                        </div>

                                        <div class="form-group row ml-4 mt-5">

                                            <label for="" class="col-md-2 col-form-label">Position :</label>

                                            <div class="col-md-5">

                                                <select class="form-control col-md-8" id="position" name="position"

                                                    required>

                                                    <option value="" disabled>Please Select Role</option>

                                                    @foreach ($roles as $key => $val)

                                                    <option value="{{ $val->id }}">

                                                        {{ $val->position_name }}</option>

                                                    @endforeach

                                                </select>

                                            </div>

                                        </div>

                                        <div class="form-group row ml-4 mt-5">

                                            <label for="" class="col-md-2 col-form-label">Password :</label>

                                            <div class="col-md-5">

                                                <input type="password" class="form-control" id="password_1"

                                                    name="password_1" value="" required>

                                            </div>

                                        </div>

                                        <div class="form-group row ml-4 mt-5">

                                            <label for="" class="col-form-label">Confirm Password

                                                :</label>&nbsp;&nbsp;&nbsp;&nbsp;

                                            <div class="col-md-5">

                                                <input type="password" class="form-control" id="password_2"

                                                    name="password_2" value="" required>

                                            </div>

                                        </div>

                                        @else

                                        <!-- End : form insert -->

                                        <!-- form update -->

                                        <div class="form-group row ml-4 mt-5">

                                            <label for="" class="col-md-2 col-form-label">Username :</label>

                                            <div class="col-md-4">

                                                <input type="text" class="form-control" id="username" name="username"

                                                    value="{{ $users->username }}" required>

                                            </div>

                                        </div>

                                        <div class="form-group row ml-4 mt-5">

                                            <label for="" class="col-md-2 col-form-label">Name :</label>

                                            <div class="col-md-5">

                                                <input type="text" class="form-control" id="name" name="name"

                                                    value="{{ $users->name }}" required>

                                            </div>

                                        </div>

                                        <div class="form-group row ml-4 mt-5">

                                            <label for="" class="col-md-2 col-form-label">E-mail :</label>

                                            <div class="col-md-5">

                                                <input type="text" class="form-control" id="email" name="email"

                                                    value="{{ $users->email }}" required>

                                            </div>

                                        </div>

                                        <div class="form-group row ml-4 mt-5">

                                            <label for="" class="col-md-2 col-form-label">Position :</label>

                                            <div class="col-md-5">

                                                <select class="form-control col-md-8" id="position" name="position"

                                                    required>

                                                    <option value="" disabled>Please Select Role</option>

                                                    @foreach ($roles as $key => $val)

                                                    <option {{ ($val->id == $users->position)? 'selected':'' }}

                                                        value="{{ $val->id }}">

                                                        {{ $val->position_name }}</option>

                                                    @endforeach

                                                </select>

                                            </div>

                                        </div>

                                        <div class="form-group row ml-4 mt-5">

                                            <label for="" class="col-md-2 col-form-label">Password :</label>

                                            <div class="col-md-5">

                                                <input type="password" class="form-control" id="password_1"

                                                    name="password_1" value="" required>

                                            </div>

                                        </div>

                                        <div class="form-group row ml-4 mt-5">

                                            <label for="" class="col-form-label">Confirm Password

                                                :</label>&nbsp;&nbsp;&nbsp;&nbsp;

                                            <div class="col-md-5">

                                                <input type="password" class="form-control" id="password_2"

                                                    name="password_2" value="" required>

                                            </div>

                                        </div>

                                        <div class="form-group row ml-4 mt-5">

                                            <label class="col-md-2 col-form-label">Status :</label>

                                            <div class="col-md-10 mt-2">

                                                <div class="custom-control custom-switch">

                                                    @if (empty($users))

                                                    <input type="checkbox" class="custom-control-input"

                                                        id="customSwitch" name="status" value="1" checked>

                                                    @else

                                                    <input type="checkbox" class="custom-control-input"

                                                        id="customSwitch" name="status" value="1"

                                                        {{ @$users->status == '1' ? 'checked' : '' }}>

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

                                                    href="{{ url('/backend/user-management') }}">

                                                    <i class="fa fa-reply font-size-16 align-middle mr-1"></i> Return

                                                </a>

                                            </div>

                                            <div class="col-md-6 text-right">

                                                <button type="submit" class="btn btn-success btn-sm waves-effect">

                                                    <i class="fa fa-save font-size-16 align-middle mr-1"></i>

                                                    @if (!isset($users))

                                                    Save

                                                    @else

                                                    Update

                                                    @endif

                                                </button>

                                            </div>

                                        </div><br>

                                        @if (!isset($users))

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



</body>



</html>

