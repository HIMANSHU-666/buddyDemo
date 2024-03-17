<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Courses;

use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
   

    public function View()
    {
        // $data = DB::table('student_enquiry')->select('id', 'full_name', 'email', 'code', 'phone', 'state', 'city', 'gender', 'courses')->get();
        // return view('view_enquiry', ['data' => $data]);
        
         $data = Enquiry::orderBy('id', 'DESC')->where('del_status',0)->get();
         return view('view_enquiry', ['data' => $data]);
        
    

    }


}