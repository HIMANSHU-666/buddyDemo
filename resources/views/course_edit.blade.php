<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>

    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Edit Course</title>

    <meta name="description" content="" />



    <!-- Headerscript -->

    @include('includes.header_script')

    <style>
        .imagePreview {
            width: 100%;
            height: 200px;
            background-position: center center;
            background: url(https://tamilnaducouncil.ac.in/wp-content/uploads/2020/04/dummy-avatar.jpg);
            background-color: #fff;
            background-size: cover;
            background-repeat: no-repeat;
            display: inline-block;
            box-shadow: 0px -3px 6px 2px rgba(0, 0, 0, 0.2);
        }

        .imgUp {
            margin-bottom: 15px;
        }
    </style>

</head>

<body>

    <!-- Layout wrapper -->

    <div class="layout-wrapper layout-content-navbar">

        <div class="layout-container">

            @include('includes.sidebar')

            <!-- Menu -->



            <!-- Layout container -->

            <div class="layout-page">

                <!-- Navbar -->

                @include('includes.header')

                <!-- Navbar -->



                <!-- Centered Form -->

                <div class="container mt-3">

                    <div class="card mb-4">

                        <div class="card-header d-flex justify-content-between align-items-center">

                            <h5 class="mb-0">Edit Course Details</h5>

                            <!-- <small class="text-muted float-end">Add Access Data</small> -->

                        </div>

                        <div class="card-body">

                            <div class="row d-flex justify-content-start">

                                <form id="formAuthentication" class="mb-3" action="{{url('/') }}/edit_course_data" method="POST">

                                    @csrf

                                    @if ($errors->any())

                                    <div class="alert alert-danger">

                                        <ul>

                                            @foreach ($errors->all() as $error)

                                            <li>{{ $error }}</li>

                                            @endforeach

                                        </ul>

                                    </div>

                                    @endif

                                    @if(session('success'))

                                    <div class="alert alert-primary">

                                        {{ session('success') }}

                                    </div>

                                    @endif



                                    <input type="hidden" name="id" class="form-control" value="{{$pagedata->id}}" required />

                                    <div class="row">

                                        <div class="col-sm-3">
                                            <div class="form-group mb-3">

                                                <label class="form-label" for="basic-icon-default-fullname">Course:</label>

                                                <input type="text" class="form-control" name="course_name" value="{{$pagedata->course_name}}" />

                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group mb-3">

                                                <label class="form-label" for="basic-icon-default-fullname">Type:</label>
                                                <select class="form-select" name="course_type">
                                                    <option selected disabled value="">Select</option>

                                                    @foreach($type as $key => $data)
                                                    @if($data->id==$pagedata->course_type){{$sel='selected';}}@else{{$sel='';}} @endif
                                                    <option value="{{$data->id}}" {{$sel}}>{{$data->type}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="form-label" for="basic-icon-default-fullname">Course Code:</label>

                                            <input type="text" class="form-control" name="course_code" value="{{$pagedata->course_code}}"  />
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="form-label" for="basic-icon-default-fullname">Course Eligibility:</label>

                                            <input type="text" class="form-control" name="course_eligibility" value="{{$pagedata->course_eligibility}}"  />
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="form-label" for="basic-icon-default-fullname">Course Duration (In Years):</label>

                                            <input type="text" class="form-control" name="course_duration_year" value="{{$pagedata->course_duration_year}}"    />
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="form-label" for="basic-icon-default-fullname">Course Duration (In Months)</label>

                                            <input type="text" class="form-control" name="course_duration_month" value="{{$pagedata->course_duration_month}}"  />
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="form-label" for="basic-icon-default-fullname">Course Duration (In Sememster):</label>

                                            <input type="text" class="form-control" name="course_duration_sem" value="{{$pagedata->course_duration_sem}}"  />
                                        </div>

                                        <div class="col-sm-3">

                                            <div class="form-group mb-3">

                                                <label class="form-label">status</label>
                                                <select class="form-select" name="status">
                                                    <option value="1" @if($pagedata->status==1){{'selected';}}@endif>Active</option>
                                                    <option value="0" @if($pagedata->status==0){{'selected';}}@endif>Inactive</option>
                                                </select>

                                            </div>

                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-success">update</button>

                                </form>



                            </div>

                        </div>

                    </div>

                </div>

                <!-- Footer -->

                <footer class="default-footer">

                    @include('includes.footer')

                    <!-- Footer -->

                    <div class="content-backdrop fade"></div>

            </div>

            <!-- Content wrapper -->

        </div>

        <!-- Layout page -->

    </div>

    <!-- Overlay -->

    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Layout wrapper -->

    @include('includes.footer_script')

    <!-- Footerscript -->

</body>

</html>