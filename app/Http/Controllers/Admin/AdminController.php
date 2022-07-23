<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin()
    {
        return view('admin.home');
    }
    public function logout()
    {
        Auth::logout();

        $notification = array('message' => 'You are logged out !', 'alert-type' => 'success');

        return redirect()->route('admin.login')->with($notification);
    }


    public function PasswordChange()
    {
        return view('admin.profile.password_change');
    }

    // PasswordChange
    public function PasswordUpdate(Request $request)
    {

        $validated = $request->validate([

            'old_password' => 'required',
            'password' => 'required|min:3|confirmed',
        ]);
        $current_password = Auth::user()->password;  // login user password get

        $oldpass = $request->old_password; // old password get form input field
        $new_password = $request->password; // new password get form new password
        if (Hash::check($oldpass, $current_password)) { // checking oldpassword and new password same or not
            $user = User::findOrFail(Auth::id());
            $user->password = Hash::make($request->password); // current user password hashing
            $user->save(); // finally save the password
            Auth::logout(); // logout the admin user redirect and login panel not user login panel
            $notification = array('messege' => 'Your password Changed', 'alert-type' => 'success');
            return redirect()->route('admin.login')->with($notification);
        } else {
            $notification = array('messege' => 'Old password does not mached', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }
}
