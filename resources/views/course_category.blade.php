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
                  <form method="POST" action="{{ url('/') }}/create_course_category" id="myform" novalidate enctype="multipart/form-data">
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
                          <label class="form-label" for="course_category">Course Category</label>
                          <input type="text" class="form-control" id="course_category" name="course_category" placeholder="Course Category" required>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="mb-3">
                          <label class="form-label" for="category-logo">Category Logo<span class="text-danger"> *</span></label>
                          <input type="file" class="form-control" name="catlogo" required>
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

        <div class="container">
          <div class="card">
            <h5 class="card-header">Display Course</h5>
            <div class="card-body">
              <div class="table-responsive text-nowrap">

                <table class="table" data-toggle="table" data-toolbar="#toolbar" data-search="true" data-show-refresh="true" data-show-toggle="true" data-show-fullscreen="false" data-show-columns="true" data-show-columns-toggle-all="true" data-detail-view="false" data-show-export="true" data-click-to-select="true" data-detail-formatter="detailFormatter" data-minimum-count-columns="2" data-show-pagination-switch="true" data-pagination="true" data-id-field="id" data-page-list="[10, 25, 50, 100, all]" data-show-footer="true" data-side-pagination="server" data-response-handler="responseHandler">
                  <thead>
                    <tr>
                      <th>Course Id</th>
                      <th>Course Category</th>
                      <th>Category Logo</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($pagedata as $key => $coursecategory)
                    @php
                    $key++;
                    @endphp
                    <tr>
                      <td>{{$key}}</td>
                      <td>{{$coursecategory->course_category}}</td>
                      <!--for image-->
                      <td>
                        @if($coursecategory->cate_logo!=NULL)
                        <a href="{{ asset('uploads/ctgr_logo/'.$coursecategory->cate_logo)}}" target="blank">
                          <img class="table_img" src="{{ asset('uploads/ctgr_logo/' .$coursecategory->cate_logo)}}" width="40">
                        </a>
                        @endif
                      </td>
                      <!--delete button-->
                      <td>
                      <a href="{{url('edit_course_category',$coursecategory->id)}}" class="btn btn-success btn-sm"><i class=" bx bx-pencil"></i></a>
                        <button type="button" class="btn btn-danger btn-sm" onclick="deleterecord(`{{$coursecategory->id}}`,`course_category`)"><i class="fa fa-trash"></i></button>
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
          var list_fieldHTML = ' <div class="row "><div class="col-6"><div class="m-3 form-group"><label class="form-label" for="course_eligibility">Course Eligibility</label><input type="text" class="form-control" id="course_eligibility" name="course_eligibility[]" placeholder="Course Eligibility"></div></div> <div class="col-1"> <div class=" m-3  form-group">  <label class="form-label" >Remove</label>  <button type="button" class="list_remove_button  btn btn btn-danger"> <i class="fa fa-minus"></i></button>  </div> </div> </div>';
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