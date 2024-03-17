<?php

namespace App\Http\Controllers;

use App\Models\University;
use App\Models\Country;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UniversityController extends Controller
{


    public function __construct()
    {
        $this->University = new University();
        $this->Certificate = new Certificate();
        $this->Country = new Country();
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
        $data =University ::orderBy('id', 'DESC')->first();
        $uniid['uni_id']="UNI-00".$data->id+1;
        return view('create_uni',$uniid);
    }



    public function store(Request $request)
    {
        $subimglog = $request->file('uni_logo');
        if (isset($subimglog)) {
            $image = time() . '_' . $subimglog->getClientOriginalName();
            $path = base_path() . '/public/uploads/university_logo/';
            $subimglog->move($path, $image);
        } else {
            $image = "";
        }


        // Create a new University record
        $university = University::create([

            "uni_code" => $request->uni_code,

            "uni_logo" => $image,

            "uni_rank" => $request->uni_rank,

            "center_type" => $request->center_type,

            "uni_clg_type" => $request->uni_clg_type,

            "uni_name" => $request->uni_name,

            "est_year" => $request->est_year,

            "uni_website" => $request->uni_website,

            "uni_desc" => $request->description,

            "uni_email" => $request->uni_email,

            "uni_phone" => $request->uni_phone,

            "status" => 1,

            'source_country' => $request->uni_country,

            'state' => $request->state,

            'distt' => $request->distt,

            'city' => $request->city,

            'near_by' => $request->near_by,
        ]);


        if ($university) {
            // Create Certificate records associated with the University
            $subdataimg = [];
            $certi_name = $request->certi_name;
            $count = count($certi_name);
            for ($j = 0; $j < $count; $j++) {

                $subimg = $request->file('certi_url');
                if (isset($subimg[$j])) {
                    $subimage =  time() . '_' . $subimg[$j]->getClientOriginalName();
                    $path = base_path() . '/public/uploads/certificate/';
                    $subimg[$j]->move($path, $subimage);
                } else {
                    $subimage = "";
                }

                $subdataimg[] = [
                    'uni_code' => $request->uni_code,
                    'certi_name' => $certi_name[$j],
                    'certi_url' => $subimage
                ];
            }

            $res =Certificate::insert($subdataimg);

            if ($res) {
                $response['success'] = 1;
                $response['success_msg'] = ' Added successfully.';
                $this->output($response);
            } else {
                $response['error'] = 1;
                $response['error_msg'] = 'Somthing went wrong!';
                $this->output($response);
            }
        } else {
            $response['error'] = 1;
            $response['error_msg'] = 'Somthing went wrong!';
            $this->output($response);
        }
    }

    


    public function viewForm()
    {
        // $data['pagedata'] =$this->University ::orderBy('id', 'DESC')->where('del_status',0)->get();
        // return view('view_uni', $data);

        $data = University::orderBy('id', 'DESC')->where('del_status', 0)->get();
        return view('view_uni', ['pagedata' => $data]);
    }

    public function show($id)
    {
        $university = University::find($id);

        if (!$university) {
            return redirect()->route('university.home')->with('error', 'University not found');
        } else {
            $url = url('/university') . "/" . $id;
            $title = "Details";
            $data = compact('university', 'url', 'title');
            return view('show_uni')->with($data);
        }
    }

    public function editUniversity($id)
    {
        $university = University::find($id);



        if (!$university) {
            return redirect('view_universities')->withErrors(['' => 'University not found.']);
        } else {
            $url = url('/university/update') . "/" . $id;
            $title = "Update University";
            $data = compact('university', 'url', 'title');
            return view('edit_uni')->with($data);
        }
    }

    public function updateUniversity(Request $request, $id)
    {
        $Certificate = new Certificate;
        $university = University::find($id);
        if (!$university) {
            return redirect()->back()->withErrors(['' => 'University not found.']);
        }

        // Validate the input data
        $request->validate([
            'uni_name' => 'required|string|max:255',
            'est_year' => 'nullable|integer|min:1899|max:' . date('Y'),
            'uni_website' => 'nullable|string|max:255',
            'uni_desc' => 'string',
            'uni_email' => 'required|email|max:255',
            'uni_phone' => 'nullable|string|max:20',


        ]);

        // Initialize an array for updated data
        $updatedData = [
            "center_type" => $request->center_type,
            "uni_clg_type" => $request->uni_clg_type,
            "uni_name" => $request->uni_name,
            "est_year" => $request->est_year,
            "uni_website" => $request->uni_website,
            "uni_desc" => $request->uni_desc,
            "uni_email" => $request->uni_email,
            "uni_phone" => $request->uni_phone,
            "status" => $request->status,
            'source_country' => $request->source_country,
            'state' => $request->state,
            'distt' => $request->distt,
            'city' => $request->city,
            'near_by' => $request->near_by,
        ];

        // Update the university record
        $res = $university->update($updatedData);
        if ($res) {

            $certi_name = $request->certi_name;
            $cer_id = $request->cer_id;
            $count = count($certi_name);
            for ($j = 0; $j < $count; $j++) {

                $subimg = $request->file('certi_url');
                if (isset($subimg[$j])) {
                    $subimage =  time() . '_' . $subimg[$j]->getClientOriginalName();
                    $path = base_path() . '/public/uploads/certificate/';
                    $subimg[$j]->move($path, $subimage);
                } else {
                    $subimage = "";
                }

                $subdataimg = [
                    'certi_name' => $certi_name[$j],
                    'certi_url' => $subimage
                ];

                $access = Certificate::where('id', $cer_id[$j]);
                $res = $access->update($subdataimg);
            }

            return redirect()->back()->with('success', 'University updated successfully.');
        } else {
            return redirect()->back()->withErrors(['' => 'Something went wrong!']);
        }
    }

    public function deleteUniversity($id)
    {
        $university = University::where('id', $id)->first();
        if (!is_null($university)) {
            $university->delete();
        }
        return redirect('view_universities');
    }
    public function updateStatus(Request $request)
    {
        // Update the status based on the request data
        // You can implement your status update logic here
        return response()->json(['message' => 'Status updated successfully']);
    }


    public function update_university_status(Request $request)
    {
        $university_id = $request->university_id;
        $status = $request->status;
        $res = University::where('id', $university_id)->update(array('status' => $status));
        if ($res == true) {
            $response['success'] = 1;
            $response['success_msg'] = "Updated Successfully!";
            $response['status'] = $status;
            $response['uni_id'] = $university_id;
            
            $this->output($response);
        } else {
            $response['error'] = 1;
            $response['error_msg'] = "Something Went Wrong!";
            $this->output($response);
        }
    }

    public function update_university_authorization(Request $request)
    {
        $university_id = $request->university_id;
        $authorized = $request->authorized;
        $res = University::where('id', $university_id)->update(array('authorized' => $authorized));
        if ($res == true) {
            $response['success'] = 1;
            $response['success_msg'] = "Authorization Updated";
            $response['authorized'] = $authorized;
            $this->output($response);
        } else {
            $response['error'] = 1;
            $response['error_msg'] = "Something Went Wrong!";
            $this->output($response);
        }
    }
}
