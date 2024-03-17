<!DOCTYPE html>



<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">



<head>



    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Edit Map Courses</title>

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

                            <h3 class="mb-0 text-primary text-decoration-underline">{{$university->uni_name}}</h3>

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

                                <div class="table-responsive text-nowrap">

                                    <table class="table" data-toggle="table" data-toolbar="#toolbar" data-search="true" data-show-refresh="true" data-show-toggle="true" data-show-fullscreen="false" data-show-columns="true" data-show-columns-toggle-all="true" data-detail-view="false" data-show-export="true" data-click-to-select="true" data-detail-formatter="detailFormatter" data-minimum-count-columns="2" data-show-pagination-switch="true" data-pagination="true" data-id-field="id" data-page-list="[10, 25, 50, 100, all]" data-show-footer="true" data-side-pagination="server" data-response-handler="responseHandler">
                                        <thead>
                                            <tr>
                                                <th class="p-2">Course</th>

                                                <th class="p-2">Per Sem<br>(With Hostel)</th>

                                                <th class="p-2">Per Sem <br>(Without Hostel)</th>

                                                <th class="p-2">Annual Sem<br>(With Hostel)</th>

                                                <th class="p-2">Annual Sem<br>(Without Hostel)</th>
                                                <th class="p-2">Registration <br>Fee</th>
                                                <th class="p-2">Scholarship
                                                <th class="p-2">Status</th>
                                                <th class="p-2">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pagedata as $key => $uni_courses)
                                            @php
                                            $key++;
                                            @endphp
                                            <tr>

                                                <td>{{$uni_courses->uni_course}}</td>
                                                <td>{{$uni_courses->ps_fee_with_hos}}</td>
                                                <td>{{$uni_courses->ps_fee_without_hos}}</td>
                                                <td>{{$uni_courses->anul_fee_with_hos}}</td>
                                                <td>{{$uni_courses->anul_fee_without_hos}}</td>
                                                <td>{{$uni_courses->reg_fees}}</td>
                                                <td>N/A</td>
                                                <td>
                                                    <div class="btn btn-success btn-xs mx-auto">Active</div>
                                                </td>
                                                <td>
                                                    <a href="{{url('editmapcourse',[$uni_courses->course_id,$uni_courses->university_id])}}" class="btn btn-primary btn-sm"><i class=" bx bx-pencil"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="del({{$uni_courses->course_id}},{{$uni_courses->university_id}})"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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

            <!-- Footerscript-->
        </div>
    </div>

    <script>
        function del(course_id, university_id) {

            $.ajax({
                type: "POST",
                url: '{{url("/")}}/del_mapcourse',
                data: {
                    'course_id': course_id,
                    'university_id': university_id,
                    '_token': '{{csrf_token()}}'
                },
                success: function(response) {
                    // alert(response);
                    if (response.error == "1") {
                        $.toast({
                            heading: "<i class='fa fa-warning' ></i> " + response.error_msg,
                            position: 'top-right',
                            stack: false
                        })
                        $(".loader").css("display", "none");
                    } else {

                        $.toast({
                            heading: response.success_msg,
                            position: 'top-right',
                            stack: false
                        })

                        window.location.reload();
                    };
                }
            });
        }
    </script>


</body>



</html>