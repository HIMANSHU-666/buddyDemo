<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
  <title>Course Category</title>
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
            <div class="col-md-8">
              <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">Course Category</h5>
                </div>
                <div class="card-body">
                  <form method="POST" action="{{ url('/') }}/updatecoursecat" id="myform" novalidate enctype="multipart/form-data">
                    @csrf
                    <!--Toast for error-->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                    @endif

                    <!--Toast for success-->
                    @if(session('success'))
                    <div class="alert alert-primary">
                      {{ session('success') }}
                    </div>
                    @endif

                    <div class="row">
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label class="form-label" for="course_category"> Course Category</label>
                          <input type="text" value="{{$catdata->course_category}}" class="form-control" id="course_category" name="course_category" placeholder="Course Category" required>
                          <input type="text" hidden value="{{$catdata->id}}" class="form-control" id="course_category" name="category_id" placeholder="Course Category" required>
                        </div>
                      </div>

                     

                      <div class="col-md-12">
                        <select class="form-select mb-3" aria-label="Default select example" name="course_type">
                          <option selected>Select Course Type</option>
                          @foreach($Typedata as $key => $Courses)
                          @php
                          $key++;
                          @endphp

                          <option value="{{$Courses->id}}">{{$Courses->type}}</option>

                          @endforeach
                        </select>
                      </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
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