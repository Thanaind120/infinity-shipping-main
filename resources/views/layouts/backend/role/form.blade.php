<!DOCTYPE html>
<html lang="en">

<head>
    @include('include.style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet"
        href="{{ asset('backend/assets/vendors/bootstrap-fileupload/bootstrap-fileupload.min.css') }}" />
    <?php $active[18] = 'active'; ?>
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
                        @if (!isset($roles))
                        <h1 class="font-large-1">Create Role</h1>
                        @else
                        <h1 class="font-large-1">Edit Role</h1>
                        @endif
                    </div>

                    <div class="section-body">
                        <div class="card col-8">
                            <div class="card-body p-0">
                                @if (!isset($roles))
                                <form action="{{ route('role.store') }}" enctype="multipart/form-data" method="POST"
                                    autocomplete="off">
                                    @csrf
                                    <input type="hidden" name="type" value="1">
                                    @else
                                    <form action="{{ url('backend/user-role/update/' . $roles->id) }}"
                                        enctype="multipart/form-data" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $roles->id }}">
                                        <input type="hidden" name="type" value="2">
                                        @endif
                                        <!-- form insert -->
                                        @if (!isset($roles))
                                        <div class="form-group row ml-4 mt-5">
                                            <label for="position_name" class="col-md-2 col-form-label">Position
                                                :</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" id="position_name"
                                                    name="position_name" value="" required>
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4 mt-5">
                                            <label for="customCheckbox" class="col-md-3 col-form-label">Permissions
                                                =></label>
                                            <div class="col-md-2">
                                                Page View <br><br>

                                            </div>
                                            <div class="col-md-2">
                                                Page create <br><br>

                                            </div>
                                            <div class="col-md-2">
                                                Page Edit <br><br>

                                            </div>
                                            <div class="col-md-2">
                                                Page Delete <br><br>

                                            </div>
                                        </div>
                                        <div class="form-group row ml-4">
                                            <label for="customCheckbox" class="col-md-3 col-form-label">Home Menu
                                                :</label>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="home_view"
                                                        name="home_view" value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="home_create"
                                                        name="home_create" value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="home_edit"
                                                        name="home_edit" value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="home_delete"
                                                        name="home_delete" value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4">
                                            <label for="customCheckbox" class="col-md-3 col-form-label">About Us Menu
                                                :</label>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="aboutus_view"
                                                        name="aboutus_view" value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="aboutus_create"
                                                        name="aboutus_create" value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="aboutus_edit"
                                                        name="aboutus_edit" value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="aboutus_delete"
                                                        name="aboutus_delete" value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4">
                                            <label for="customCheckbox" class="col-md-3 col-form-label">Service Menu
                                                :</label>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="service_view"
                                                        name="service_view" value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="service_create"
                                                        name="service_create" value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="service_edit"
                                                        name="service_edit" value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="service_delete"
                                                        name="service_delete" value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4">
                                            <label for="customCheckbox" class="col-md-3 col-form-label">Prices Menu
                                                :</label>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="price_view"
                                                        name="price_view" value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="price_create"
                                                        name="price_create" value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="price_edit"
                                                        name="price_edit" value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="price_delete"
                                                        name="price_delete" value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4">
                                            <label for="customCheckbox" class="col-md-3 col-form-label">Booking Menu
                                                :</label>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="booking_view"
                                                        name="booking_view" value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="booking_create"
                                                        name="booking_create" value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="booking_edit"
                                                        name="booking_edit" value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="booking_delete"
                                                        name="booking_delete" value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4">
                                            <label for="customCheckbox" class="col-md-3 col-form-label">Schedules Menu
                                                :</label>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="schedules_view"
                                                        name="schedules_view" value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="schedules_create"
                                                        name="schedules_create" value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="schedules_edit"
                                                        name="schedules_edit" value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="schedules_delete"
                                                        name="schedules_delete" value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4">
                                            <label for="customCheckbox" class="col-md-3 col-form-label">Contact Us Menu
                                                :</label>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="contactus_view"
                                                        name="contactus_view" value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="contactus_create"
                                                        name="contactus_create" value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="contactus_edit"
                                                        name="contactus_edit" value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="contactus_delete"
                                                        name="contactus_delete" value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4">
                                            <label for="customCheckbox" class="col-md-3 col-form-label">Management Menu
                                                :</label>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="management_view"
                                                        name="management_view" value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="management_create"
                                                        name="management_create" value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="management_edit"
                                                        name="management_edit" value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="management_delete"
                                                        name="management_delete" value="1">
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <!-- End : form insert -->
                                        <!-- form update -->
                                        <div class="form-group row ml-4 mt-5">
                                            <label for="position_name" class="col-md-2 col-form-label">Position
                                                :</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" id="position_name"
                                                    name="position_name" value="" required>
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4 mt-5">
                                            <label for="customCheckbox" class="col-md-3 col-form-label">Permissions
                                                =></label>
                                            <div class="col-md-2">
                                                Page View <br><br>

                                            </div>
                                            <div class="col-md-2">
                                                Page create <br><br>

                                            </div>
                                            <div class="col-md-2">
                                                Page Edit <br><br>

                                            </div>
                                            <div class="col-md-2">
                                                Page Delete <br><br>

                                            </div>
                                        </div>
                                        <div class="form-group row ml-4">
                                            <label for="customCheckbox" class="col-md-3 col-form-label">Home Menu
                                                :</label>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="home_view"
                                                        name="home_view"
                                                        {{ ( @$role_permission->home_view == '1')? 'checked' : '' }}
                                                        value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="home_create"
                                                        name="home_create"
                                                        {{ ( @$role_permission->home_create == '1')? 'checked' : '' }}
                                                        value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="home_edit"
                                                        name="home_edit"
                                                        {{ ( @$role_permission->home_edit == '1')? 'checked' : '' }}
                                                        value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="home_delete"
                                                        name="home_delete"
                                                        {{ ( @$role_permission->home_delete == '1')? 'checked' : '' }}
                                                        value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4">
                                            <label for="customCheckbox" class="col-md-3 col-form-label">About Us Menu
                                                :</label>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="aboutus_view"
                                                        name="aboutus_view"
                                                        {{ ( @$role_permission->aboutus_view == '1')? 'checked' : '' }}
                                                        value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="aboutus_create"
                                                        name="aboutus_create"
                                                        {{ ( @$role_permission->aboutus_create == '1')? 'checked' : '' }}
                                                        value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="aboutus_edit"
                                                        name="aboutus_edit"
                                                        {{ ( @$role_permission->aboutus_edit == '1')? 'checked' : '' }}
                                                        value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="aboutus_delete"
                                                        name="aboutus_delete"
                                                        {{ ( @$role_permission->aboutus_delete == '1')? 'checked' : '' }}
                                                        value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4">
                                            <label for="customCheckbox" class="col-md-3 col-form-label">Service Menu
                                                :</label>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="service_view"
                                                        name="service_view"
                                                        {{ ( @$role_permission->service_view == '1')? 'checked' : '' }}
                                                        value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="service_create"
                                                        name="service_create"
                                                        {{ ( @$role_permission->service_create == '1')? 'checked' : '' }}
                                                        value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="service_edit"
                                                        name="service_edit"
                                                        {{ ( @$role_permission->service_edit == '1')? 'checked' : '' }}
                                                        value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="service_delete"
                                                        name="service_delete"
                                                        {{ ( @$role_permission->service_delete == '1')? 'checked' : '' }}
                                                        value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4">
                                            <label for="customCheckbox" class="col-md-3 col-form-label">Prices Menu
                                                :</label>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="price_view"
                                                        name="price_view"
                                                        {{ ( @$role_permission->price_view == '1')? 'checked' : '' }}
                                                        value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="price_create"
                                                        name="price_create"
                                                        {{ ( @$role_permission->price_create == '1')? 'checked' : '' }}
                                                        value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="price_edit"
                                                        name="price_edit"
                                                        {{ ( @$role_permission->price_edit == '1')? 'checked' : '' }}
                                                        value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="price_delete"
                                                        name="price_delete"
                                                        {{ ( @$role_permission->price_delete == '1')? 'checked' : '' }}
                                                        value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4">
                                            <label for="customCheckbox" class="col-md-3 col-form-label">Booking Menu
                                                :</label>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="booking_view"
                                                        name="booking_view"
                                                        {{ ( @$role_permission->booking_view == '1')? 'checked' : '' }}
                                                        value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="booking_create"
                                                        name="booking_create"
                                                        {{ ( @$role_permission->booking_create == '1')? 'checked' : '' }}
                                                        value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="booking_edit"
                                                        name="booking_edit"
                                                        {{ ( @$role_permission->booking_edit == '1')? 'checked' : '' }}
                                                        value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="booking_delete"
                                                        name="booking_delete"
                                                        {{ ( @$role_permission->booking_delete == '1')? 'checked' : '' }}
                                                        value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4">
                                            <label for="customCheckbox" class="col-md-3 col-form-label">Schedules Menu
                                                :</label>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="schedules_view"
                                                        name="schedules_view"
                                                        {{ ( @$role_permission->schedules_view == '1')? 'checked' : '' }}
                                                        value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="schedules_create"
                                                        name="schedules_create"
                                                        {{ ( @$role_permission->schedules_create == '1')? 'checked' : '' }}
                                                        value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="schedules_edit"
                                                        name="schedules_edit"
                                                        {{ ( @$role_permission->schedules_edit == '1')? 'checked' : '' }}
                                                        value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="schedules_delete"
                                                        name="schedules_delete"
                                                        {{ ( @$role_permission->schedules_delete == '1')? 'checked' : '' }}
                                                        value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4">
                                            <label for="customCheckbox" class="col-md-3 col-form-label">Contact Us Menu
                                                :</label>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="contactus_view"
                                                        name="contactus_view"
                                                        {{ ( @$role_permission->contactus_view == '1')? 'checked' : '' }}
                                                        value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="contactus_create"
                                                        name="contactus_create"
                                                        {{ ( @$role_permission->contactus_create == '1')? 'checked' : '' }}
                                                        value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="contactus_edit"
                                                        name="contactus_edit"
                                                        {{ ( @$role_permission->contactus_edit == '1')? 'checked' : '' }}
                                                        value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="contactus_delete"
                                                        name="contactus_delete"
                                                        {{ ( @$role_permission->contactus_delete == '1')? 'checked' : '' }}
                                                        value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4">
                                            <label for="customCheckbox" class="col-md-3 col-form-label">Management Menu
                                                :</label>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="management_view"
                                                        name="management_view"
                                                        {{ ( @$role_permission->management_view == '1')? 'checked' : '' }}
                                                        value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="management_create"
                                                        name="management_create"
                                                        {{ ( @$role_permission->management_create == '1')? 'checked' : '' }}
                                                        value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="management_edit"
                                                        name="management_edit"
                                                        {{ ( @$role_permission->management_edit == '1')? 'checked' : '' }}
                                                        value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">
                                                    &nbsp;&nbsp;&nbsp;<input type="checkbox" id="management_delete"
                                                        name="management_delete"
                                                        {{ ( @$role_permission->management_delete == '1')? 'checked' : '' }}
                                                        value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4 mt-5">
                                            <label class="col-md-2 col-form-label">Status :</label>
                                            <div class="col-md-10 mt-2">
                                                <div class="custom-control custom-switch">
                                                    @if (empty($roles))
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customSwitch" name="status" value="1" checked>
                                                    @else
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customSwitch" name="status" value="1"
                                                        {{ @$roles->status == '1' ? 'checked' : '' }}>
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
                                                    href="{{ url('/backend/user-role') }}">
                                                    <i class="fa fa-reply font-size-16 align-middle mr-1"></i> Return
                                                </a>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <button type="submit" class="btn btn-success btn-sm waves-effect">
                                                    <i class="fa fa-save font-size-16 align-middle mr-1"></i>
                                                    @if (!isset($roles))
                                                    Save
                                                    @else
                                                    Update
                                                    @endif
                                                </button>
                                            </div>
                                        </div><br>
                                        @if (!isset($roles))
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
