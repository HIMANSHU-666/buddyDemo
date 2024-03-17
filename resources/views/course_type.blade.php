<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
  <title>Course Type</title>
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
                  <h5 class="mb-0">Course Type</h5>

                </div>
                <div class="card-body">
                  <form method="POST" action="{{ url('/') }}/create_course_type_add" enctype="multipart/form-data" id="myform" novalidate>
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

                    <div class="row d-flex justify-content-start">
                      <div class="col-6">
                        <div class="m-3">
                          <label class="form-label" for="course_type">Course Type</label>
                          <input type="text" class="form-control" id="course_type" name="course_type" placeholder="Course Type" required>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="m-3">
                          <label class="form-label" for="category-logo">Course Type Icon<span class="text-danger"> *</span></label>
                          <input type="file" class="form-control" name="ct_icon" required>
                        </div>
                      </div>
                    </div>

                    <div class="list_wrapper mb-3">
                      <div class="row ">
                        <div class="col-6">
                          <div class="m-3 form-group">
                            <label class="form-label" for="course_eligibility">Course Eligibility</label>
                            <input type="text" class="form-control" id="course_eligibility" name="course_eligibility[]" placeholder="Course Eligibility" required>
                          </div>
                        </div>

                        <div class="col-6">
                          <div class=" m-3 form-group">
                            <label class="form-label">Add More</label>
                            <button type="button" class="list_add_button btn btn btn-success"> <i class="fa fa-plus"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="container">
          <div class="card">
            <h5 class="card-header">Display Course</h5>
            <div class="card-body">
              <div class="table-responsive text-nowrap">

                <table class="table" data-toggle="table" data-toolbar="#toolbar" data-search="true" data-show-refresh="true" data-show-toggle="true" data-show-fullscreen="false" data-show-columns="true" data-show-columns-toggle-all="true" data-detail-view="false" data-show-export="true" data-click-to-select="true" data-detail-formatter="detailFormatter" data-minimum-count-columns="2" data-show-pagination-switch="true" data-pagination="true" data-id-field="id" data-page-list="[10, 25, 50, 100, all]" data-show-footer="true" data-side-pagination="server" data-response-handler="responseHandler">
                  <thead>
                    <tr>
                      <th>Course Id</th>
                      <th>Course Type</th>
                      <th>Course Eligibility</th>
                      <th>Course Type Icon</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($pagedata as $key => $coursetype)
                    @php
                    $key++;
                    @endphp
                    <tr>
                      <td>{{$key}}</td>
                      <td>{{$coursetype->type}}</td>
                      <td>{{$coursetype->course_eligibility}}</td>
                      <!--for image-->
                      <td>
                        @if($coursetype->ctype_icon!=NULL)
                        <a href="{{ asset('uploads/course_type_icon/'.$coursetype->ctype_icon)}}" target="blank">
                          <img class="table_img" src="{{ asset('uploads/course_type_icon/' .$coursetype->ctype_icon)}}" width="40">
                        </a>
                        @endif
                      </td>
                      <!--delete button-->
                      <td>
                        <button type="button" class="btn btn-danger" onclick="deleterecord(`{{$coursetype->id}}`,`course_type`)"><i class="fa fa-trash"></i></button>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
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
  <script>
    $(document).ready(function() {
      var x = 0; //Initial field counter
      var list_maxField = 15; //Input fields increment limitation
      $('.list_add_button').click(function() {
        if (x < list_maxField) {
          x++; //Increment field counter
          var list_fieldHTML = ' <div class="row "><div class="col-6"><div class="m-3 form-group"><label class="form-label" for="course_eligibility">Course Eligibility</label><input type="text" class="form-control" id="course_eligibility" name="course_eligibility[]" placeholder="Course Eligibility" required></div></div> <div class="col-1"> <div class=" m-3  form-group">  <label class="form-label" >Remove</label>  <button type="button" class="list_remove_button  btn btn btn-danger"> <i class="fa fa-minus"></i></button>  </div> </div> </div>';
          $('.list_wrapper').append(list_fieldHTML); //Add field html
        }
      });
      //Once remove button is clicked
      $('.list_wrapper').on('click', '.list_remove_button', function() {
        $(this).closest('.row').remove(); //Remove field html
        x--; //Decrement field counter
      });
    });
  </script>




  <!-- Footerscript -->
</body>

</html>