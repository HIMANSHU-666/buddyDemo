<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Home;
use App\Models\managemasterclassModel;
use App\Models\managemastergstModel;
use App\Models\managemasterbrandModel;
use App\Models\StudentModel;
use App\Models\Application_model;
use App\Models\AgentModel;
use App\Models\Enquiry;
use App\Models\OfferLetter;

use File;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->StudentModel = new StudentModel();
    }


    public function output($Return = array())
    {
        @header('Cache-Control: no-cache, must-revalidate');
        @header("Content-Type: application/json; charset=UTF-8");
        exit(json_encode($Return));
        die;
    }

    //view pages
    public function students()
    {
        $data['pagedata'] = $this->StudentModel::orderBy('id', 'DESC')->where('del_status', 0)->get();
        return view('student_add', $data);
    }


    // add students
    public function add_student(Request $request)
    {
        if ($request->file('photo') != '') {



            $image = time() . '_' . $request->file('photo')->getClientOriginalName();



            $path = base_path() . '/public/uploads/student_photo/';



            $request->file('photo')->move($path, $image);
        } else {



            $image = "";
        }

        $data = array(
            "name" => $request->name,
            "father_name" => $request->father_name,
            "email" => $request->email,
            "phone_no" => $request->phone_no,
            "mother_name" => $request->mother_name,
            "qualification" => $request->qualification,
            "nationality" => $request->nationality,
            "gender" => $request->gender,
            "address" => $request->address,
            "photo" => $image,
            "status" =>  1,
        );

        $res = $this->StudentModel::create($data);

        if ($res) {
            $response['success'] = 1;
            $response['success_msg'] = ' Added successfully.';
            $this->output($response);
        } else {
            $response['error'] = 1;
            $response['error_msg'] = 'Somthing went wrong!';
            $this->output($response);
        }
    }

    public function view_student()
    {
        $data = StudentModel::orderBy('id', 'DESC')->where('del_status', 0)->get();
        return view('student_view', ['pagedata' => $data]);
    }

    public function view_detail_student(string $id)
    {
        $data['pagedata'] = StudentModel::where('id', $id)->first();
        return view('student_view_detail', $data);
    }

    // public function updateagentstatus(Request $request)

    // {
    //     $access = AgentModel::where("id", request('id'));
    //         $data = array(
    //             "status" => $request->status,
    //         );
    //     $res = $access->update($data);
    //     if ($res) {
    //         return redirect()->back();
    //     } 
    // }





    public function editstudent(string $id)



    {



        $data['pagedata'] = StudentModel::where('id', $id)->first();



        return view('student_edit', $data);
    }









    public function updatestudent(Request $request)

    {



        $access = StudentModel::where("id", request('id'));





        // Validate the input data

        $validatedData = $request->validate([

            'email' => 'required|unique:student,email,' . $request->id . ',id,del_status,0',

            'phone_no' => 'required|min:10|max:14|unique:student,phone_no,' . $request->id . ',id,del_status,0',



        ]);





        if ($request->file('photo') != "") {



            $image =  time() . '_' . $request->file('photo')->getClientOriginalName();



            $path = base_path() . '/public/uploads/student_photo/';



            $request->file('photo')->move($path, $image);





            $data = array(



                "name" =>  $request->name,

                "father_name" =>  $request->father_name,

                "email" =>  $request->email,

                "phone_no" =>  $request->phone_no,

                "mother_name" =>  $request->mother_name,

                "qualification" =>  $request->qualification,

                "nationality" =>  $request->nationality,

                "gender" =>  $request->gender,

                "address" =>  $request->address,

                "photo" =>  $image,

                "status" => $request->status,



            );
        } else {

            $data = array(



                "name" =>  $request->name,

                "father_name" =>  $request->father_name,

                "email" =>  $request->email,

                "phone_no" =>  $request->phone_no,

                "mother_name" =>  $request->mother_name,

                "qualification" =>  $request->qualification,

                "nationality" =>  $request->nationality,

                "gender" =>  $request->gender,

                "address" =>  $request->address,

                "status" => $request->status,

            );
        }





        // Update the data



        $res = $access->update($data);



        if ($res) {



            return redirect('view_student')->with('success', 'Updated Successfully.');
        } else {



            return redirect()->back()->withErrors(['' => 'Somthing went wrong!']);
        }
    }





    public function deletestudent(Request $request)



    {



        $data = StudentModel::where('id', Request('id'));



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





    public function application()
    {
        $where = array('universities.del_status' => 0, 'universities.status' => 1, 'student_application.del_status' => 0);
        $data = DB::table('student_application')
            ->join('universities', 'universities.id', '=', 'student_application.uni_id')
            ->join('student', 'student.id', '=', 'student_application.stu_id')
            ->join('courses', 'courses.id', '=', 'student_application.course_id')
            ->join("university_courses", function ($join) {
                $join->on("university_courses.course_id", "=", "student_application.course_id")
                    ->on("university_courses.uni_id", "=", "student_application.uni_id");
            })
            ->select('student.agent_id','universities.uni_name', 'student.name as stu_name', 'courses.course_name', 'university_courses.anul_fee_without_hos as anl_fee', 'university_courses.reg_fees', 'student_application.status as app_status', 'student_application.id as app_id', 'student_application.created_at as app_date','student.id as stu_id', 'courses.id as course_id', 'universities.id as uni_id')
            ->where($where)
            ->get();



        return view('application_view', ['pagedata' => $data]);
    }
    // application end


    public function update_application_status(Request $request)
    {
        $status = $request->status;
        $app_id = $request->app_id;

        $res = Application_model::where('id', $app_id)->update(array('status' => $status));

        if ($res) {
            $where = array('universities.del_status' => 0, 'universities.status' => 1, 'student_application.del_status' => 0, 'student_application.id' => $app_id);
            $data = DB::table('student_application')
                ->join('universities', 'universities.id', '=', 'student_application.uni_id')
                ->join('student', 'student.id', '=', 'student_application.stu_id')
                ->join('courses', 'courses.id', '=', 'student_application.course_id')
                ->join("university_courses", function ($join) {
                    $join->on("university_courses.course_id", "=", "student_application.course_id")
                        ->on("university_courses.uni_id", "=", "student_application.uni_id");
                })
                ->select('universities.uni_name', 'student.name as stu_name', 'student.id as stu_id', 'student.agent_id', 'courses.course_name', 'courses.id as course_id', 'universities.id as uni_id', 'university_courses.anul_fee_without_hos as anl_fee', 'university_courses.reg_fees', 'student_application.status as app_status', 'student_application.id as app_id', 'student_application.created_at as app_date', 'courses.course_duration_year as dur_year', 'courses.course_duration_sem as dur_sem', 'courses.course_duration_month as dur_month')
                ->where($where)
                ->first();

                $agentData = 0;

                if($data->agent_id != ""){

                    $agentData = AgentModel::where('id', $data->agent_id)->first();
                } 
               


            $response['success'] = 1;
            $response['status'] = $status;
            $response['data'] = $data;
            $response['agent'] = $agentData;
            $this->output($response);
        } else {
            $response['error'] = 1;
            $response['error_msg'] = 'Somthing went wrong!';
            $this->output($response);
        }
    }

    public function update_enquiry_status(Request $request)
    {
        $status = $request->status_val;
        $enc_id = $request->enquiry_id;

        $res = Enquiry::where('id', $enc_id)->update(array('status' => $status));

        if ($res) {

            $response['success'] = 1;
            $response['msg'] = "Status Updated Successfully";

            $this->output($response);
        } else {
            $response['error'] = 1;
            $response['error_msg'] = 'Somthing went wrong!';
            $this->output($response);
        }
    }

    public function get_agent_student(Request $request)
    {
        $agent_id = $request->agentid;
        $res = StudentModel::where('agent_id', $agent_id)->get();
        if ($res) {
            $response['success'] = 1;
            $response['success_msg'] = ' Added successfully.';
            $response['data'] = $res;
            $this->output($response);
        } else {
            $response['error'] = 1;
            $response['error_msg'] = 'Somthing went wrong!';
            $this->output($response);
        }
    }

    public function get_student_application(Request $request)
    {
        $stu_id = $request->stu_id;
        $where = array('student_application.del_status' => 0, 'student.id' => $stu_id);
        $data = DB::table('student_application')
            ->join('courses', 'courses.id', '=', 'student_application.course_id')
            ->join('universities', 'universities.id', '=', 'student_application.uni_id')
            ->join('student', 'student.id', '=', 'student_application.stu_id')
            ->select('student_application.status as application_status',  'courses.course_name', 'student.name as stu_name', 'universities.uni_name')
            ->where($where)
            ->get();

        if ($data) {
            $response['success'] = 1;
            $response['data'] = $data;
            $this->output($response);
        } else {
            $response['error'] = 1;
            $response['error_msg'] = 'Somthing went wrong!';
            $this->output($response);
        }
    }


    // offer letter

    public function offer_letter()
    {

        return view('uploade_ol');
    }

    public function upload_offer_letter(Request $request)
    {
        $stu_id = $request->stu_id;
        $uni_id = $request->uni_id;
        $course_id = $request->course_id;

        if ($request->file('offer_letter') != "") {

            $offerletter =  time() . '_' . $request->file('offer_letter')->getClientOriginalName();

            $path = base_path() . '/public/uploads/offer_letter/';

            $request->file('offer_letter')->move($path, $offerletter);


            $data = array(

                "stu_id" => $stu_id,
                "uni_id" => $uni_id,
                "course_id" => $course_id,
                "offer_letter" => $offerletter,
            );
        } else {
            $data = array(

                "stu_id" => $stu_id,
                "uni_id" => $uni_id,
                "course_id" => $course_id,
            );
        }
        $res = OfferLetter::create($data);
        if ($res) {
            return redirect()->back()->with('success', 'Offer Letter Uploaded Successfully.');
        } else {
            return redirect()->back()->withErrors(['error' => 'Somthing went wrong!']);
        }
    }

    public function update_student_status(Request $request)
    {
        $student_id = $request->student_id;
        $status = $request->status;
        $res = StudentModel::where('id', $student_id)->update(array('status' => $status));
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



    public function gen_doc_pdf(Request $request)
    {
        $stu_id = $request->stu_id;
        $course_id = $request->course_id;
        $uni_id = $request->uni_id;

        $form_data = array(
            'stu_id' => $stu_id,
            'course_id' => $course_id,
            'uni_id' => $uni_id,
        );

       

        $where = array('universities.del_status' => 0, 'universities.status' => 1, 'student_application.del_status' => 0, 'student.id' => $stu_id, "courses.id" => $course_id, 'universities.id' => $uni_id);

        $response = DB::table('student_application')
            ->leftJoin('universities', 'universities.id', '=', 'student_application.uni_id')
            ->leftJoin('student', 'student.id', '=', 'student_application.stu_id')
            ->leftJoin('agents', 'agents.id', '=', 'student.agent_id')
            ->leftJoin('student_document', 'student_document.stu_id', '=', 'student_application.stu_id')
            ->leftJoin('courses', 'courses.id', '=', 'student_application.course_id')
            ->leftJoin("university_courses", function ($join) {
                $join->on("university_courses.course_id", "=", "student_application.course_id")
                    ->on("university_courses.uni_id", "=", "student_application.uni_id");
            })
            ->select('universities.uni_name', 'student_document.global_url', 'student_document.certificate_10 as matric', 'student_document.certificate_12 as plustwo', 'student_document.certificate_other as otherdoc', 'student.name as stu_name', 'student.phone_no as stu_phone', 'student.email as stu_email', 'courses.course_name', 'university_courses.anul_fee_without_hos as anl_fee', 'university_courses.reg_fees', 'student_application.status as app_status', 'student_application.id as app_id', 'universities.uni_logo', 'student_application.created_at as app_date', 'student.id as stu_id', 'courses.id as course_id', 'universities.id as uni_id')
            ->where($where)
            ->first();

            $pdf = 'PDF'::loadView('new_pdf',array("object"=>$response,"form"=>$form_data))->setOptions(['defaultFont' => 'sans-serif']);


        if ($response) {
            return $pdf->stream('StudentDetail.pdf');
      
            return redirect()->back()->with('success', 'Documents Submitted Successfully');
          } else {
      
            return redirect('view_application')->withErrors(['' => 'Somthing went wrong!']);
          }
    }
}
