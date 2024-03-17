<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>

    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Agent Detail</title>

    <meta name="description" content="" />

    @include('includes.header_script')

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

                            <h5 class="mb-0">View detail</h5>

                        </div>

                        <div class="card-body">

                            <div class="row">

                                <div class="col-sm-6">

                                    <h6>First Name: </h6>

                                </div>

                                <div class="col-sm-6">

                                    <p>{{$pagedata->first_name}}</p>

                                </div>

                                <div class="col-sm-6">

                                    <h6> Last Name: </h6>

                                </div>

                                <div class="col-sm-6">

                                    <p>{{$pagedata->last_name}}</p>

                                </div>

                                <div class="col-sm-6">

                                    <h6>Email: </h6>

                                </div>

                                <div class="col-sm-6">

                                    <p>{{$pagedata->email}}</p>

                                </div>

                                <div class="col-sm-6">

                                    <h6> Phone Number: </h6>

                                </div>

                                <div class="col-sm-6">

                                    <p>{{$pagedata->phone_no}}</p>

                                </div>

                                <div class="col-sm-6">

                                    <h6> Commission (%): </h6>

                                </div>

                                <div class="col-sm-6">

                                    <p>{{$pagedata->commission_percentage}}</p>

                                </div>

                                <div class="col-sm-6">

                                    <h6> Contact Method: </h6>

                                </div>

                                <div class="col-sm-6">

                                    <p>{{$pagedata->contact_method}}</p>

                                </div>

                                <div class="col-sm-6">

                                    <h6> How did you find out about applyboard?: </h6>

                                </div>

                                <div class="col-sm-6">

                                    <p>{{$pagedata->find_out}}</p>

                                </div>

                                <div class="col-sm-6">

                                    <h6> year start recruiting students: </h6>

                                </div>

                                <div class="col-sm-6">

                                    <p>{{$pagedata->recruiting_year}}</p>

                                </div>

                                <div class="col-sm-6">

                                    <h6> Who referred you: </h6>

                                </div>

                                <div class="col-sm-6">

                                    <p>{{$pagedata->reference}}</p>

                                </div>

                                <div class="col-sm-6">

                                    <h6> main source country of your students:</h6>

                                </div>

                                <div class="col-sm-6">

                                    <p>{{$pagedata->source_country}}</p>

                                </div>

                                <div class="col-sm-6">

                                    <h6> services you provide to your clients: </h6>

                                </div>

                                <div class="col-sm-6">

                                    <p>{{$pagedata->services}}</p>

                                </div>

                                <div class="col-sm-6">

                                    <h6> Business Logo: </h6>

                                </div>

                                <div class="col-sm-6">

                                    <p><a href="{{ asset('uploads/business_logo/' .$pagedata->business_logo)}}" target="blank"><img class="table_img" src="{{ asset('uploads/business_logo/' .$pagedata->business_logo)}}" style="width:20%; height:20%;"></a></p>

                                </div>

                                <div class="col-sm-6">

                                    <h6> Business Certificate: </h6>

                                </div>

                                <div class="col-sm-6">

                                    <p><a href="{{ asset('uploads/business_certificate/' .$pagedata->business_certificate)}}" target="blank"><img class="table_img" src="{{ asset('uploads/business_certificate/' .$pagedata->business_certificate)}}" style="width:20%; height:20%;"></a></p>

                                </div>

                                <div class="col-sm-6">

                                    <h6> Status: </h6>

                                </div>

                                <div class="col-sm-6">

                                    <p>@if($pagedata->status==1)<span class="btn btn-success btn-xs">Active</span>@else <span class="btn btn-warning btn-xs">Inactive</span>@endif</p>

                                </div>
                                

                            </div>

                        </div>

                        <div class="card-footer">

                            <a href="{{url('view_agents')}}" class="btn btn-primary btn-md">Back</a>

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

</body>
<script>

</script>

</html>