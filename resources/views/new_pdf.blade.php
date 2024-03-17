</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student_Document </title>
    <!-- headerscript -->
    <style>
        *{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        th {
            text-align: left !important;
        }

        fieldset {
            margin-bottom: 25px !important;
        }
        #br{
            color: #000000;
        }
        #yr{
            color: #0271FE;
        }
        #bd{
            color: #F80106;
        }
       
       
    </style>

</head>

<body>
    <header>
        <h1 id="heading"><span id="br">Bring</span> <span id="yr">Your</span> <span id="bd">Buddy</span></h1>
    </header>

    <fieldset>
        <legend>University Details</legend>
        <table class="table">

            <tbody>
                <tr>
                    <th>University Name</th>
                    <td>{{$object->uni_name}}</td>
                </tr>
            </tbody>
        </table>
    </fieldset>

    <fieldset>
        <legend>Student Details</legend>
        <table class="table">

            <tbody>
                <tr>
                    <th>Student Name</th>
                    <td>{{$object->stu_name}}</td>
                </tr>
                <tr>
                    <th>Student Contact</th>
                    <td>{{$object->stu_phone}}</td>
                </tr>
                <tr>
                    <th>Student Email</th>
                    <td>{{$object->stu_email}}</td>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <fieldset>
        <legend>Course Details</legend>
        <table class="table">

            <tbody>
                <tr>
                    <th>Course Name</th>
                    <td>{{$object->course_name}}</td>
                </tr>
                <tr>
                    <th>Course Annual Fee</th>
                    <td>{{$object->anl_fee}}</td>
                </tr>
                <tr>
                    <th>Course Application Fee</th>
                    <td>{{$object->reg_fees}}</td>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <fieldset>
        <legend>Student Documents</legend>
        <table class="table">

            @if(optional($object)->matric != "" || optional($object)->plustwo != "" || optional($object)->otherdoc != "")
            <tbody>
                <tr>
                    <th>10th Certificate</th>
                    <td><a href="{{optional($object)->global_url.'/uploads/student_document/certificate_10/'.optional($object)->matric}}" target="_blank"> View Doc </a></td>

                </tr>
                <tr>
                    <th>12th Certificate</th>
                    <td><a href="{{optional($object)->global_url.'/uploads/student_document/certificate_12/'.optional($object)->plustwo}}" target="_blank"> View Doc </a></td>
                </tr>
                <tr>
                    <th>Other Certificates</th>
                    <td><a href="{{optional($object)->global_url.'/uploads/student_document/certificate_other/'.optional($object)->otherdoc}}" target="_blank"> View Doc </a></td>
                </tr>
            </tbody>
            @else
            <h1 class="text-center">No documents uploaded by student</h1>
            @endif
        </table>
    </fieldset>

</body>

</html>