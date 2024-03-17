<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>



    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>View Partners</title>
    <meta name="description" content="" />
    @include('includes.header_script')


    <script type="text/javascript" src="js/plugins/interface/datatables.min.js"></script>

    <script src="js/jquery.dataTables.min.js"></script>

    <script src="js/dataTables.buttons.min.js"></script>

    <script src="js/dataTables.bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="css/buttons.dataTables.min.css">

</head>

<body>

    <div class="layout-wrapper layout-content-navbar">

        <div class="layout-container">

            @include('includes.sidebar')

            <div class="layout-page">

                @include('includes.header')

                <div class="container mt-3">

                    <div class="card mb-4">

                        <div class="card-header d-flex justify-content-between align-items-center">


                            <!--<h5 class="mb-0">View</h5>-->

                        </div>

                        <div class="container">

                            <div class="card">
                                <h5 class="card-header">View Partners Details</h5>

                                <div class="table-responsive text-nowrap">
                                    <table class="table" data-toggle="table" data-toolbar="#toolbar" data-search="true" data-show-refresh="true" data-show-toggle="true" data-show-fullscreen="false" data-show-columns="true" data-show-columns-toggle-all="true" data-detail-view="false" data-show-export="true" data-click-to-select="true" data-detail-formatter="detailFormatter" data-minimum-count-columns="2" data-show-pagination-switch="true" data-pagination="true" data-id-field="id" data-page-list="[10, 25, 50, 100, all]" data-show-footer="true" data-side-pagination="server" data-response-handler="responseHandler">

                                        <thead>

                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Email</th>
                                                <th>referel</th>
                                                <th>commission (%)</th>
                                                <th>Wallet Amount</th>
                                                <th>switch</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pagedata as $key => $data)
                                            @php
                                            $key++;
                                            @endphp
                                            <tr>
                                                <td>{{$key}}</td>

                                                <td>{{$data->first_name}}</td>
                                                
                                                </td>
                                                <td>{{$data->email}}</td>
                                                <td>{{$data->ref_code}}</td>
                                                <td>
                                                    @if($data->commission_percentage == "")
                                                    N/A
                                                    @else
                                                    {{$data->commission_percentage}}%
                                                    @endif
                                                </td>
                                                <!-- <td><a href="{{ asset('uploads/business_logo/' .$data->business_logo)}}" target="blank"><img class="table_img" src="{{ url('uploads/business_logo/' .$data->business_logo)}}" style="height:50px !important; width:auto; !important"></a></td> -->
                                                <td>${{$data->balance}}</td>
                                                <td>
                                                    @if($data->status == 1)
                                                    <div class="form-check form-switch">
                                                        <input id="status" onchange="update_status({{$data -> id}})" checked class="form-check-input" value="0" type="checkbox" role="switch">
                                                        <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                                    </div>

                                                    @else
                                                    <div class="form-check form-switch">
                                                        <input id="status" onchange="update_status({{$data -> id}})" class="form-check-input" value="0" type="checkbox" role="switch">
                                                        <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                                    </div>

                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{url('viewdetail_agents',$data->id)}}" class="btn btn-primary btn-sm">View detail</a>
                                                    <a href="{{url('editagent',$data->id)}}" class="btn btn-primary btn-sm"><i class=" bx bx-pencil"></i></a>

                                                    <!--<form class="mb-3" action="{{url('/') }}/deleteagent" method="POST" type="button" onsubmit="return confirm('This agent will be delete')">-->
                                                    <!--    @csrf-->
                                                    <!--    <input type="hidden" name="id" class="form-control" value="{{ $data->id }}" />-->
                                                    <!--    <button type="submit" class="btn btn-danger btn-sm"><i class=" bx bx-trash"></i></button>-->
                                                    <!--</form>-->

                                                    <!-- <a href="{{url('edit_agent_data',$data->id)}}" class="btn btn-success btn-sm"><i class="fa-solid fa-pen"></i></a> -->
                                                    <button type="button" class="btn btn-primary btn-sm" onclick='getID({{$data->id}})'><i class="fa-solid fa-eye"></i></button>
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="deleterecord(`{{$data->id}}`,`agents`)"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="view_student" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <!-- <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Student List</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div> -->
                                            <div class="modal-body">
                                                <h2 class="my-2">Student List</h2>
                                                <div class="table-responsive text-nowrap">
                                                    <table class="table" data-toggle="table">

                                                        <thead>

                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Email</th>
                                                                <th>Phone</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="stu_data">
                                                            <tr>

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                        </div> -->
                                        </div>
                                    </div>
                                </div>


                                <div class="modal" id="myModal">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <!-- Modal body -->

                                            <div class="modal-body">
                                                <h5>What do you want?</h5>
                                                <form method="post" action="{{url('/') }}/view_agents">
                                                    @csrf
                                                    <input type="text" name="email" id="email" class="form-control" />
                                                    <div class="form-group mb-3">
                                                        <label class="form-label">status:</label>
                                                        <select class="form-select" name="status">
                                                            <option value="1" @if($data->status==1){{'selected';}}@endif>Active</option>
                                                            <option value="0" @if($data->status==0){{'selected';}}@endif>Inactive</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <button type="submit" class="btn btn-success">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <footer class="default-footer">

                            @include('includes.footer')

                            <div class="content-backdrop fade"></div>

                    </div>

                </div>

            </div>

            <div class="layout-overlay layout-menu-toggle"></div>

            @include('includes.footer_script')

        </div>

    </div>


    <script>
        function update_status(agent_id) {

            var update_val = 0;
            if ($('#status').is(':checked')) {
                update_val = 1;
            }
            $.ajax({
                type: "POST",
                url: '{{url("/")}}/update_agent_status',
                data: {
                    'agent_id': agent_id,
                    'status': update_val,
                    '_token': '{{csrf_token()}}',
                },
                success: function(response) {
                    if (response.error == "1") {
                        $.toast({
                            heading: "<i class='fa fa-warning' ></i> " + response.error_msg,
                            position: 'top-right',
                            stack: false
                        })
                    } else {
                        $.toast({
                            heading: response.success_msg,
                            position: 'top-right',
                            stack: false,
                            icon: 'success'
                        })

                        location.reload();
                    }
                }
            });
        }




        function getID(id) {
            // alert(id);

            $.ajax({
                type: "POST",
                url: '{{url("/")}}/agent_student',
                data: {
                    "agentid": id,
                    "_token": '{{csrf_token()}}'
                },
                success: function(response) {

                    console.log(response.data);

                    var $stu_data = $('#stu_data');
                    $stu_data.html('');

                    response.data.forEach(function(row) {
                        $stu_data.append('<tr><td>' + row.name + '</td><td>' + row.email + '</td><td>' + row.phone_no + '</td><td>' + '<span class="btn btn-success btn-xs">Active</span>' + '<td></tr>' + '<br>');
                    });

                    $('#view_student').modal('show');

                },

            });

        }

        function agentDetail(classid, agent_id) {

            $.ajax({
                type: "POST",
                url: '{{url("/")}}/get_agent_detail',
                data: {
                    "agentid": agent_id,
                    "_token": '{{csrf_token()}}'
                },
                success: function(response) {

                    $('#agent_name' + classid).text(response.data.first_name);
                    $('#agent_phone' + classid).text(response.data.phone_no);
                    $('#agent_email' + classid).text(response.data.email);

                    // var $frm_field = $('#agent_detail');
                    // $frm_field.html('');
                    // $frm_field.append('<tr><th>Agent Name:</th><td>'+ response.data.first_name +''+ response.data.last_name +'</td></tr><tr><th>Agent Phone:</th><td>'+ response.data.phone_no +'</td></tr><tr><th>Agent Email:</th><td>'+ response.data.email +'</td></tr>');
                    
                    $('#collapseExample' + classid).collapse("toggle");
                },

            });


        }
    </script>
</body>



</html>