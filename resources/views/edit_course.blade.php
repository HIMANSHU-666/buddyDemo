<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
  <title>Create Route</title>
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
          <div class="row d-flex justify-content-start">
            <div class="col-md-12">
              <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">Update Course</h5>
                </div>
                <div class="card-body">
                  <form method="POST" action="{{ route('course.update', ['id' => $course->id]) }}">


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


                    <input type="hidden" name="id" class="form-control" value="{{ $course->id }}" required />

                    <div class="row mb-3">
                      <div class="col-md-4">
                        <label class="form-label" for="course_name">Course Name</label>
                        <input type="text" class="form-control" id="course_name" name="course_name" value="{{ $course->course_name }}" placeholder="Course Name">
                      </div>

                      <div class="col-md-4">
                        <label class="form-label" for="course_code">Course Code (Reference number)</label>
                        <input type="text" class="form-control" id="course_code" name="course_code" value="{{ $course->course_code }}" placeholder="Course Code">
                      </div>

                      <div class="col-md-4">
                        <label class="form-label" for="course_type">Course Type</label>
                        <select class="form-select" id="course_type" value="{{ $course->course_type }}" name="course_type">
                          <option value="Graduation">Graduation</option>
                          <option value="Post-Graduation">Post-Graduation</option>
                          <option value="After Post-Graduation">After Post-Graduation</option>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <div class="col-md-4">
                        <label class="form-label" for="course_eligibility">Course Eligibility</label>
                        <input type="text" class="form-control" id="course_eligibility" name="course_eligibility" value="{{ $course->course_eligibility }}" placeholder="Course Eligibility">
                      </div>


                      <div class="col-md-4">
                        <label class="form-label" for="course_duration_year">Course Duration Year(Year)</label>
                        <input type="text" class="form-control" id="course_duration_year" name="course_duration_year" value="{{ $course->course_duration_year }}" placeholder="Course Duration Year">
                      </div>
                      <div class="col-md-4">
                        <label class="form-label" for="course_duration_sem">Course Duration Semester(Sem)</label>
                        <input type="text" class="form-control" id="course_duration_sem" name="course_duration_sem" value="{{ $course->course_duration_sem }}" placeholder="Course Duration Semester">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-4">
                        <label class="form-label" for="course_duration_month">Course Duration Month(Months)</label>
                        <input type="text" class="form-control" id="course_duration_month" name="course_duration_month" value="{{ $course->course_duration_month }}" placeholder="Course Duration Month">
                      </div>



                      <div class="col-md-4">
                        <label for="status" class="form-label">Course Status</label>
                        <select class="form-select" id="status" name="status">
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>


        <!-- Footer -->
        <footer class="default-footer">
          @include('includes.footer')
        </footer>
        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
      </div>
      <!-- Content wrapper -->
    </div>
    <!-- Layout page -->
  </div>

  <!-- Overlay and Footer Script -->
  <div class="layout-overlay layout-menu-toggle"></div>
  @include('includes.footer_script')
  <!-- Footerscript -->
</body>

</html>