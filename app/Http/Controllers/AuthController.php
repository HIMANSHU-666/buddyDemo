<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use App\Models\StudentModel;
use App\Models\AgentModel;
use App\Models\Application_model;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }
  
    public function registerSave(Request $request)
    {
        Validator::make($request->all(), [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ])->validate();
  
        User::create([
            'firstname' =>  $request->firstname,
            'lastname' =>  $request->lastname,
            'email' =>  $request->email,
            'password'=>  md5($request->password),
            'level' => 'Admin'
        ]);
  
        return redirect()->route('/')->with('success', 'Register successfully.');;
    }
    public function login()
    {
        return view('auth/login'); // Assuming 'login/action' is the path to your login view
    }
  
    public function loginAction(Request $request)
    {
        // Validate the input data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('home')->withErrors($validator)->withInput();
        }
    
        // Attempt to authenticate the user
        if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            // Authentication successful


            $User= User::where('email', $request->input('email'))->first();

            // Store the user's email in the session
            $request->session()->put('user_email', $User['email']);
            $request->session()->put('first_name', $User['firstname']);
            $request->session()->put('user_id', $User['id']);
            $request->session()->put('user_img', $User['profile_image']);
    
            // Regenerate the session ID for security
            $request->session()->regenerate();
    
            return redirect('/')->with('success', 'Login successfully.');
        }
    
        // Authentication failed
        throw ValidationException::withMessages([
            'email' => trans('auth.failed'),
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();
        $request->session()->regenerateToken();
        return redirect('/');
    }
  

 
    public function index()
    {
        $stu = DB::table('student')->get();
        $agent = DB::table('agents')->get();
        $subagent = DB::table('agents')->where(['agent_type'=> 2, 'del_status' => 0])->get();
        $application = DB::table('student_application')->where('del_status',0)->get();
        $stucount = count($stu);
        $agentcount = count($agent);
        $appcount = count($application);
        $subcount = count($subagent);
        return view('index',compact(['stucount','agentcount','appcount','subcount']));
    }
}