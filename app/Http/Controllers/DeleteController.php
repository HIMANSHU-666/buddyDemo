<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
   

    public function output($Return = array())
    {
        @header('Cache-Control: no-cache, must-revalidate');
        @header("Content-Type: application/json; charset=UTF-8");
        exit(json_encode($Return));
        die;
    }
    

    public function deleterecord(Request $request)
    {
      
        $data=DB::table($request->table_name)->where('id', $request->id)->update(['del_status'=>1]);
       if($data) {

            $response['success'] = 1;
            $response['success_msg'] = ' Deleted successfully.';
            $this->output($response);
          
        }
        else {
            $response['error'] = 1;
            $response['error_msg'] = 'Somthing went wrong!';
            $this->output($response);
          
        }

    }

}
