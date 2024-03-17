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
    <h1>{{ $mailData['title']}}</h1>
    <h3 style="margin: 20px 0px;">Dear {{ $mailData['university_name']}}</h3>
    <p style="font-size: 1.1rem;">I hope this email finds you well. I am writing to inform you of the successful
        registration of a student at your esteemed university for the upcoming [{{ $mailData['dur_sem']}} semester/{{
        $mailData['dur_year']}} year]. The student's details are as follows:</p>
    <div style="margin: 20px 0px;">
        <div>Student Name: <span style="font-weight: bold;">{{ $mailData['stu_name']}}</span></div>
        <div style="margin: 10px 0px">Student ID: <span style="font-weight: bold;">{{ $mailData['stu_id']}}</span></div>
        <div>Program applied for: <span style="font-weight: bold;">{{ $mailData['program_name']}}</span> </div>
    </div>
    <p style="font-size: 1.1rem; margin: 20px 0px">To facilitate their necessary arrangements and visa application process, we kindly
        request the university to generate the official offer letter for the aforementioned student at your earliest
        convenience. This document is crucial for their visa application and other administrative requirements.
    </p>

    <a href="{{ $mailData['ol_link']}}" style="margin: 20px 0px">Upload Offer Letter Here</a>

    <p style="margin: 20px 0px; font-size: 1.1rem;">
        We appreciate your prompt attention to this matter and kindly request that the offer letter be uploaded on the
        below link:
    </p>

    <p style="font-size: 1.1rem;">Thank you for your assistance in ensuring a smooth transition for the student. We look forward to a positive
        response and the issuance of the offer letter.
    </p>
    <h5>Warm Regards</h5>
</body>

</html>