<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta  name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no minimum-scale=1.0, maximum-scale=1.0"/>
    <title>Change Password Form</title>
    <meta name="description" content=""/>

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
                <div class="container" style="margin-top: 50px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Change Password</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/') }}/change_pass"> <!-- Update the route name -->
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

                        <div class="form-group">
                            <label for="password">Old Password</label>
                            <input  type="password" class="form-control" name="old_password" required autofocus>
                    
                        </div>

                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" class="form-control" name="new_password" required>
                           
                        </div>
                        <div class="form-group">
                            <label for="new_password_confirmation">Confirm Password</label>
                            <input  type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <div class="form-group" style="margin-top: 50px;">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Change Password')}}
                           </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
        <script>
        const form = document.getElementById('password-change-form');
    const newPasswordInput = document.getElementById('newpassword');
    const confirmPasswordInput = document.getElementById('confirmpassword');

    form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }

        if (newPasswordInput.value !== confirmPasswordInput.value) {
            confirmPasswordInput.setCustomValidity('Passwords do not match.');
        } else {
            confirmPasswordInput.setCustomValidity('');
        }

        form.classList.add('was-validated');
    });

    newPasswordInput.addEventListener('input', function () {
        confirmPasswordInput.setCustomValidity('');
    });

    confirmPasswordInput.addEventListener('input', function () {
        confirmPasswordInput.setCustomValidity('');
    });

</script>
            <!-- / Content-->
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
