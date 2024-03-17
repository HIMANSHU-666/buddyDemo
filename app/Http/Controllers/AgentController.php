<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\AgentModel;
use App\Models\Commission_model;
use File;

class AgentController extends Controller
{
    // creating model object
    public function __construct()
    {
        $this->AgentModel = new AgentModel();
    }


    public function output($Return = array())
    {
        @header('Cache-Control: no-cache, must-revalidate');
        @header("Content-Type: application/json; charset=UTF-8");
        exit(json_encode($Return));
        die;
    }


    public function createRandomKey()
    {
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        srand((float)microtime() * 1000000);
        $i = 0;
        $key = '';

        while ($i <= 10) {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 1);
            $key = $key . $tmp;
            $i++;
        }

        return $key;
    }


    // view pages
    public function agents()
    {
        return view('add_agents');
    }


    // view agents
    public function view_agents()
    {
        $data = AgentModel::orderBy('id', 'DESC')->where(['del_status' => 0, 'agent_type' => 1])->get();
        return view('view_agents', ['pagedata' => $data]);
    }

    public function view_subagents()
    {
        $data = AgentModel::orderBy('id', 'DESC')->where(['del_status' => 0, 'agent_type' => 2])->get();
        return view('view_subagents', ['pagedata' => $data]);
    }

    public function addagent(Request $request)
    {
        if ($request->file('business_logo') != '') {
            $image = time() . '_' . $request->file('business_logo')->getClientOriginalName();
            $path = base_path() . '/public/uploads/business_logo/';
            $request->file('business_logo')->move($path, $image);
        } else {
            $image = "";
        }
        if ($request->file('business_certificate') != '') {
            $businessimage = time() . '_' . $request->file('business_certificate')->getClientOriginalName();
            $path = base_path() . '/public/uploads/business_certificate/';
            $request->file('business_certificate')->move($path, $businessimage);
        } else {
            $businessimage = "";
        }

        $data = array(
            "ref_code" => $this->createRandomKey(),
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "password" => password_hash($request->password, PASSWORD_BCRYPT, [10]),
            "phone_no" => $request->phone_no,
            "contact_method" => $request->contact_method,
            "find_out" => $request->find_out,
            "reference" => $request->reference,
            "recruiting_year" => $request->recruiting_year,
            "source_country" => $request->source_country,
            "services" => $request->services,
            "business_logo" => $image,
            "business_certificate" => $businessimage,
            "status" =>  1,
        );


        $res = AgentModel::insert($data);

        if ($res) {
            return redirect('add_agents')->with('success', 'Updated Successfully.');
        } else {
            return redirect()->back()->withErrors(['' => 'Somthing went wrong!']);
        }
    }



    public function view_detail_agent(string $id)
    {
        $data['pagedata'] = AgentModel::where('id', $id)->first();
        return view('agent_view_detail', $data);
    }

    public function updateagentstatus(Request $request)

    {



        $access = AgentModel::where("email", $request('email'));



        $data = array(



            "email" => $request->email,

            "status" => $request->status,

        );





        $res = $access->update($data);



        if ($res) {



            return redirect()->back();
        }
    }





    public function editagent(string $id)



    {



        $data['pagedata'] = AgentModel::where('id', $id)->first();



        return view('agent_edit', $data);
    }









    public function updateagent(Request $request)

    {



        $access = AgentModel::where("id", request('id'));





        // Validate the input data

        $validatedData = $request->validate([

            'email' => 'required|unique:agents,email,' . $request->id . ',id,del_status,0',

            'phone_no' => 'required|unique:agents,phone_no,' . $request->id . ',id,del_status,0',

            'business_certificate.*' => 'required|mines:pdf',



        ]);





        if ($request->file('business_logo') != "") {



            $image =  time() . '_' . $request->file('business_logo')->getClientOriginalName();



            $path = base_path() . '/public/uploads/business_logo/';



            $request->file('business_logo')->move($path, $image);





            $data = array(



                "first_name" =>  $request->first_name,

                "last_name" =>  $request->last_name,

                "email" =>  $request->email,

                "phone_no" =>  $request->phone_no,

                "commission_percentage" => $request->commission_percentage,

                "contact_method" =>  $request->contact_method,

                "find_out" =>  $request->find_out,

                "reference" =>  $request->reference,

                "recruiting_year" =>  $request->recruiting_year,

                "source_country" =>  $request->source_country,

                "services" =>  $request->services,

                "business_logo" =>  $image,

                "status" => $request->status,



            );
        } else {

            $data = array(





                "first_name" =>  $request->first_name,

                "last_name" =>  $request->last_name,

                "email" =>  $request->email,

                "phone_no" =>  $request->phone_no,

                "commission_percentage" => $request->commission_percentage,

                "contact_method" =>  $request->contact_method,

                "find_out" =>  $request->find_out,

                "reference" =>  $request->reference,

                "recruiting_year" =>  $request->recruiting_year,

                "source_country" =>  $request->source_country,

                "services" =>  $request->services,

                "status" => $request->status,

            );
        }



        if ($request->file('business_certificate') != "") {



            $busimage =  time() . '_' . $request->file('business_certificate')->getClientOriginalName();



            $path = base_path() . '/public/uploads/business_certificate/';



            $request->file('business_certificate')->move($path, $busimage);





            $data = array(



                "first_name" =>  $request->first_name,

                "last_name" =>  $request->last_name,

                "email" =>  $request->email,

                "phone_no" =>  $request->phone_no,

                "commission_percentage" => $request->commission_percentage,

                "contact_method" =>  $request->contact_method,

                "find_out" =>  $request->find_out,

                "reference" =>  $request->reference,

                "recruiting_year" =>  $request->recruiting_year,

                "source_country" =>  $request->source_country,

                "services" =>  $request->services,

                "business_certificate" =>  $busimage,

                "status" => $request->status,



            );
        } else {

            $data = array(





                "first_name" =>  $request->first_name,

                "last_name" =>  $request->last_name,

                "email" =>  $request->email,

                "phone_no" =>  $request->phone_no,

                "commission_percentage" => $request->commission_percentage,

                "contact_method" =>  $request->contact_method,

                "find_out" =>  $request->find_out,

                "reference" =>  $request->reference,

                "recruiting_year" =>  $request->recruiting_year,

                "source_country" =>  $request->source_country,

                "services" =>  $request->services,

                "status" => $request->status,

            );
        }







        // Update the data



        $res = $access->update($data);



        if ($res) {



            return redirect('view_agents')->with('success', 'Updated Successfully.');
        } else {



            return redirect()->back()->withErrors(['' => 'Somthing went wrong!']);
        }
    }





    public function deleteagent(Request $request)



    {



        $data = AgentModel::where('id', Request('id'));



        $updData = array(



            'del_status' => 1



        );



        $res = $data->update($updData);



        if ($res) {



            return redirect()->back()->with('success', 'Deleted successfully.');
        } else {



            return redirect()->withErrors(['' => 'Somthing went wrong!']);
        }
    }



    public function test()



    {



        $data = AgentModel::orderBy('id', 'DESC')->where('del_status', 0)->get();



        return view('test', ['pagedata' => $data]);
    }


    public function update_agent_status(Request $request)
    {
        $agent_id = $request->agent_id;
        $status = $request->status;
        $res = AgentModel::where('id', $agent_id)->update(array('status' => $status));
        if ($res == true) {
            $response['success'] = 1;
            $response['success_msg'] = "Updated Successfully!";
            $response['status'] = $status;
            $this->output($response);
        } else {
            $response['error'] = 1;
            $response['error_msg'] = "Something Went Wrong!";
            $this->output($response);
        }
    }

    public function get_agent_detail(Request $request)
    {

        $agent_id = $request->agentid;
        $data = AgentModel::where('id', $agent_id)->first();

        if ($data) {
            $response['success'] = 1;
            $response['data'] = $data;
            $this->output($response);
        } else {
            $response['error'] = 1;
            $response['error_msg'] = 'Somthing went wrong!';
            $response['agent_id'] = $agent_id;
            $this->output($response);
        }
    }


    public function generate_commission(Request $request)
    {

        $agent_id = $request->agent_id;
        $uni_id = $request->uni_id;
        $stu_id = $request->stu_id;
        $course_id = $request->course_id;


        $where = array('student_application.del_status' => 0, 'student.id' => $stu_id,);
        $data = DB::table('student_application')
            ->join('courses', 'courses.id', '=', 'student_application.course_id')
            ->join('universities', 'universities.id', '=', 'student_application.uni_id')
            ->join('student', 'student.id', '=', 'student_application.stu_id')
            ->join('university_courses', 'university_courses.course_id', '=', 'student_application.course_id')
            ->select('student_application.status as application_status', 'university_courses.anul_fee_without_hos as anl_fee',  'courses.course_name', 'student.name as stu_name', 'universities.uni_name')
            ->where($where)
            ->first();



        $agent = AgentModel::orderBy('id', 'DESC')->where(['del_status' => 0, 'id' => $agent_id])->first();

        // Adding Commission amount to partner wallet


        if ($agent->agent_type == 2) {

            $seniorAgent_currentbal = $agent->balance;
            $seniorAgent_newbal = $seniorAgent_currentbal + $request->partner_commission;
            AgentModel::where('id', $agent->agent_id)->update(array('balance' => $seniorAgent_newbal));





            $current_balance = $agent->balance;
            $new_balance = $current_balance + $request->final_commission;


            $commission_data = array(


                "agent_id" =>  $agent_id,

                "agent_type" => $agent->agent_type,

                "uni_id" =>  $uni_id,

                "course_id" =>  $course_id,

                "stu_id" =>  $stu_id,

                "paid_amount" => $request->paid_amount,

                "commission" =>  $request->final_commission,
               
                "commission_type" =>  1,
                
                "partner_commission" => $request->partner_commission,



            );
        } else {
            $current_balance = $agent->balance;
            $new_balance = $current_balance + $request->final_commission;


            $commission_data = array(


                "agent_id" =>  $agent_id,

                "agent_type" => $agent->agent_type,

                "uni_id" =>  $uni_id,

                "course_id" =>  $course_id,

                "stu_id" =>  $stu_id,

                "paid_amount" => $request->paid_amount,

                "commission" =>  $request->final_commission,

            );
        }





        $balance_res = AgentModel::where('id', $agent_id)->update(array('balance' => $new_balance));
        $Commission_res = Commission_model::insert($commission_data);



        if ($balance_res && $Commission_res) {

            return redirect()->back()->with('success', 'commission Generated Successfully');
        } else {



            return redirect()->withErrors(['' => 'Somthing went wrong!']);
        }
    }


    public function commissions()
    {

        $where = array('commissions.del_status' => 0, 'commissions.status' => 1, 'courses.status' => 1, 'courses.del_status' => 0);
        $data = DB::table('commissions')
            ->join('universities', 'commissions.uni_id', '=', 'universities.id')
            ->join('student', 'commissions.stu_id', '=', 'student.id')
            ->join('courses', 'commissions.course_id', '=', 'courses.id')
            ->join('agents', 'commissions.agent_id', '=', 'agents.id')
            ->select('agents.first_name as agent_name', 'agents.agent_type', 'commissions.id as pay_id', 'student.name as stu_name', 'universities.uni_name', 'courses.course_name', 'commissions.paid_amount', 'commissions.commission', 'commissions.created_at as date')
            ->where($where)
            ->get();

        return view('view_commissions', ['pagedata' => $data]);
    }
}
