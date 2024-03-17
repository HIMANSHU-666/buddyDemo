<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\UniversityCoursesModel;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class UniversityCoursesController extends Controller
{
    public function __construct()
    {
        $this->UniversityCoursesModel = new UniversityCoursesModel();
    }
    
    public function output($Return = array())
    {
        @header('Cache-Control: no-cache, must-revalidate');
        @header("Content-Type: application/json; charset=UTF-8");
        exit(json_encode($Return));
        die;
    }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
    
    public function index()
    {
        $data = University::orderBy('id', 'DESC')->first();
        $Country = Country::orderBy('id', 'DESC')->get();

        return view('create_uni', array('pagedata' => $data, 'country' => $Country));
    }
    public function viewImportPage()
    {
        return view('importPage');
    }
    
    // Import function 
    public function import() 
    {
        Excel::import(new UsersImport, 'users.xlsx');
        
        return redirect('/')->with('success', 'All good!');
    }
    
    public function uniCoursesAdd(Request $request)
    {
        // $subimglog=$request->file('u_logo');
        //  if (isset($subimglog)) {
        //     $image = time() . '_'.$subimglog->getClientOriginalName();
        //     $path = base_path() . '/public/uploads/university_logo/';
        //     $subimglog->move($path, $image);
        // } 
        // else 
        // {
        //     $image = "";
        // }
        
        // Create a new University record
        $data =  $this->UniversityCoursesModel ::create([
            "uni_code" => $request->uni_code,
            "uni_logo" => $image,
            'id'=> $request->uni_code,
            // 'uni_id',	
            // 'course_id',	
            // 'ps_fee_with_hos',	
            // 'ps_fee_without_hos',	
            // 'anul_fee_with_hos',	
            // 'anul_fee_without_hos',	
            // 'status',	
        ]);

        if($university)
        {
            // Create Certificate records associated with the University
            $subdataimg=[];
            $certi_name=$request->certi_name;
            $count=count($certi_name);
            for ($j = 0; $j < $count; $j++) {
         
              $subimg = $request->file('certi_url');
              if (isset($subimg[$j])) {
                 $subimage =  time() . '_' . $subimg[$j]->getClientOriginalName();
                 $path = base_path() . '/public/uploads/certificate/';
                 $subimg[$j]->move($path, $subimage);
              } 
              else {$subimage = "";}
       
              $subdataimg[] = [
                 'uni_code' =>$request->uni_code, 
                 'certi_name' =>$certi_name[$j],
                 'certi_url' => $subimage
              ];
             }
    
            $res=  $this->Certificate::insert($subdataimg);
            
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
        
        else {
                $response['error'] = 1;
                $response['error_msg'] = 'Somthing went wrong!';
                $this->output($response);
              
            }
    }
    
}