<?php



namespace App\Http\Controllers;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Home;

use App\Models\ProfileModel;

use Illuminate\Support\Facades\Log;



class ProfileController extends Controller

{

   

    public function profile()
    { 
        $data['pagedata'] = ProfileModel::where('id',1)->first();
        return view('profilesetting',$data);
    }


    public function updatesetting(Request $request)
    {
        $access = ProfileModel::where('id',1);

        // Validate the input data

        $validatedData = $request->validate([
            'username' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
        ]);

        if ($request->file('profile_image') != "") 
        {
            $image =  time() . '_' . $request->file('profile_image')->getClientOriginalName();
            $path = base_path() . '/public/uploads/profile_image/';
            $request->file('profile_image')->move($path, $image);

            $data = array(
                "username" =>  $request->username,
                "firstname" =>  $request->firstname,
                "lastname" =>  $request->lastname,
                "email" =>  $request->email,
                "profile_image" =>  $image,  
            );
        } 
        else 
        {
            $data = array(
                "username" =>  $request->username,
                "firstname" =>  $request->firstname,
                "lastname" =>  $request->lastname,
                "email" =>  $request->email,
            );

        }

        // Update the data
        $res = $access->update($data);
        // $res = $access->update($validatedData);
        if ($res) {
            return redirect()->back()->with('success', 'Updated successfully.');
        } else {
            return redirect()->back()->withErrors(['' => 'Somthing went wrong!']);
        }
    }



      

    public function settings()

    {
        $data['pagedata'] = ProfileModel::where('id',1)->first();
        return view('settingpage',$data);
    }



    public function updatesitesetting(Request $request)

    {

        $access = ProfileModel::where('id',1);

        // Validate the input data

        $validatedData = $request->validate([

            

            'firstname' => 'required',

            'lastname' => 'required',

            'email' => 'required',

            'phone_number' => 'required',

            'address' => 'required',

        ]);



        if ($request->file('image') != "") {

            $image =  time() . '_' . $request->file('image')->getClientOriginalName();

            $path = base_path() . '/public/uploads/logo/';

            $request->file('image')->move($path, $image);



            $data = array(

               

                "firstname" =>  $request->firstname,

                "lastname" =>  $request->lastname,

                "email" =>  $request->email,

                "phone_number" =>  $request->phone_number,

                "address" =>  $request->address,

                "image" =>  $image,  

            );



        } else {

            $data = array(

              

                "firstname" =>  $request->firstname,

                "lastname" =>  $request->lastname,

                "email" =>  $request->email,

                "phone_number" =>  $request->phone_number,

                "address" =>  $request->address,

            );

        }





        // Update the data





        $res = $access->update($data);







        // $res = $access->update($validatedData);

        if ($res) {

            return redirect()->back()->with('success', 'Updated successfully.');

        } else {

            return redirect()->back()->withErrors(['' => 'Somthing went wrong!']);

        }

    }





}

