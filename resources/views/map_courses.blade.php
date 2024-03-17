<!DOCTYPE html>



<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">



<head>



  <meta charset="utf-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title> Add Map Courses</title>

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

              <h3 class="mb-0 text-primary text-decoration-underline">{{$university->uni_name}}</h3>

              <!-- <small class="text-muted float-end">Add Access Data</small> -->



            </div>

            <div class="container">

              <div class="card">

                <h3>Map Courses</h3>



                <!-- <div class="card">

                    <div class="card-body">

                        <form>

                            <label class="form-label" for="university-name">Upload excel Sheet<span class="text-danger"> *</span></label>

                            <input type="file" class="form-control" id="university-logo" name="u_logo" required>

                            <button class="btn btn-primary mt-3">Save</button>

                        </form>

                    </div>

                </div> -->

                <!--TABLE-->
                <form action="{{url('/') }}/mapCourses/{{$university->id}}" method="post">
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
                  <div class="table-responsive text-nowrap">

                    <table class="table" data-toggle="table" data-toolbar="#toolbar" data-show-fullscreen="false" data-detail-view="false" data-show-export="true" data-click-to-select="true" data-detail-formatter="detailFormatter" data-minimum-count-columns="2" data-id-field="id" data-page-list="[10, 25, 50, 100, all]" data-show-footer="true" data-side-pagination="server" data-response-handler="responseHandler">



                      <thead>

                        <tr>

                          <th class="p-2">Course Name</th>


                          <th class="p-2">Per Semester Fee <br> (With Hostel)</th>

                          <th class="p-2">Per Semester Fee <br> (Without Hostel)</th>

                          <th class="p-2">Annual Semester Fee <br> (With Hostel)</th>

                          <th class="p-2">Annual Semester Fee <br> (Without Hostel)</th>
                          <th class="p-2">Registration Fee</th>

                        </tr>

                      </thead>

                      <tbody class="list_wrapper">
                        <tr>


                          <td>
                            <select class="form-select" id="select_course" onchange="check_course({{$university->id}})" name="course_id[]" aria-label="Default select example">
                              <option selected hidden disabled>Select</option>

                              @foreach($pagedata as $key => $Courses)
                              @php
                              $key++;
                              @endphp

                              <option value="{{$Courses->id}}">{{$Courses->course_name}}</option>

                              @endforeach

                            </select>
                          </td>





                          <td><input type="text" class="form-control" name="ps_fee_with_hos[]"></td>

                          <td><input type="text" class="form-control" name="ps_fee_without_hos[]"></td>

                          <td><input type="text" class="form-control" name="anul_fee_with_hos[]"></td>

                          <td><input type="text" class="form-control" name="anul_fee_without_hos[]"></td>

                          <td><input type="text" class="form-control" name="reg_fees[]"> </td>
                        </tr>

                        <!-- @foreach($pagedata as $key => $course)

                        @php

                        $key++;

                        @endphp

                        <tr>

                             <td>{{$key}}</td>

                             <td>{{$course->course_name}}</td>

                             <td>{{$course->course_category}}</td>

                             <td>{{$course->type}}</td>

                             <td></td>

                             <td></td>

                             <td></td>

                             <td></td>

                        </tr>

                         @endforeach -->

                      </tbody>

                    </table>



                  </div>
                  <div class="form-group mb-3">
                    <label class="form-label"><span class=""></span></label>
                    <button type="button" class="list_add_button btn btn btn-primary mb-5"> <i class="menu-icon tf-icons bx bx-plus"></i></button>
                  </div>
                  <div class="form-group mb-3">
                    <label class="form-label"><span class=""></span></label>
                    <button type="submit" class="btn btn-primary mb-5">Save</button>
                  </div>
                </form>
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
      <script>
        function check_course(university_id) {

          $.ajax({
            type: "POST",
            url: '{{url("/")}}/check_course',
            data: {
              'university_id': university_id,
              'course_id': $(`#select_course`).val(),
              '_token': '{{csrf_token()}}'
            },
            success: function(response) {
              // alert(response);
              if (response.error == "1") {
                $.toast({
                  heading: "<i class='fa fa-warning' ></i> " + response.error_msg,
                  position: 'top-right',
                  stack: false
                })
                $(".loader").css("display", "none");
              } else {

                if (response.success == "0") {
                  $.toast({
                    heading: 'course is already added by University',
                    position: 'top-right',
                    stack: false
                  })
                }
                else{
                  $.toast({
                    heading: 'You are good to go',
                    position: 'top-right',
                    stack: false
                  })
                }
              }
            }
          });
        }
      </script>
      <script>
        $(document).ready(function() {
          var x = 0; //Initial field counter
          var list_maxField = 20; //Input fields increment limitation
          $('.list_add_button').click(function() {
            if (x < list_maxField) {
              x++; //Increment field counter
              var list_fieldHTML = '<tr><td><select class="form-select" name="course_id[]" aria-label="Default select example"><option selected hidden disabled>Select</option>@foreach($pagedata as $key => $Courses)  @php$key++;@endphp<option value="{{$Courses->id}}">{{$Courses->course_name}}</option> @endforeach</select></td><td><input type="text" class="form-control" name="ps_fee_with_hos[]"></td><td><input type="text" class="form-control" name="ps_fee_without_hos[]"></td><td><input type="text" class="form-control" name="anul_fee_with_hos[]"></td><td><input type="text" class="form-control" name="anul_fee_without_hos[]"></td><td><input type="text" class="form-control" name="reg_fees[]"></td><td><button type="button" class="list_remove_button btn btn-danger"><i class="menu-icon tf-icons bx bx-minus"></i></button></td></tr>';
              $('.list_wrapper').append(list_fieldHTML); //Add field html
            }
          });

          //Once remove button is clicked
          $('.list_wrapper').on('click', '.list_remove_button', function() {
            $(this).closest('tr').remove(); //Remove field html
            x--; //Decrement field counter
          });
        });
      </script>


</body>



</html>