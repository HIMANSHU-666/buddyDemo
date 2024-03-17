<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>

  <meta charset="utf-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>View Contact Details</title>

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

            <h3 class="card-header">Contact Details</h3>

            <div class="table-responsive text-nowrap">

            <table class="table" data-toggle="table"    
    data-toolbar="#toolbar"
 data-search="true"
 data-show-refresh="true"
 data-show-toggle="true"
 data-show-fullscreen="false"
 data-show-columns="true"
 data-show-columns-toggle-all="true"
 data-detail-view="false"
 data-show-export="true"
 data-click-to-select="true"
 data-detail-formatter="detailFormatter"
 data-minimum-count-columns="2"
 data-show-pagination-switch="true"
 data-pagination="true"
 data-id-field="id"
 data-page-list="[10, 25, 50, 100, all]"
 data-show-footer="true"
 data-side-pagination="server"
 data-response-handler="responseHandler">

         <thead>

         <tr>
                <th> Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                
            </tr>
                </thead>

                <tbody>

               

              <?php  $id=1; ?>
                @foreach($data as $contact)
               
                <tr>
                    <td>{{ $id }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->subject }}</td>
                    <td>{{ $contact->message }}</td>
                    
                    
           

                </tr>
                <?php  $id++; ?>
                 @endforeach

                </tbody>

              </table>



              <div class="modal fade" id="status-modal" tabindex="-1" role="dialog" aria-labelledby="status-modal-label" aria-hidden="true">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="status-modal-label">Change Status</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                    <p>Select the new status:</p>

                    <button class="btn btn-success" id="change-status-active">Active</button>

                    <button class="btn btn-warning" id="change-status-inactive">Inactive</button>

                </div>

            </div>

        </div>

    </div>





    <!-- Include Bootstrap JS and jQuery -->

 <!-- Include Bootstrap JS and jQuery -->

 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



    <script>

       document.addEventListener("DOMContentLoaded", function () {

        const statusButtons = document.querySelectorAll(".status-button");

        const statusSelect = document.getElementById("statusSelect");



        statusButtons.forEach(function (button) {

            button.addEventListener("click", function () {

                const newStatus = button.getAttribute("data-status");

                statusSelect.value = newStatus; // Update the select element's value

                $('#status-modal').modal('hide'); // Close the modal

            });

        });

    });

        // JavaScript logic for handling status change

        document.addEventListener("DOMContentLoaded", function () {

            const statusButtons = document.querySelectorAll(".status-button");



            statusButtons.forEach(function (button) {

                button.addEventListener("click", function () {

                    const currentStatus = button.getAttribute("data-status");

                    const modalActiveButton = document.getElementById("change-status-active");

                    const modalInactiveButton = document.getElementById("change-status-inactive");



                    modalActiveButton.addEventListener("click", function () {

                        button.textContent = "Active";

                        button.setAttribute("data-status", "active");

                        button.classList.remove("btn-warning");

                        button.classList.add("btn-success");

                        $('#status-modal').modal('hide');

                    });



                    modalInactiveButton.addEventListener("click", function () {

                        button.textContent = "Inactive";

                        button.setAttribute("data-status", "inactive");

                        button.classList.remove("btn-success");

                        button.classList.add("btn-warning");

                        $('#status-modal').modal('hide');

                    });

                });

            });

        });

    </script>

    









            </div>

          </div>

        </div>

         <!-- Include DataTables JavaScript -->

      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

      <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>





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

</body>

</html>

 