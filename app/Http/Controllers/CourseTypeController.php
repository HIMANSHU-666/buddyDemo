<?php


namespace App\Http\Controllers;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Home;

use Illuminate\Support\Facades\Log;


use App\Models\Course_Type;



class CourseTypeController extends Controller
{
    
    public function __construct()
        {
            $this->Course_Type = new Course_Type();
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
        $data['pagedata'] =$this->Course_Type ::orderBy('id', 'DESC')->where('del_status',0)->get();
        return view('course_type', $data);
    }
    
    public function add(Request $request)
    {
        if ($request->file('ct_icon')!='') {
            $image =  time() . '_' . $request->file('ct_icon')->getClientOriginalName();
            $path = base_path() . '/public/uploads/course_type_icon/';
            $request->file('ct_icon')->move($path, $image);
         }
         else
         {
             $image="";
         }
        
        $data=[
            "type" =>  $request->course_type,
            "course_eligibility" =>  implode(' , ',$request->course_eligibility),'course_category'=>$request->course_category,
            'ctype_icon'=>$image,
        ];
       
  
         $res =$this->Course_Type::create($data);
         
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
    
   //get_course_eli
   
    
    public function get_course_eli(Request $request)
    {
        $array=array('del_status'=>0,'id'=>$request->id);
          
        $data =$this->Course_Type ::orderBy('id', 'DESC')->where($array)->first();
        $this->output($data);
    }
   
   
}
