<?php

namespace App\Http\Controllers;

use App\Models\Course_Category;
use App\Models\Courses;
use App\Models\Course_Type;
use App\Models\UniversityCoursesModel;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{

    public function __construct()
    {
        $this->Course_Category = new Course_Category();
        $this->Course_Type = new Course_Type();
        $this->Courses = new Courses();
    }


    public function output($Return = array())
    {
        @header('Cache-Control: no-cache, must-revalidate');
        @header("Content-Type: application/json; charset=UTF-8");
        exit(json_encode($Return));
        die;
    }

    //view Courses
    // public function viewCoursesData()
    // {
    //     $data = Courses::orderBy('id', 'DESC')->where('del_status', 0)->get();
    //     return view('view_course', ['pagedata' => $data]);
    // }

    public function viewCoursesData()

    {

        $where = array('courses.del_status' => 0);
        $data['pagedata'] = DB::table('courses')
            ->join('course_type', 'course_type.id', '=', 'courses.course_type')
            ->select('courses.*',  'course_type.type as courses_course_type')
            ->where($where)
            ->orderBy('courses.id', 'desc')
            ->get();

        return view('view_course', $data);
    }

    public function viewMapCourses(string $id)
    {
        $data['categorydata'] = Course_Category::orderBy('id', 'DESC')->where('del_status', 0)->get();
        $data['university'] = University::where('id', $id)->first();
        $data['Typedata'] = Course_Type::orderBy('id', 'DESC')->where('del_status', 0)->get();

        $where = array('courses.del_status' => 0);

        $data['pagedata'] = DB::table('courses')
            ->join('course_category', 'courses.course_category', '=', 'course_category.id')
            ->join('course_type', 'course_type.id', '=', 'courses.course_type')
            ->select('courses.id', 'courses.course_name', 'course_category.course_category', 'course_type.type')
            ->where($where)
            ->orderBy('courses.id', 'desc')
            ->get();


        return view('map_courses', $data);
    }


    public function viewMappedCourses(string $id)
    {
        $data['university'] = University::where('id', $id)->first();
        $where = array('university_courses.del_status' => 0, 'uni_id' => $id);
        $data['pagedata'] = DB::table('university_courses')
            ->join('courses', 'courses.id', '=', 'university_courses.course_id')
            ->select('university_courses.*',  'courses.course_name as uni_course', 'courses.id as course_id', 'university_courses.uni_id as university_id')
            ->where($where)
            ->orderBy('university_courses.id', 'desc')
            ->get();

        return view('view_map_courses', $data);


        // $data['course'] = UniversityCoursesModel::orderBy('id', 'DESC')->where('del_status', 0)->get();



        // return view('view_map_courses',$data);
    }


    public function add()
    {
        $data['pagedata'] = Course_Category::orderBy('id', 'DESC')->where('del_status', 0)->get();
        $data['course_type'] = Course_Type::orderBy('id', 'DESC')->where('del_status', 0)->get();

        return view('create_course', $data);
    }

    // ADD
    public function store(Request $request)
    {
        $data = array(
            'course_category' => $request->course_category,
            "course_name" => $request->course_name,
            "course_trade" => $request->course_branch,
            "course_code" => rand(),
            "course_type" => $request->course_type,
            "course_eligibility" => implode(',', $request->course_eligibility),
            "course_duration_year" => $request->course_duration_year,
            "course_duration_sem" => $request->course_duration_sem,
            "course_duration_month" => $request->course_duration_month,
            "course_description" => $request->course_description,
        );

        $res = $this->Courses::create($data);

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


    public function editourse($id)
    {
        $course = Courses::find($id);
        if (!$course) {
            return redirect('view_courses')->withErrors(['' => 'Course not found.']);
        } else {
            $url = url('/course/update') . "/" . $id;
            $title = "Update Course";
            $data = compact('course', 'url', 'title');
            return view('edit_course', ['course' => $course]);
        }
    }

    public function updateCourse(Request $request, $id)
    {
        // Find the course by ID
        $course = Courses::find($id);

        if (!$course) {
            return redirect()->back()->withErrors(['' => 'Course not found.']);
        }

        $course->course_name = $request->input('course_name');
        $course->course_code = $request->input('course_code');
        $course->course_type = $request->input('course_type');
        $course->course_eligibility = $request->input('course_eligibility');
        $course->course_duration_year = $request->input('course_duration_year');
        $course->course_duration_sem = $request->input('course_duration_sem');
        $course->course_duration_month = $request->input('course_duration_month');
        $course->status = $request->input('status');
        $course->del_status = $request->input('del_status');

        $res = $course->save();

        if ($res) {
            return redirect()->back()->with('success', 'Course updated successfully.');
        } else {
            return redirect()->back()->withErrors(['' => 'Something went wrong!']);
        }
    }



    public function show($id)
    {
        // Retrieve the course details by the provided ID
        $course = Courses::find($id);

        if (!$course) {
            return view('course.not_found'); // Create a not found view
        }

        return view('show_courses', ['course' => $course]);
    }




    public function addMapCourses(Request $request)

    {

        $cat_course_id = $request->course_id;

        $cat_ps_fee_with_hos = $request->ps_fee_with_hos;

        $cat_ps_fee_without_hos = $request->ps_fee_without_hos;

        $cat_anul_fee_with_hos = $request->anul_fee_with_hos;

        $cat_anul_fee_without_hos = $request->anul_fee_without_hos;

        $cat_reg_fees = $request->reg_fees;

        $subdata = [];


        $count = count($cat_course_id);

        for ($i = 0; $i < $count; $i++) {


            $subdata[] = [
                'uni_id' => $request->id,

                'course_id' => $cat_course_id[$i],

                'ps_fee_with_hos' => $cat_ps_fee_with_hos[$i],

                'ps_fee_without_hos' => $cat_ps_fee_without_hos[$i],

                'anul_fee_with_hos' => $cat_anul_fee_with_hos[$i],

                'anul_fee_without_hos' => $cat_anul_fee_without_hos[$i],

                'reg_fees' => $cat_reg_fees[$i],

            ];
        }

        $subres = UniversityCoursesModel::insert($subdata);


        if ($subres) {

            return redirect()->back()->with('success', 'Submitted successfully.');
        } else {

            return redirect()->back()->withErrors(['' => 'Somthing went wrong!']);
        }
    }

    public function editcoursedata(string $id)
    {

        $data['pagedata'] = Courses::where('id', $id)->first();
        $data['type'] = Course_type::orderBy('id', 'DESC')->where('del_status', 0)->get();

        return view('course_edit', $data);
    }



    public function updatecoursedata(Request $request)

    {

        $access = Courses::where("id", request('id'));

        $data = array(
            "course_name" =>  $request->course_name,
            "course_type" =>  $request->course_type,
            "course_code" => $request->course_code,
            "course_eligibility" => $request->course_eligibilty,
            "course_duration_year" => $request->coursduration_year,
            "course_duration_sem" => $request->coursduration_sem,
            "course_duration_month" => $request->coursduration_month,
            "status" => $request->status

        );

        $res = $access->update($data);

        if ($res) {

            return redirect('view_courses')->with('success', 'Updated successfully.');
        } else {

            return redirect()->back()->withErrors(['' => 'Somthing went wrong!']);
        }
    }

    public function delMapCourses(Request $request)
    {
        $course_id = $request->course_id;
        $university_id = $request->university_id;
        $where = array('uni_id' => $university_id, 'course_id' => $course_id);
        $res = UniversityCoursesModel::where($where)->update(array('del_status' => 1));

        if ($res) {
            $response['success'] = 1;
            $response['success_msg'] = 'Deleted successfully.';
            $this->output($response);
        } else {
            $response['error'] = 1;
            $response['error_msg'] = 'Somthing went wrong!';
            $response['crs_id'] = $course_id;
            $response['uni_id'] = $university_id;
            $this->output($response);
        }
    }

    public function edit_mapcrs(string $crs_id, string $uni_id)
    {

        $where = array('university_courses.del_status' => 0, 'university_courses.uni_id' => $uni_id, 'university_courses.course_id' => $crs_id);
        $data['pagedata'] = DB::table('university_courses')
            ->join('courses', 'courses.id', '=', 'university_courses.course_id')
            ->select('university_courses.*',  'courses.course_name as uni_course', 'courses.id as course_id', 'university_courses.uni_id as university_id', 'university_courses.ps_fee_with_hos', 'university_courses.ps_fee_without_hos', 'university_courses.anul_fee_with_hos', 'university_courses.anul_fee_without_hos', 'university_courses.reg_fees')
            ->where($where)
            ->first();

        return view('edit_map_courses', $data);
    }

    public function updateMapCourses(Request $request)
    {
        $course_id = $request->crs_id;
        $university_id = $request->uni_id;
        $where = array('uni_id' => $university_id, 'course_id' => $course_id);
        $res = UniversityCoursesModel::where($where)->update(array(
            'ps_fee_with_hos' => $request->ps_fee_with_hos,
            'ps_fee_without_hos' => $request->ps_fee_without_hos,
            'anul_fee_with_hos' => $request->anul_fee_with_hos,
            'anul_fee_without_hos' => $request->anul_fee_without_hos,
            'reg_fees' => $request->reg_fees
        ));

        if ($res) {
            return redirect()->back()->with('success', 'Updated successfully.');
        } else {
            return redirect()->back()->withErrors(['' => 'Somthing went wrong!']);
        }
    }

    public function checkCourse(Request $request){
        $course_id = $request->course_id;
        $uni_id = $request->university_id;
        $where = array('uni_id' => $uni_id, 'course_id' => $course_id);
        $res = UniversityCoursesModel::where($where)->first();

        if ($res) {
            $response['success'] = 0;
            $this->output($response);
        } else {
            $response['sucess'] = 1;
            $this->output($response);
        }
    }

    public function update_course_status(Request $request)
    {
        $course_id = $request->course_id;
        $status = $request->status;
        $res = Courses::where('id', $course_id)->update(array('status' => $status));
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
}
