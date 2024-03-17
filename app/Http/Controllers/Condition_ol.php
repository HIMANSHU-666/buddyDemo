<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\Conditional_ol_Model;


class Condition_ol extends Controller
{
    // creating model object
   
  

    public function view_form(){
        return view('create_ol');
    }

    public function view_ol(){
        return view('view_COL');
    }

    public function add_condition_ol(Request $request)
    {

        $data = array(
            "ref_no" => $request->ref_no,
            "date" => $request->date,
            "stu_name" => $request->stu_name,
            "stu_father_name" => $request->stu_father_name,
            "country" => $request->country,
            "scholarship_percentage" => $request->scholarship_percentage,
            "course_name" => $request->course_name,
            "duration_sem" => $request->duration_sem,
            "duration_year" => $request->duration_year,
            "commencement_date" => $request->commencment_date,
            "completion_date" => $request->completion_date,
            "registeration_fee" => $request->registeration_fee,
            "hos_mess_fee" => $request->hos_mess_fee,
            "annual_tution_fee" => $request->annual_tution_fee,
            "annual_tution_fee_yearly" => $request->annual_tution_fee_yearly,
            "tution_fee_scholarship" => $request->tution_fee_scholarship,
        );

        $res = Conditional_ol_Model::insert($data);

        if ($res) {
            return redirect()->back()->with('success', 'OfferLetter Added');
        } else {
            return redirect()->back()->withErrors(['' => 'Somthing went wrong!']);
        }
    }
}
