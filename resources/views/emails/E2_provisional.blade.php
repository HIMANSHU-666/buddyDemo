<!DOCTYPE html>
<html lang="en">
<head>
    <title>Provisional-Letter</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;800&display=swap" rel="stylesheet">
    <style>
        *{margin:0px; padding:0px;}
        .outer-div{border:1px solid #000; padding:20px; margin: 20px auto; max-width: 940px; font-size: 14px; line-height: 1.5; font-family:   Poppins, sans-serif;}
        .d-flex {display: flex; align-items: center; justify-content: space-between;}
        .text-center {text-align: center;} .text-right{text-align: right;}
         h1,h2,h3,h4{font-weight: 700; margin-bottom: 10px;} p{margin-bottom: 10px;}
        .link{color:#ff000f; text-decoration: none;}
        .link:hover {color:#000;} 
         table{margin:20px 0px; width: 100%;} 
         .border{font-weight: 700; text-align: center;}
         table,td{
          border: 2px solid black;
          padding: 5px;
          border-collapse: collapse;}

    </style>
</head>
<body>
    <div class="outer-div">
        <div class="d-flex text-center">
            <div>
                <img src="https://new.bringyourbuddy.in/assets/images/byb_logo.png" alt="Bring Your Buddy" height="80px">
                <p><a href="https://bringyourbuddy.in" class="link">https://bringyourbuddy.in</a></p>
            </div>
            <div>
                <img src="/BYB-Project/registration-email/studyindia.png" alt="Study India" height="90px">
                <p><a href="https://studyindia.io" class="link">https://studyindia.io</a></p>
            </div>
        </div>
        <h1 class="text-center">PROVISIONAL LETTER</h1>
        <h3 class="text-right">Date: __/__/2024</h3>
        <div class="">
            <h2>Dear {{ $e2_pro_data['stu_name']}}</h2>
            <h3>Greetings from StudyIndia !!!</h3>
            <p>Indian Universities encourages diversity in the campus and provide multiple avenues to prepare the students for the global world. International students in the Indian campuses will get enriched with world class educational experience, global consciousness, and cross-cultural interactions to foster awareness, perspectives, and understanding of international cultures.</p>
            <p>We are delighted that you intend to continue your studies at (University Name), and we look forward to assisting you. Our mission is to help you to reach your academic and personal goals and objectives by fostering holistic development. Many of our international students appreciate beautiful, serene campuses of India, where small batch sizes allow them to receive personalized attention from mentors, who takes personal interest in each student for a successful learning experience.</p>

            <h3>We ensure to adhere and expect the same from an International Student while being provisionally admitted to {{ $e2_pro_data['uni_name']}}:</h3>
            <p>Subject to physical verification of the required documents and checking for the eligibility and admission criteria, we are happy to confirm that your application for the {{ $e2_pro_data['crs_name']}} in the chosen discipline at {{ $e2_pro_data['uni_name']}} has been approved.</p>
            <p>Please find below the information for your prospective candidature:</p>  
            
            <table>
                <tbody>
                 <tr class="border">
                    <td>S.No.</th>
                    <td>Parameters</td>
                    <td>Details</td>
                 </tr>
                 <tr>
                    <td>01</td>
                    <td>Name of the Course you are provisionally admitted to</td>
                    <td>{{ $e2_pro_data['crs_name']}}</td>
                 </tr>
                 <tr>
                    <td>02</td>
                    <td>Period of Course</td>
                    <td>{{ $e2_pro_data['dur_year']}} years</td>
                 </tr>
                 <tr>
                    <td>03</td>
                    <td>Date of commencement of the course</td>
                    <td>(August 2024)</td>
                 </tr>
                 <tr>
                    <td>04</td>
                    <td>The student can join till (date)</td>
                    <td>(30th  Oct 2024)</td>
                 </tr>
                </tbody>
            </table>
            <h3 style="margin-top: 10px;">Fee structure:</h3>
            <h3 style="margin-top: 10px;">Registration fee: 100 USD (ONE TIME)</h3>
            <table>
                <tbody>
                    <tr class="border">
                        <td>Year</td>
                        <td>Tuition fees per Annum (USD)</td>
                        <td>Hostel fees per Annum (USD)</td>
                        <td>Fooding fees per annum (USD)</td>
                        <td>SPECIAL FEES AFTER STUDYINDIA SCHOLARSHIP</td>
                    </tr>
                    <tr>
                        <td>I</td>
                        <td>()</td>
                        <td>()</td>
                        <td>()</td>
                        <td>()</td>
                    </tr>
                    <tr>
                        <td>II</td>
                        <td>()</td>
                        <td>()</td>
                        <td>()</td>
                        <td>()</td>
                    </tr>
                </tbody>
            </table>
            <p>During Internship student have to pay assessment fee.</p>
            <p>For additional inquiry about university, please feel free to contact us:</p>
        </div>
        <div style="margin-top: 20px;">
            <h3>Director, International Admissions</h3>
            <ul style="margin-left: 0px; list-style: none;">
                <li><strong>Mobile & WhatsApp:</strong> <a href="tel:+91{{ $e2_pro_data['phone']}}" class="link">+91{{ $e2_pro_data['phone']}}</a></li>
                <li><strong>Official Email:</strong> <a href="mailto:query@bringyourbuddy.in" class="link">query@bringyourbuddy.in</a></li>
            </ul>
        </div>
    </div>
</body>
</html>