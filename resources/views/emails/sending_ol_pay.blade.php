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
    <h1>Email to the student sending offer letter and asking for payment</h1>
    <h3 style="margin: 20px 0px;">Dear {{ $stu_con_data['stu_name']}}</h3>
    <p style="font-size: 1.1rem; margin: 20px 0px;">I hope this email finds you well. I am writing to extend my
        heartfelt congratulations on successfully completing the verification process and securing your offer letter.
        Your offer letter has been sent to you via a secure link for your review and acceptance.
    </p>
    <a href="#" style="margin: 20px 0px; display: block;">Click here to download offer letter</a>

    <p style="font-size: 1.1rem; margin: 20px 0px;"> We kindly request you to carefully go through the details mentioned in the letter. Should you have any queries or require clarification regarding the offer terms and conditions, please feel free to contact us at your earliest convenience.

    </p>

    <p style="font-size: 1.1rem; margin: 20px 0px;">Please ensure that the payment is made within next seven days, as any delay might result in the rejection of the offer letter.



    <p style="font-size: 1.1rem; margin: 20px 0px;">Once again, congratulations on this significant achievement! We eagerly anticipate your affirmative response and look forward to welcoming you to our institution.
    </p>

    <h5>Best Regards</h5>
</body>

</html>