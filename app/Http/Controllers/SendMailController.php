<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Uni_offer_letter_mail;
use App\Mail\stu_process_mail;
use App\Mail\stu_verify_con;

class SendMailController extends Controller
{

    public function output($Return = array())
    {
        @header('Cache-Control: no-cache, must-revalidate');
        @header("Content-Type: application/json; charset=UTF-8");
        exit(json_encode($Return));
        die;
    }

    public function index(Request $request){
        $stu_name = $request->stu_name;
        $dur_sem = $request->dur_sem;
        $dur_year = $request->dur_year;
        $stu_id = $request->stu_id;
        $uni_name = $request->uni_name;
        $program_name = $request->course_name;
        $course_id = $request->course_id;
        $uni_id = $request->uni_id;
        $mailData=[
          'title' => 'Request for Generation of Offer Letter for Successfully Registered Student',
          'stu_name'=> $stu_name,
          'dur_sem' => $dur_sem,
          'dur_year' => $dur_year,
          'stu_id' => $stu_id,
          'university_name' => $uni_name,
          'program_name' => $program_name, 
          'ol_link' => url('offerLetter_upload',[$stu_id,$uni_id,$course_id]),
        ];
        $stu_process_data=[
            'stu_name' => $stu_name,
            'crs_name' => $program_name,
            'uni_name' => $uni_name
        ];
        $uni_mail = Mail::to(['sharma.himanshu1324@gmail.com'])->send(new Uni_offer_letter_mail($mailData));

        $stu_mail = Mail::to(['muskansharma.mcl@gmail.com'])->send(new stu_process_mail($stu_process_data));
        if ($uni_mail && $stu_mail) {
            return redirect()->back()->with('success', 'mail Sent successfully.');
        } else {
            return redirect()->withErrors(['' => 'Somthing went wrong!']);
        }
    }


    public function stu_confirm(Request $request){
        $stu_name = $request->stu_name;
        $uni_name = $request->uni_name;
        $crs_name = $request->crs_name;
        $stu_con_data=[
          'stu_name'=> $stu_name,
          'uni_name' => $uni_name,
          'crs_name' => $crs_name, 
        ];
        $res = Mail::to(['sharma.himanshu1324@gmail.com'])->send(new stu_verify_con($stu_con_data));

        if ($res) {
            return redirect()->back()->with('success', 'mail Sent successfully.');
        } else {
            return redirect()->withErrors(['' => 'Somthing went wrong!']);
        }
    }

}