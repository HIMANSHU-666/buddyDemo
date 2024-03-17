<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no minimum-scale=1.0, maximum-scale=1.0" />
  <title>Dashboard</title>
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
            <div class="row my-3 justify-content-center">

              <div class="col-md-3">
                <div class="card">
                  <div class="card header bg-primary p-2">
                    <span class="fs-5 ms-2 text-white">Offer Letter</span>
                  </div>
                  <div class="card-body py-0">
                    <span class="fs-3 my-2">{{ $stucount }}</span>
                  </div>
                  <div class="card-footer bg-primary text-white p-2">
                    <a class="ms-2 text-white" href="{{ url('view_student') }}">View</a>

                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card">
                  <div class="card header bg-primary p-2">
                    <span class="fs-5 ms-2 text-white">Acceptance Letter</span>
                  </div>
                  <div class="card-body py-0">
                    <span class="fs-3 my-2">{{$agentcount}}</span>
                  </div>
                  <div class="card-footer bg-primary text-white p-2">
                    <a class="ms-2 text-white" href="{{ url('view_agents') }}">View</a>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card">
                  <div class="card header bg-primary p-2">
                    <span class="fs-5 ms-2 text-white">Bonofide</span>
                  </div>
                  <div class="card-body py-0">
                    <span class="fs-3 my-2">{{$subcount}}</span>
                  </div>
                  <div class="card-footer bg-primary text-white p-2">
                    <a class="ms-2 text-white" href="{{ url('view_subagents') }}">View</a>
                  </div>
                </div>
              </div>

            </div>

          </div>
          <!-- / Content -->

          <!-- Footer -->
          <footer class="default-footer">
            @include('includes.footer')
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
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