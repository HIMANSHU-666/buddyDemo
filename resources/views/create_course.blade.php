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
                  <h5 class="mb-0">Create courses</h5>
                </div>
                <div class="card-body">
                  <form method="POST" action="{{ url('/') }}/add_courses" id="myform" enctype="multipart/form-data" novalidate>
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
                    <div class="row mb-3">
                        
                        
                      <div class="col-md-4 mb-4">
                        <label class="form-label" for="course_type">Course Type</label>
                        <select class="form-select" name="course_type" onchange="get_eligibilty(this.value)" required>
                          <option disabled selected hidden>select course type</option>
                          @foreach($course_type as $key => $Courses)
                          @php
                          $key++;
                          @endphp

                          <option value="{{$Courses->id}}">{{$Courses->type}}</option>

                          @endforeach
                        </select>
                      </div>



                      <div class="col-md-4 mb-4">
                        <label class="form-label" for="course_name">Course Category</label>
                        <select class="form-select" name="course_category" required>
                          <option disabled selected hidden>select course category</option>
                          @foreach($pagedata as $key => $coursecat)
                          <option value="{{ $coursecat->id}}">{{$coursecat->course_category}}</option>
                          @endforeach
                        </select>
                      </div>

                      <div class="col-md-4 mb-4">
                        <label class="form-label" for="course_name">Course Name</label>
                        <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Course Name" required>
                      </div>

                      <div class="col-md-4 mb-4">
                        <label class="form-label" for="course_name">Course Branch</label>
                        <input type="text" class="form-control" id="course_trade" name="course_branch" placeholder="Course Trade (Mechanical,Civil,Electrical,Chemical,Petroleum)" required>
                      </div>


                      <div class="col-md-4 mb-4">
                        <label class="form-label" for="course_duration_year">Course Duration Year(Year)</label>
                        <input type="text" class="form-control" id="course_duration_year" name="course_duration_year" placeholder="Course Duration Year" required>
                      </div>

                      <div class="col-md-4 mb-4">
                        <label class="form-label" for="course_duration_sem">Course Duration Semester(Sem)</label>
                        <input type="text" class="form-control" id="course_duration_sem" name="course_duration_sem" placeholder="Course Duration Semester" required>
                      </div>

                      <div class="col-md-4 mb-4">
                        <label class="form-label" for="course_duration_month">Course Duration Month(Months)</label>
                        <input type="text" class="form-control" id="course_duration_month" name="course_duration_month" placeholder="Course Duration Month" required>
                      </div>

                  
                  
                      <div class="row" id="eligibility"></div>
                      
                      
                      
                          <div class="col-md-12 mb-4">
                        <label class="form-label" for="course_duration_month">Course Summary</label>
                        <textarea type="text-area" rows="4" class="form-control" id="course_summary" name="course_description" placeholder="Course Summary" required></textarea>
                      </div>
                 </div>
                      <button type="submit" class="btn btn-primary">Save</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>


        <script>
          function get_eligibilty(id) {
            // Get Available Stock
            $.ajax({
              url: "{{url('/')}}/getcourseeli",
              data: {
                "id": id,
                _token: '{{csrf_token()}}'
              },
              type: 'post',
              cache: false,
              success: function(response) {

                var x = response;
                let eligi = x.course_eligibility;

                const myArray = eligi.split(",");

                var count = myArray.length;
                var content = "";
                if (count != 0) {
                  var i = 0;
                  for (i = 0; i < count; i++) {

                    var mid = i + 1;

                    content += '<div class="col-md-4 mb-4"><label class="form-label" for="course_eligibility">Course Eligibility <b>' + mid + '</b></label> <input type="text" readonly class="form-control" value="' + myArray[i] + '" name="course_eligibility[]" placeholder="Course Eligibility" required></div>';
                  }
                }

                $("#eligibility").html(content);
              }
            });
          }
        </script>

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