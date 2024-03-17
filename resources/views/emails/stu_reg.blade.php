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
    <h3 style="margin: 25px 0px; font-family: sans-serif; font-size: 13px; text-align: left;">Dear {{
        $stu_process_data['stu_name']}}
    </h3>
    <p style=" margin: 25px 0px; font-family: sans-serif; font-size: 13px; text-align: left;">I hope this email finds
        you well. </p>
    <p style=" margin: 25px 0px; font-family: sans-serif; font-size: 13px; text-align: left;">I am Writing to confirm
        your registration
        for the
        {{ $stu_process_data['crs_name']}} at {{ $stu_process_data['uni_name']}} is successfully
        recieved and processed congratulation on taking significant step toward advancing your
        academic
        journey.
    </p>

    <p style="text-align: left; font-family: sans-serif; font-size: 13px; margin: 25px 0px;">Before we proceed with the
        formal offer
        letter,
        kindly note that our team is currently verifying the documents submitted during the
        registration
        process. Ensuring the accuracy and completeness of your application is crucial for the
        subsequent steps in the admission process.</p>

    <p style="text-align: left; font-family: sans-serif; font-size: 13px; margin: 25px 0px;">Once the verification
        process is
        complete, you
        will receive an official offer letter from the university. This letter will provide
        comprehensive details regarding your course, schedule, and any additional requirements.
    </p>



    <p style="text-align: left; font-family: sans-serif; font-size: 13px; margin: 25px 0px;">Thank you for choosing {{
        $stu_process_data['uni_name']}}. We
        are
        excited to embark on this educational journey with you.</p>
    <h5 style="font-size: 20px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Warm
        Regards</h5>
</body>

</html>