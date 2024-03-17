<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ChangePasswordController extends Controller
{
    public function showChangePasswordForm()
    {
        return view('change_pass');
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password'=> 'required',
            'password_confirmation' =>  'required|same:new_password',
        ]);
        $current_user=auth()->user();
        
        if (Hash::check($request->old_password,$current_user->password))
        {
            $current_user->update(['password'=>bcrypt($request->new_password) ]);
            return redirect('login')->with('success','password Successfully UPDATED');
        }
        
        else
        {
            return redirect()->back()->with('error','OLD password does not match');
        }
        
    }
}
