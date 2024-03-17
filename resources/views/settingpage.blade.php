<!DOCTYPE html>



<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">



<head>

  <meta charset="utf-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no minimum-scale=1.0, maximum-scale=1.0" />

  <title> setting</title>

  <meta name="description" content="" />



  <!-- headerscript -->

  @include('includes.header_script')

</head>



<body>

  <!-- Layout wrapper -->

  <div class="layout-wrapper layout-content-navbar">

    <div class="layout-container">

      @include('includes.sidebar')

      <!-- / Menu -->

      <!-- Layout container -->

      <div class="layout-page">

        <!-- Navbar -->

        @include('includes.header')

        <!-- / Navbar -->

        <!-- Content wrapper -->

        <div class="content-wrapper">

          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">

            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Setting/</span>edit Site Setting</h4>

            <!-- Basic Layout -->

            <div class="row">

              <div class="col-xl">

                <div class="card mb-4">

                  <div class="card-header d-flex justify-content-between align-items-center">

                    <h5 class="mb-0">Update Site Setting</h5>

                    <small class="text-muted float-end"></small>

                  </div>

                  <div class="card-body">

                    <form action="{{url('/') }}/settings" method="POST" enctype="multipart/form-data">

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

                      <div class="mb-3">

                        <label class="form-label" for="basic-icon-default-vendorname">First Name:</label>

                        <div class="input-group input-group-merge">

                          <input type="text" value="{{$pagedata->firstname}}" class="form-control" name="firstname" required />

                        </div>

                      </div>

                      <div class="mb-3">

                        <label class="form-label" for="basic-icon-default-vendorname">Last Name:</label>

                        <div class="input-group input-group-merge">

                          <input type="text" value="{{$pagedata->lastname}}" class="form-control" name="lastname" required />

                        </div>

                      </div>

                      <div class="mb-3">

                        <label class="form-label" for="basic-icon-default-email">Site Email:</label>

                        <div class="input-group input-group-merge">

                          <input type="email" value="{{$pagedata->email}}" name="email" class="form-control" required />

                        </div>

                      </div>

                      <div class="mb-3">

                        <label class="form-label" for="basic-icon-default-phone">Site Phone No:</label>

                        <div class="input-group input-group-merge">

                          <input type="text" value="{{$pagedata->phone_number}}" name="phone_number" class="form-control" required />

                        </div>

                      </div>

                      <div class="mb-3">

                        <label class="form-label" for="basic-icon-default-address">Site Address:</label>

                        <div class="input-group input-group-merge">

                          <textarea class="form-control" name="address">{{$pagedata->address}}</textarea>

                        </div>

                      </div>

                      <div class="mb-3">

                        <label class="form-label" for="basic-icon-default-phone">Site Logo:</label>

                        <div class="input-group input-group-merge">

                        <p><a href="{{ asset('uploads/logo/' .$pagedata->image)}}" target="blank"><img class="table_img" src="{{ asset('uploads/logo/' .$pagedata->image)}}" style="width:25%; height:90%;"></a></p>

                    </div>

                    <span style="color:red;font-size:10px">This will overwrite previous image</span>

                        <div>

                          <input type="file" name="image" class="form-control" />

                        </div>

                      </div>



                      <button type="submit" class="btn btn-success">Submit</button>

                    </form>

                  </div>

                </div>

              </div>

           



            </div>

          

          </div>

          <!--/ Content-->

          <!-- Footer -->

          <footer class="default-footer">

            @include('includes.footer')

            <!-- / Footer -->

            <div class="content-backdrop fade"></div>

        </div>

        <!-- Content wrapper-->

      </div>

      <!-- / Layout page -->

    </div>

    <!-- Overlay -->

    <div class="layout-overlay layout-menu-toggle"></div>

  </div>

  <!-- / Layout wrapper -->

  @include('includes.footer_script')

  <!-- footerscrit -->

</body>



</html>