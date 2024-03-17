<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Applications</title>
    <meta name="description" content="" />
    <style>
        #email_box {
            font-size: 200px !important;
        }
    </style>

    <!-- Headerscript -->
    @include('includes.header_script')

    <!-- Add DataTables CSS -->

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



                            <!-- Modal -->

                            <div class="table-responsive text-nowrap">

                                <table class="table" data-toggle="table" data-toolbar="#toolbar" data-search="true" data-show-refresh="true" data-show-toggle="true" data-show-fullscreen="false" data-show-columns="true" data-show-columns-toggle-all="true" data-detail-view="false" data-show-export="true" data-click-to-select="true" data-detail-formatter="detailFormatter" data-minimum-count-columns="2" data-show-pagination-switch="true" data-pagination="true" data-id-field="id" data-page-list="[10, 25, 50, 100, all]" data-show-footer="true" data-side-pagination="server" data-response-handler="responseHandler">
                                    <thead>
                                        <tr>
                                            <th>Agent</th>
                                            <th>Student <br> Name</th>
                                            <th>University <br> Name</th>
                                            <th>Course <br> Name </th>
                                            <th>Annual <br> Price</th>
                                            <th>Application <br> Price</th>
                                            <th>Status</th>
                                            <th>PDF</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pagedata as $key => $application_data)
                                        @php
                                        $key++;
                                        @endphp

                                        <tr>
                                            <td>
                                                @if($application_data->agent_id == 0)
                                                N/A
                                                @else
                                                <div class="btn btn-success btn-xs">Agent</div>
                                                @endif

                                            </td>
                                            <td>{{$application_data -> stu_name}}</td>
                                            <td>{{$application_data -> uni_name}}</td>
                                            <td>{{$application_data -> course_name}}</td>
                                            <td>{{$application_data -> anl_fee}}</td>
                                            <td>{{$application_data -> reg_fees}}</td>

                                            <td>



                                                @if($application_data -> app_status==0)
                                                <select id="{{'status'.$application_data->app_id}}" class="form-select" onchange="sendData({{$application_data -> app_id}})" name="status" aria-label="Default select example">
                                                    <option selected value="0">Pending</option>
                                                    <option value="1">Application Verification</option>
                                                    <option value="2">Pay Registeration Fee</option>
                                                    <option value="3">Document Verification</option>
                                                    <option value="4">Get Offer Letter</option>
                                                    <option value="5">Pay Program Fee</option>
                                                    <option value="6">Admission letter</option>
                                                </select>

                                                @elseif($application_data -> app_status==1)
                                                <select id="{{'status'.$application_data->app_id}}" class="form-select" onchange="sendData({{$application_data -> app_id}})" name="status" aria-label="Default select example">
                                                    <option selected value="0">Pending</option>
                                                    <option selected value="1">Application Verification</option>
                                                    <option value="2">Pay Registeration Fee</option>
                                                    <option value="3">Document Verification</option>
                                                    <option value="4">Get Offer Letter </option>
                                                    <option value="5">Pay Program Fee</option>
                                                    <option value="6">Admission Letter</option>
                                                </select>

                                                @elseif($application_data -> app_status==2)
                                                <select id="{{'status'.$application_data->app_id}}" class="form-select" onchange="sendData({{$application_data -> app_id}})" name="status" aria-label="Default select example">
                                                    <option selected value="0">Pending</option>
                                                    <option value="1">Application Verification</option>
                                                    <option selected value="2">Pay Registeration Fee</option>
                                                    <option value="3">Document Verification</option>
                                                    <option value="4">Get Offer Letter</option>
                                                    <option value="5">Pay Program Fee</option>
                                                    <option value="6">Admission letter</option>
                                                </select>

                                                @elseif($application_data -> app_status==3)
                                                <select id="{{'status'.$application_data->app_id}}" class="form-select" onchange="sendData({{$application_data -> app_id}})" name="status" aria-label="Default select example">
                                                    <option selected value="0">Pending</option>
                                                    <option value="1">Application Verification</option>
                                                    <option value="2">Pay Registeration Fee</option>
                                                    <option selected value="3">Document Verification</option>
                                                    <option value="4">Get Offer Letter</option>
                                                    <option value="5">Pay Program Fee</option>
                                                    <option value="6">Admission letter</option>
                                                </select>

                                                @elseif($application_data -> app_status==4)
                                                <select id="{{'status'.$application_data->app_id}}" class="form-select" onchange="sendData({{$application_data -> app_id}})" name="status" aria-label="Default select example">
                                                    <option selected value="0">Pending</option>
                                                    <option value="1">Application Verification</option>
                                                    <option value="2">Pay Registeration Fee</option>
                                                    <option value="3">Document Verification</option>
                                                    <option selected value="4">Get Offer Letter</option>
                                                    <option value="5">Pay Program Fee</option>
                                                    <option value="6">Admission letter</option>
                                                </select>

                                                @elseif($application_data -> app_status==5)
                                                <select id="{{'status'.$application_data->app_id}}" class="form-select" onchange="sendData({{$application_data -> app_id}})" name="status" aria-label="Default select example">
                                                    <option selected value="0">Pending</option>
                                                    <option value="1">Application Verification</option>
                                                    <option value="2">Pay Registeration Fee</option>
                                                    <option value="3">Document Verification</option>
                                                    <option value="4">Get Offer Letter</option>
                                                    <option selected value="5">Pay Program Fee</option>
                                                    <option value="6">Admission letter</option>
                                                </select>

                                                @else
                                                <select id="{{'status'.$application_data->app_id}}" class="form-select" onchange="sendData({{$application_data -> app_id}})" name="status" aria-label="Default select example">
                                                    <option selected value="0">Pending</option>
                                                    <option value="1">Application Verification</option>
                                                    <option value="2">Pay Registeration Fee</option>
                                                    <option value="3">Document Verification</option>
                                                    <option value="5">Get Offer Letter</option>
                                                    <option value="4">Pay Program Fee</option>
                                                    <option selected value="6">Admission letter</option>
                                                </select>

                                                @endif

                                            </td>
                                            <td>
                                                <form action="{{ url('/') }}/doc_pdf" method="post">
                                                    @csrf
                                                    <input type="text" hidden name="stu_id" value="{{$application_data->stu_id}}" id="">
                                                    <input type="text" hidden name="course_id" value="{{$application_data->course_id}}" id="">
                                                    <input type="text" hidden name="uni_id" value="{{$application_data->uni_id}}" id="">
                                                    <button type="submit" class="btn btn-dark btn-sm">PDF</button>
                                                </form>
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
        <!-- Footerscript -->
        <div class="modal fade" id="email_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card rounded-3 border shadow p-3 mb-3">
                                    <div class="d-flex gap-3 align-items-center">
                                        <img src="https://bringyourbuddy.in/admin/public/uploads/university_logo/dummy_logo.png" class="rounded-3 mt-3" style="width: 80px !important;" alt="University-logo" />
                                        <div>
                                            <div class="fs-4 text-danger text-decoration-underline" id="univ_name"></div>
                                            <!-- <div class="text-secondary" style="font-size: 12px !important;">Windsor, Ontario, CA</div> -->
                                        </div>
                                    </div>
                                    <h4 id="stu_name" class="text-primary my-2">BCA</h4>
                                    <div class="fs-6 mt-2">Eligibilty : <span id="elig"></span>A-Level</div>
                                    <h4 id="crs_name" class="text-dark  mb-0 text-decoration-underline ">BCA</h4>
                                    <hr class="my-2">

                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="fw-bold">Duration</div>
                                        <div><span id="dur_month"></span> Months / <span id="dur_sem"></span> Sem / <span id="dur_year"></span> Year</div>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="fw-bold">Annual Fee</div>
                                        <div>$ <span id="annul_fee"></span></div>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="fw-bold">Annual Fee</div>
                                        <div>$ <span id="reg_fees"></span></div>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="fw-bold">Application Status</div>
                                        <div class="btn btn-warning btn-xs">In-Progress</div>
                                    </div>
                                </div>
                                <form action="{{url('ol_gen_mail')}}" method="post">
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
                                    <!-- <button type="button" onclick="sendemail()" class="btn btn-primary w-100 mt-2">Send Email</button> -->
                                    <div id="form_field">

                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 mt-2">Send Email</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add DataTables JavaScript -->
        </div>
        <div class="modal fade" id="stu_con_email_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <h5 class="text-center text-dark">Send Confirmation Mail to Student</h5>

                                <form action="{{url('stu_con_mail')}}" method="post">
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
                                    <!-- <button type="button" onclick="sendemail()" class="btn btn-primary w-100 mt-2">Send Email</button> -->
                                    <div id="stu_con_field">

                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 mt-2">Send Email</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add DataTables JavaScript -->
        </div>
        <div class="modal fade" id="commission" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="h-100 gradient-custom">
                            <div class="container">
                                <div class="row d-flex justify-content-center my-4">
                                    <div class="col-md-7">
                                        <div class="card border">
                                            <div class="card-header py-2">
                                                <h5 class="mb-0">Partner Commission</h5>
                                            </div>
                                            <div class="card-body">

                                                <div class="d-flex justify-content-between">
                                                    <div class="fw-bold">Agent</div>
                                                    <div class="" id="agent_name"></div>
                                                </div>
                                                <hr>

                                                <div class="d-flex justify-content-between">
                                                    <div class=" fw-bold">Agent Type</div>
                                                    <div class="btn btn-success btn-xs">Agent</div>
                                                </div>
                                                <hr>

                                                <div class="d-flex justify-content-between">
                                                    <div class=" fw-bold">University</div>
                                                    <div id="agent_uniname"></div>
                                                </div>
                                                <hr>

                                                <div class="d-flex justify-content-between">
                                                    <div class=" fw-bold">Student</div>
                                                    <div id="agent_stuname"></div>
                                                </div>
                                                <hr>

                                                <div class="d-flex justify-content-between">
                                                    <div class=" fw-bold">Program</div>
                                                    <div id="agent_programname"></div>
                                                </div>
                                                <hr>

                                                <div class="d-flex justify-content-between">
                                                    <div class=" fw-bold">Total Fee</div>
                                                    <div id="agent_anualfee"></div>
                                                </div>


                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-5">
                                        <form action="{{url('generate_commission')}}" method="post">
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

                                            <script>
                                                toastMixin.fire({
                                                    animation: true,
                                                    title: 'Commission Generated Successfully'
                                                });
                                            </script>
                                            @endif


                                            <div class="card border mb-4">
                                                <div class="card-header py-2">
                                                    <h5 class="mb-0">Calculate Commission </h5>
                                                </div>
                                                <div class="card-body">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                                            Total Fee amount
                                                            <span id="agent_totalfee"></span>
                                                        </li>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                                            Commission (%)
                                                            <span id="agent_compercentage"></span>
                                                        </li>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                                            <div>
                                                                <strong>Total Commission</strong>
                                                            </div>
                                                            <span><strong id="agent_totalcommission"></strong></span>
                                                        </li>
                                                    </ul>
                                                    <div id="commission_field">

                                                    </div>
                                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                                        Generate Commission
                                                    </button>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="Subcommission" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="h-100 gradient-custom">
                            <div class="container">
                                <div class="row  justify-content-center">
                                    <div class="col-md-8">
                                        <div class="card border shadow">
                                            <div class="card-header py-3 mb-2 bg-primary">
                                                <h5 class="mb-0 text-white">Partner Commission</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-md-7">
                                                        <div class="d-flex justify-content-between">
                                                            <div class=" fw-bold">Partner Type</div>
                                                            <div class="btn btn-dark btn-xs">Sub-Partner</div>
                                                        </div>
                                                        <hr>
                                                        <div class="d-flex justify-content-between">
                                                            <div class="fw-bold">Sub-Partner</div>
                                                            <div class="" id="subagent_name">Muskan</div>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="card border shadow mb-4 ">
                                                            <div class="card-header bg-primary py-1">
                                                                <div class="text-white text-center">#Partner</div>
                                                            </div>
                                                            <div class="card-body text-center">
                                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar" class="rounded-circle img-fluid" style="width: 80px;">
                                                                <h5 class="my-2">Himanshu</h5>
                                                                <div class="d-flex gap-1 align-items-center justify-content-center">
                                                                    <div class="text-center mb-1" style="font-size: 13px;">h1324.mcl@gmail.com</div>
                                                                    <div class="text-center mb-1" style="font-size: 13px;">#21</div>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <div class=" fw-bold">University</div>
                                                    <div class="" id="subagent_uniname">SVIET</div>
                                                </div>
                                                <hr>
                                                <div class="d-flex justify-content-between">
                                                    <div class=" fw-bold">Student</div>
                                                    <div class="" id="subagent_stuname">Himanshu</div>
                                                </div>
                                                <hr>

                                                <div class="d-flex justify-content-between">
                                                    <div class=" fw-bold">Program</div>
                                                    <div class="" id="subagent_programname">Bachelor Of Computer Application</div>
                                                </div>
                                                <hr>

                                                <div class="d-flex justify-content-between">
                                                    <div class=" fw-bold">Total Fee</div>
                                                    <div class="" id="subagent_anualfee">$40000</div>
                                                </div>


                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <form action="{{url('generate_commission')}}" method="post">
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

                                            <script>
                                                toastMixin.fire({
                                                    animation: true,
                                                    title: 'Commission Generated Successfully'
                                                });
                                            </script>
                                            @endif


                                            <div class="card border mb-4">
                                                <div class="card-header py-3 bg-primary mb-3">
                                                    <h5 class="mb-0 text-white">Calculate Commission </h5>
                                                </div>
                                                <div class="card-body">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                                            Total Fee amount
                                                            <span id="subagent_totalfee">$40000.00</span>
                                                        </li>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                                            Commission (%)
                                                            <span id="subagent_compercentage">5%</span>
                                                        </li>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                                            <div>
                                                                <strong>Total Commission</strong>
                                                            </div>
                                                            <span><strong id="subagent_totalcommission">$400.00</strong></span>
                                                        </li>
                                                        <hr class="m-0">
                                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                                            <div>
                                                                Partner Commission (20%)
                                                            </div>
                                                            <span id="partner_commission">$400.00</span>
                                                        </li>
                                                        <hr class="m-0">
                                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                                            <div>
                                                                Sub-Partner Commission (80%)
                                                            </div>
                                                            <span id="subagent_finalcom">$1600.00</span>
                                                        </li>
                                                    </ul>
                                                    <div id="subcommission_field">

                                                    </div>
                                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                                        Generate Commission
                                                    </button>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script>
        function sendData(type_id) {
            $.ajax({
                type: "POST",
                url: '{{url("/")}}/application_status',
                data: {
                    'app_id': type_id,
                    'status': $('#status' + type_id).val(),
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
                        if (response.status == '1') {
                            $("#univ_name").text(response.data.uni_name);
                            $("#stu_name").text(response.data.stu_name);
                            $("#crs_name").text(response.data.course_name);
                            $("#dur_month").text(response.data.dur_month);
                            $("#dur_sem").text(response.data.dur_sem);
                            $("#dur_year").text(response.data.dur_year);
                            $("#annul_fee").text(response.data.anl_fee);
                            $("#reg_fees").text(response.data.reg_fees);
                            var $frm_field = $('#form_field');
                            $frm_field.html('');
                            $frm_field.append('<input hidden type="text" value="' + response.data.uni_name + '" name="uni_name"><input hidden type="text" value="' + response.data.dur_sem + '" name="dur_sem"><input hidden type="text" value="' + response.data.dur_year + '" name="dur_year"><input hidden type="text" value="' + response.data.stu_name + '" name="stu_name"><input hidden type="text" value="' + response.data.stu_id + '" name="stu_id"><input hidden type="text" value="' + response.data.course_name + '" name="course_name"><input hidden type="text" value="' + response.data.course_id + '" name="course_id"><input hidden type="text" value="' + response.data.uni_id + '" name="uni_id">');

                            $('#email_modal').modal('show');
                        }
                        if (response.status == "5") {
                            var $frm_field = $('#stu_con_field');
                            $frm_field.html('');
                            $frm_field.append('<input hidden type="text" value="' + response.data.uni_name + '" name="uni_name"><input hidden type="text" value="' + response.data.stu_name + '" name="stu_name"><input hidden type="text" value="' + response.data.course_name + '" name="crs_name">');
                            $('#stu_con_email_modal').modal('show');
                        }

                        if (response.status == "6") {

                            if (response.agent == null) {
                                $('#stu_con_email_modal').modal('show');
                            } else {
                                if (response.agent.agent_type == 1) {
                                    $("#agent_name").text(response.agent.first_name);
                                    $("#agent_uniname").text(response.data.uni_name);
                                    $("#agent_stuname").text(response.data.stu_name);
                                    $("#agent_programname").text(response.data.course_name);
                                    $("#agent_anualfee").text(`$${response.data.anl_fee}`);
                                    $("#agent_totalfee").text(`$${response.data.anl_fee}`);

                                    let total = response.data.anl_fee;
                                    let percentage = response.agent.commission_percentage;
                                    let final_commission = (total/100)*percentage;

                                    $("#agent_totalcommission").text(`$${final_commission}`);
                                    $("#agent_compercentage").text(`${response.agent.commission_percentage}%`);
                                    var $frm_field = $('#commission_field');
                                    $frm_field.html('');
                                    $frm_field.append('<input hidden type="text" value="' + response.data.agent_id + '" name="agent_id"><input hidden type="text" value="' + response.data.uni_id + '" name="uni_id"><input hidden type="text" value="' + response.data.stu_id + '" name="stu_id"><input hidden type="text" value="' + response.data.course_id + '" name="course_id"><input hidden type="text" value="' + total + '" name="paid_amount"><input hidden type="text" value="' + final_commission + '" name="final_commission">');
                                    $('#commission').modal('show');

                                } else {
                                    

                                    $("#subagent_name").text(response.agent.first_name);
                                    $("#subagent_uniname").text(response.data.uni_name);
                                    $("#subagent_stuname").text(response.data.stu_name);
                                    $("#subagent_programname").text(response.data.course_name);
                                    $("#subagent_anualfee").text(`$${response.data.anl_fee}`);
                                    $("#subagent_totalfee").text(`$${response.data.anl_fee}`);

                                    let total = response.data.anl_fee;
                                    let percentage = response.agent.commission_percentage;
                                    let commission = (total/100)*percentage;

                                    $("#subagent_totalcommission").text(`$${commission}`);

                                    let partner_commission = (commission/100)*20;
                                    $("#subagent_compercentage").text(`${response.agent.commission_percentage}%`);
                                    $("#partner_commission").text(`$${partner_commission}`);

                                    let final_commission = (commission/100)*80;
                                    $("#subagent_finalcom").text(`$${final_commission}`);

                                    var $frm_field = $('#subcommission_field');
                                    $frm_field.html('');
                                    $frm_field.append('<input hidden type="text" value="' + response.data.agent_id + '" name="agent_id"><input hidden type="text" value="' + response.data.uni_id + '" name="uni_id"><input hidden type="text" value="' + response.data.stu_id + '" name="stu_id"><input hidden type="text" value="' + response.data.course_id + '" name="course_id"><input hidden type="text" value="' + response.data.anl_fee + '" name="paid_amount"><input hidden type="text" value="' + final_commission + '" name="final_commission"><input hidden type="text" value="' + partner_commission + '" name="partner_commission">');



                                    $('#Subcommission').modal('show');

                                }



                            }



                        }
                        $.toast({
                            heading: "Status Updated Successfully",
                            position: 'top-right',
                            stack: false,
                            icon: 'success'
                        })


                    };
                }
            });
        }

        function gen_pdf(stu_id, course_id, uni_id) {
            $.ajax({
                type: "POST",
                url: '{{url("/")}}/doc_pdf',
                data: {
                    "stu_id": stu_id,
                    "course_id": course_id,
                    "uni_id": uni_id,
                    "_token": '{{csrf_token()}}'
                },

            });

        }
    </script>
    </div>


</body>

</html>