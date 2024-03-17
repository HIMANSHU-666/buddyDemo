<!DOCTYPE html>



<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">



<head>



  <meta charset="utf-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>View Universities Deatail</title>

  <meta name="description" content="" />

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

              <h5 class="mb-0">View</h5>

              <!-- <small class="text-muted float-end">Add Access Data</small> -->



            </div>

            <div class="container">

              <div class="card">

                <h3 class="card-header">Display University</h3>

                <div class="table-responsive text-nowrap">

                  <table class="table" data-toggle="table" data-toolbar="#toolbar" data-search="true" data-show-refresh="true" data-show-toggle="true" data-show-fullscreen="false" data-show-columns="true" data-show-columns-toggle-all="true" data-detail-view="false" data-show-export="true" data-click-to-select="true" data-detail-formatter="detailFormatter" data-minimum-count-columns="2" data-show-pagination-switch="true" data-pagination="true" data-id-field="id" data-page-list="[10, 25, 50, 100, all]" data-show-footer="true" data-side-pagination="server" data-response-handler="responseHandler">

                    <thead>

                      <tr>

                        <th>Id</th>

                        <th>Code</th>

                        <th>Authorized</th>

                        <th>Name</th>

                        <th>Email</th>

                        <th>Contact</th>

                        <th>Status</th>

                        <th>Actions</th>

                      </tr>

                    </thead>

                    <tbody>

                      @foreach($pagedata as $key => $university)

                      @php

                      $key++;

                      @endphp

                      <tr>

                        <td>{{$key}}</td>

                        <td>{{$university->uni_code}}</td>

                        <td>
                          @if($university->authorized == 1)
                          <div class="form-check form-switch">
                            <input id="authorized" onchange="authorized({{$university -> id}},0)" checked class="form-check-input" value="0" type="checkbox" role="switch">
                            <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                          </div>

                          @else
                          <div class="form-check form-switch">
                            <input id="authorized" onchange="authorized({{$university -> id}},1)" class="form-check-input" value="1" type="checkbox" role="switch">
                            <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                          </div>

                          @endif
                        </td>
                      

                        <td>{{$university->uni_name}}</td>


                        <td>{{$university->uni_email}}</td>
                        <td>{{$university->phone_code}} {{$university->uni_phone}}</td>
                        <td>
                          @if($university->status == 1)
                          <div class="form-check form-switch">
                            <input id="status" onchange="update_status({{$university -> id}},0)" checked class="form-check-input" type="checkbox" role="switch">
                            <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                          </div>

                          @else
                          <div class="form-check form-switch">
                            <input id="status" onchange="update_status({{$university -> id}},1)"  class="form-check-input" type="checkbox" role="switch">
                            <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                          </div>

                          @endif
                        </td>


                        <td>

                          <a href="{{ route('university.view', ['id' => $university->id]) }}"><button type="button" class="btn btn-warning btn-sm">View</button></a>


                          <a href="{{url('mapCourses', $university->id)}}" type="button" class="btn btn-info" onclick="">Map Courses</a>

                          <a href="{{url('view_mapCourses', $university->id)}}" type="button" class="btn btn-success" onclick="">View Courses</a>

                          <a href="{{ url('university_edit',['id'=> $university->id])}}"><button class="btn btn-primary btn-sm">Edit</button></a>
                          <button type="button" class="btn btn-danger" onclick="deleterecord(`{{$university->id}}`,`universities`)"><i class="fa fa-trash"></i></button>

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

      <!-- Footerscript-->
    </div>
  </div>

  <script>
    function update_status(university_id, update_val) {
      $.ajax({
        type: "POST",
        url: '{{url("/")}}/update_university_status',
        data: {
          'university_id': university_id,
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

    function authorized(university_id, update_val) {

      // var update_val = 1;
      // if ($('#authorized').is(':checked')) {
      //   update_val = 0;
      // }
      
      $.ajax({
        type: "POST",
        url: '{{url("/")}}/update_university_authorization',
        data: {
          'university_id': university_id,
          'authorized': update_val,
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