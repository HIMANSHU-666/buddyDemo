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
                            <h3 class="mb-0">Courses Details</h3>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <form method="POST" action="{{ route('course.view', ['id' => $course->id]) }}">
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
                                                    @if ($course)
                                                        <li class="list-group-item"> <strong>Course Name: </strong> {{ $course->course_name }}</li>
                                                        <li class="list-group-item"> <strong>Course Code: </strong> {{ $course->course_code }}</li>
                                                        <li class="list-group-item"> <strong>Course Type: </strong> {{ $course->course_type }}</li>
                                                        <li class="list-group-item"> <strong>Course Eligibility: </strong> {{ $course->course_eligibility }}</li>
                                                        <li class="list-group-item"> <strong>Course Duration Year: </strong> {{ $course->course_duration_year }}</li>
                                                        <li class="list-group-item"> <strong>Course Duration Sem:  </strong>{{ $course->course_duration_sem }}</li>
                                                        <li class="list-group-item"> <strong>Course Duration Month:  </strong>{{ $course->course_duration_month }}</li>
                                                    @else
                                                        <li class="list-group-item">Course not found.</li>
                                                    @endif
                                                
                                                </ul>
                                            </div>       
                                        </div>
                                    </div>
                                    <!-- University Details -->
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
