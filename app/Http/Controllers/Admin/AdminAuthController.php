<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminAuthController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin/dashboard';

    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => 'logout']);
    }

    public function getLogin()
    {     
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password'),'registerAs' => 'admin','status' => 'active']))
        {
            $user = auth()->guard('admin')->user();
            return redirect()->route('admin.dashboard')->with('success','You are Login successfully!!');
            
        } else {
            return back()->with('error','your username and password are wrong.');
        }
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect(route('adminLogin'))->with('success','You are logout successfully');
    }
}
