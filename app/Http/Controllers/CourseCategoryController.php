<?php



namespace App\Http\Controllers;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Home;

use App\Models\Course_Category;
use App\Models\Course_Type;

use Illuminate\Support\Facades\Log;





class CourseCategoryController extends Controller
{
    
    public function __construct()
        {
            $this->Course_Category = new Course_Category();
        }
        
        
     public function output($Return = array())
    {
        @header('Cache-Control: no-cache, must-revalidate');
        @header("Content-Type: application/json; charset=UTF-8");
        exit(json_encode($Return));
        die;
    }
    
    
    public function show()
    {
        $data['pagedata'] = Course_Category::orderBy('id', 'DESC')->where('del_status',0)->get();
        $data['Typedata'] = Course_Type::orderBy('id', 'DESC')->where('del_status', 0)->get();
        return view('course_category', $data);
    }
    
    // ADD Function
    public function add(Request $request)
    {
         if ($request->file('catlogo')!='') {
            $image =  time() . '_' . $request->file('catlogo')->getClientOriginalName();
            $path = base_path() . '/public/uploads/ctgr_logo/';
            $request->file('catlogo')->move($path, $image);
         }
         else
         {
             $image="";
         }
        
        $data=[
            'course_category'=>$request->course_category,
            'course_type'=>$request->course_type,
            'cate_logo'=>$image,
        ];
       
        $res = $this->Course_Category::create($data);
        
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


    public function update_cat($id)
    {
        $data['catdata'] = Course_Category::find($id);
        $data['Typedata'] = Course_Type::orderBy('id', 'DESC')->where('del_status', 0)->get();
        
        return view('edit_course_cat', $data);
    }


    public function updatecoursecat(Request $request)

    {

        $access = Course_Category::where("id", $request->course_category);

        $data = array(
            "course_category" =>  $request->course_name,
            "course_type" =>  $request->course_type,

        );

        $res = $access->update($data);

        if ($res) {

            return redirect('view_courses')->with('success', 'Updated successfully.');
        } else {

            return redirect()->back()->withErrors(['' => 'Somthing went wrong!']);
        }
    }


   
}
