<!DOCTYPE html>



<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">



<head>



    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Map Courses</title>

    <meta name="description" content="" />

    <!-- Headerscript -->

    @include('includes.header_script')

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

                            <h5 class="mb-0">View</h5>

                            <!-- <small class="text-muted float-end">Add Access Data</small> -->



                        </div>

                        <div class="container">

                            <div class="card">

                                <h3>Map Courses</h3>



                                <!-- <div class="card">

                    <div class="card-body">

                        <form>

                            <label class="form-label" for="university-name">Upload excel Sheet<span class="text-danger"> *</span></label>

                            <input type="file" class="form-control" id="university-logo" name="u_logo" required>

                            <button class="btn btn-primary mt-3">Save</button>

                        </form>

                    </div>

                </div> -->

                                <!--TABLE-->
                                <form action="{{url('/') }}/update_mapcourse" method="post">
                                    <input hidden type="text" value="{{$pagedata->course_id}}" name="crs_id">
                                    <input hidden type="text" value="{{$pagedata->uni_id}}" name="uni_id">
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
                                    <div class="table-responsive text-nowrap">

                                        <table class="table" data-toggle="table" data-toolbar="#toolbar" data-show-fullscreen="false" data-detail-view="false" data-show-export="true" data-click-to-select="true" data-detail-formatter="detailFormatter" data-minimum-count-columns="2" data-id-field="id" data-page-list="[10, 25, 50, 100, all]" data-show-footer="true" data-side-pagination="server" data-response-handler="responseHandler">



                                            <thead>

                                                <tr>

                                                    <th class="p-2">Course Name</th>


                                                    <th class="p-2">Per Semester Fee <br> (With Hostel)</th>

                                                    <th class="p-2">Per Semester Fee <br> (Without Hostel)</th>

                                                    <th class="p-2">Annual Semester Fee <br> (With Hostel)</th>

                                                    <th class="p-2">Annual Semester Fee <br> (Without Hostel)</th>
                                                    <th class="p-2">Registration Fee</th>

                                                </tr>

                                            </thead>

                                            <tbody class="list_wrapper">
                                                <tr>
                                                   


                                                    <td><input readonly type="text" class="form-control" value="{{$pagedata->uni_course}}" name="course_id"></td>

                                                    <td><input type="text" class="form-control" value="{{$pagedata->ps_fee_with_hos}}" name="ps_fee_with_hos"></td>

                                                    <td><input type="text" class="form-control" value="{{$pagedata->ps_fee_without_hos}}" name="ps_fee_without_hos"></td>

                                                    <td><input type="text" class="form-control" value="{{$pagedata->anul_fee_with_hos}}" name="anul_fee_with_hos"></td>

                                                    <td><input type="text" class="form-control" value="{{$pagedata->anul_fee_without_hos}}" name="anul_fee_without_hos"></td>

                                                    <td><input type="text" class="form-control" value="{{$pagedata->reg_fees}}" name="reg_fees"> </td>
                                                </tr>

                                            </tbody>

                                        </table>


                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label"><span class=""></span></label>
                                        <button type="submit" class="btn btn-primary mb-5">Update</button>
                                    </div>
                                </form>
                               
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

            <!-- Footerscript-->
        </div>


</body>



</html>