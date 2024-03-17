<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
    </style>
</head>

<body>
    <h1>Email to student to confirm the verification</h1>
    <h3 style="margin: 20px 0px;">Dear {{ $stu_con_data['stu_name']}}</h3>
    <p style="font-size: 1.1rem; margin: 20px 0px;">I am writing to inform you that we have successfully completed the verification process of your documents for {{$stu_con_data['crs_name']}} at {{ $stu_con_data['uni_name']}}. Your application has met all the necessary criteria, and I am pleased to inform you that you have been deemed eligible for admission.
    </p>
    <p style="font-size: 1.1rem; margin: 20px 0px;">I am Writing to confirm your registration for the {{ $stu_con_data['crs_name']}} at {{ $stu_con_data['uni_name']}} is successfully recieved and processed congratulation on taking significant step toward advancing your academic journey.
    </p>

    <p style="font-size: 1.1rem; margin: 20px 0px;">Please keep an eye on your email inbox as the offer letter will be dispatched to you within the next . This letter will contain comprehensive details regarding your admission, including the terms, conditions, and important information pertinent to your enrollment.
    </p>

    <p style="font-size: 1.1rem; margin: 20px 0px;">Congratulations once again on your successful verification. We are excited to welcome you to our {{ $stu_con_data['crs_name']}} and look forward to supporting you in your academic journey at {{ $stu_con_data['uni_name']}}.
    </p>

    <h5>Best Regards</h5>
</body>

</html>