<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Admin access</title>
  <meta name="description" content="" />

  <!-- Headerscript -->
  @include('includes.header_script')

  <!-- Add DataTables CSS -->

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
              <h5 class="mb-0">View</h5>
              <!-- <small class="text-muted float-end">Add Access Data</small> -->
            </div>

            <div class="container">
              <div class="card">
                <h5 class="card-header">Display Course</h5>
                <div class="table-responsive text-nowrap">

                  <table class="table" data-toggle="table" data-toolbar="#toolbar" data-search="true" data-show-refresh="true" data-show-toggle="true" data-show-fullscreen="false" data-show-columns="true" data-show-columns-toggle-all="true" data-detail-view="false" data-show-export="true" data-click-to-select="true" data-detail-formatter="detailFormatter" data-minimum-count-columns="2" data-show-pagination-switch="true" data-pagination="true" data-id-field="id" data-page-list="[10, 25, 50, 100, all]" data-show-footer="true" data-side-pagination="server" data-response-handler="responseHandler">
                    <thead>
                      <tr>
                        <th> Id</th>
                        <th>Course Code</th>
                        <th>Course </th>
                        <th> Type</th>
                        <th>switch</th>
                        <th> Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($pagedata as $key => $course)
                      @php
                      $key++;
                      @endphp
                      <tr>
                        <td>{{$key}}</td>
                        <td>{{$course->course_code}}</td>
                        <td>{{$course->course_name}}</td>
                        <td>{{$course->courses_course_type}}</td>
                        <td>
                          @if($course->status == 1)
                          <div class="form-check form-switch">
                            <input id="status" onchange="update_status({{$course -> id}},0)" checked class="form-check-input" value="0" type="checkbox" role="switch">
                            <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                          </div>

                          @else
                          <div class="form-check form-switch">
                            <input id="status" onchange="update_status({{$course -> id}},1)" class="form-check-input" value="0" type="checkbox" role="switch">
                            <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                          </div>

                          @endif
                        </td>
                        <td>@if($course->status==1)<span class="btn btn-success btn-xs">Active</span>@else <span class="btn btn-warning btn-xs">Inactive</span>@endif</td>
                        <td>
                          <a href="{{ route('course.view', ['id' => $course->id]) }}">
                           <button type="button" class="btn btn-warning btn-sm">View</button>
                          </a>
                          <a href="{{url('edit_course_data',$course->id)}}" class="btn btn-success btn-sm"><i class=" bx bx-pencil"></i></a>

                          <!-- <button type="button" class="btn btn-success" onclick="deleterecord(`{{$course->id}}`,`courses`)"><i class="fa-solid fa-pen"></i></button> -->
                          <button type="button" class="btn btn-danger btn-sm" onclick="deleterecord(`{{$course->id}}`,`courses`)"><i class="fa fa-trash"></i></button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <!-- Footer -->
            <footer class="default-footer">
              @include('includes.footer')
              <!-- Footer -->

              <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- Layout page -->
      </div>
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
      <!-- Layout wrapper -->
      @include('includes.footer_script')
      <!-- Footerscript -->

      <!-- Add DataTables JavaScript -->
    </div>
  </div>
  <script>
    function update_status(course_id, update_val) {

     
      $.ajax({
        type: "POST",
        url: '{{url("/")}}/update_course_status',
        data: {
          'course_id': course_id,
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
  </script>
</body>

</html>