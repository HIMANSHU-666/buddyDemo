<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
   

    public function View()
    {
        // $data = DB::table('student_contact')->select('id', 'name', 'email', 'subject', 'message')->get();
         $data = Contact::orderBy('id', 'DESC')->where('del_status',0)->get();
         return view('view_contact', ['data' => $data]);
     
    }


}