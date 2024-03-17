<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <title>University Details</title>

    <meta name="description" content="">



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

                            <h3 class="mb-0">University Details</h3>

                        </div>

                        <div class="card-body">

                            <div class="container">

                                <form method="POST" action="{{ route('university.view', ['id' => $university->id]) }}">

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



                                    <!-- University Details -->

                                    <div class="container mt-3">

                                        <div class="card mb-4">

                                            <div class="card-header d-flex justify-content-between align-items-center">

                                                <h3 class="mb-0">University Information</h3>

                                            </div>

                                            <div class="card-body">

                                                <ul class="list-group">

                                                    @if ($university)
                                                    <li class="list-group-item"> <strong>University Rank: </strong> {{ $university->uni_rank }}</li>

                                                    <li class="list-group-item"> <strong>Unique Code: </strong> {{ $university->uni_code }}</li>

                                                    <li class="list-group-item"> <strong>Choosed Option: </strong> {{ $university->center_type }}</li>

                                                    <li class="list-group-item"> <strong>Selected Type:  </strong>{{ $university->uni_clg_type }}</li>

                                                    <li class="list-group-item"> <strong>Name: </strong> {{ $university->uni_name }}</li>

                                                    <li class="list-group-item"> <strong>Country: </strong> {{ $university->source_country }}</li>

                                                    <li class="list-group-item"> <strong>State:  </strong>{{ $university->state }}</li>

                                                    <li class="list-group-item"> <strong>Distt:  </strong>{{ $university->distt }}</li>

                                                    <li class="list-group-item"> <strong>City:  </strong>{{ $university->city }}</li>

                                                    <li class="list-group-item"> <strong>Near By:  </strong>{{ $university->near_by }}</li>


                                                     

                                                   <li class="list-group-item"> <strong>Established Year: </strong> {{ $university->est_year }}</li>

                                                    <li class="list-group-item"> <strong>Website: </strong> {{ $university->uni_website }}</li>

                                                    <li class="list-group-item"> <strong>Email:  </strong>{{ $university->uni_email }}</li>

                                                    <li class="list-group-item"> <strong>Phone:  </strong>{{ $university->uni_phone }}</li>

                                                    <li class="list-group-item"> <strong>Description: </strong> {{ $university->uni_desc }}</li>

                                                       

                                                    @else

                                                        <li class="list-group-item">University not found.</li>

                                                    @endif

                                                </ul>

                                            </div>

                                        </div>

                                    </div>

                                    <!-- University Details -->



                                    <!-- Certificates Section -->

                                    <div class="container mt-3">

                                        <div class="card mb-4">

                                            <div class="card-header d-flex justify-content-between align-items-center">

                                                <h3 class="mb-0">Certificates</h3>

                                            </div>

                                            <div class="card-body">

                                                <ul class="list-group">

                                                    @if ($university && $university->certificates)

                                                        @foreach ($university->certificates as $certificate)

                                                            <li class="list-group-item">

                                                                <strong>Certificate Name:</strong> {{ $certificate->certi_name }}<br>

                                                                <strong>Certificate URL:</strong> <a href="{{ $certificate->certi_url }}" target="_blank">{{ $certificate->certi_url }}</a>

                                                            </li>

                                                        @endforeach

                                                    @else

                                                        <li class="list-group-item">No certificates found.</li>

                                                    @endif

                                                </ul>

                                            </div>

                                        </div>

                                    </div>

                                    <!-- Certificates Section -->



                                </form>

                                <script src="{{ asset('js/status.js') }}"></script>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- Footer -->

                <footer class="default-footer">

                    @include('includes.footer')

                    <!-- Footer -->

                </footer>

                <!-- Content wrapper -->

            </div>

            <!-- Layout page -->

        </div>

    </div>

    <!-- Overlay -->

    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Layout wrapper -->

    @include('includes.footer_script')

    <!-- Footerscript -->

</body>

</html>

