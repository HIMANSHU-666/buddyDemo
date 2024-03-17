<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <title>Upload OfferLetter</title>
    <meta name="description" content="">
    <!-- Headerscript -->
    @include('includes.header_script')
</head>

<body>
    <!-- Layout wrapper -->





    <!-- Menu -->



    <!-- Layout container -->



    <!-- Navbar -->


    <!-- Navbar -->



    <!-- Centered Form -->

    <div class="container mt-5">
        <div class="row justify-content-center mt-5">

            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class=" text-center">Upload Offer Letter </h3>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="{{url('/') }}/upload_offerletter"  enctype="multipart/form-data" >
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
                                <input type="text" hidden value="{{ request()->stu_id }}" name="stu_id" id="">
                                <input type="text" hidden value="{{ request()->course_id }}" name="course_id" id="">
                                <input type="text" hidden value="{{ request()->uni_id }}" name="uni_id" id="">
                                <input id="file" type="file" class="form-control w-100" name="offer_letter" accept=".pdf" required>

                            </div>
                            <button type="submit" class="btn btn-primary w-100">Upload</button>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('includes.footer_script')

    <!-- Footerscript -->
    <script>
        function aler(){
            alert($('#file').val());
        }
    </script>
</body>



</html>