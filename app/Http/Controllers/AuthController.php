<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login_admin()
    {
        if(!empty(Auth::check()) && Auth::user()->is_admin == 1)
        {
            return view("admin/dashboard");
        }
        return view('admin.auth.login');
    }
    public function auth_login_admin(Request $request){
        $remember = !empty($request->remember) ? true : false;
        if(Auth::attempt(['email'=> $request->email, 'password' => $request->password], $remember))
        {
            // Check if the authenticated user is an admin
            if(Auth::user()->is_admin == 1) {
                return redirect('admin/dashboard')->with('success','Success login');
            } else {
                // Redirect non-admin users to the homepage
                Auth::logout();
                return redirect('admin/dashboard')->with('error','You are not authorized to access this page');
            }
        }
        else
        {
            return redirect()->back()->with('error','Please enter correct email and password');
        }
    }

    public function logout_admin()
    {
        Auth::logout();
        return view('admin.auth.login');
    }
}
