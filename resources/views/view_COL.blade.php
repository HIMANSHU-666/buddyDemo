<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>



    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>View Offer Letter</title>
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
                                <h5 class="card-header">View Offer Letters</h5>

                                <div class="table-responsive text-nowrap">
                                    <table class="table" data-toggle="table" data-toolbar="#toolbar" data-search="true" data-show-refresh="true" data-show-toggle="true" data-show-fullscreen="false" data-show-columns="true" data-show-columns-toggle-all="true" data-detail-view="false" data-show-export="true" data-click-to-select="true" data-detail-formatter="detailFormatter" data-minimum-count-columns="2" data-show-pagination-switch="true" data-pagination="true" data-id-field="id" data-page-list="[10, 25, 50, 100, all]" data-show-footer="true" data-side-pagination="server" data-response-handler="responseHandler">

                                        <thead>

                                           
                                                <th>Ref</th>
                                                <th>student</th>
                                                <th>scholarship(%)</th>
                                                <th>course</th>
                                                <th>Reg_fee</th>
                                                <th>Hostel/mess fee</th>
                                                <th>annual tution fee</th>
                                                <th>tution fee with scholarship</th>
                                                <th>action</th>
                                           
                                        </thead>
                                        <tbody>
                                        @foreach($pagedata as $key => $data)
                                            @php
                                            $key++;
                                            @endphp
                                            <tr>
                                            <td>{{$data->ref_no}}</td>
                                            <td>{{$data->stu_name}}</td>
                                            <td>{{$data->scholarship_prcentage}}</td>
                                            <td>{{$data->course_name}}</td>
                                            <td>{{$data->registeration_fee}}</td>
                                            <td>{{$data->hos_mess_fee}}</td>
                                            <td>{{$data->annual_tution_fee}}</td>
                                            <td>{{$data->tution_fee_scholarship}}</td>
                                            <td><button class="btn btn-dark btn-sm" >Print</button></td>
                                            </tr>

                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <!-- Modal -->
                               


                               
                            </div>

                        </div>

                        <footer class="default-footer">

                            @include('includes.footer')

                            <div class="content-backdrop fade"></div>
                        </footer>

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