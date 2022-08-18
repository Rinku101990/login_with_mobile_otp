<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Session;
use Config;
use App\Models\User;
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
            'mobile' => 'required|regex:/[0-9]{10}/|digits:10'
        ]);

        $user = User::where('mobile', $request->input('mobile'))->first();
        if(!empty($user)){
            if($request->input('mobile') == $user->mobile && $user->registerAs =='admin' && $user->status=='active') {
                $otp = mt_rand(100000,999999);
                $user->otp = $otp;
                User::where('id',$user->id)->update(['otp'=>$otp]);
                $message = "Your Otp is ".$otp;
                
                // Update OTP in database //

                return redirect(route('adminLogin'))->withInput()->with(['success'=>$message,'action'=>1]);
            }else{
                return redirect(route('adminLogin'))->withInput()->with(['success'=>'Please Register First mobile number.', 'action'=>0]);
            }
        }else{
            return redirect(route('adminLogin'))->withInput()->with(['success'=>'Mobile number not found.!!','action'=>0]);
        }
    }

    public function otpVerify(Request $request)
    {
        Validator::make($request->all(), [
            'mobile' => ['required'],
            'otp' => ['required']
        ])->validate();
        $user = User::where('mobile',$request->mobile)->where('registerAs','admin')->where('otp',$request->otp)->first(); 
        if(!empty($user)){
            if($request->input('mobile') == $user->mobile && $user->registerAs =='admin' && $user->status=='active' && $user->otp == $request->otp) {
                if(auth()->guard('admin')->attempt(['email' => $user->email,'password' => $user->read_password,'registerAs' => 'admin','status' => 'active'])){
                    User::where('id',$user->id)->update(['otp'=>$request->otp]);
                    auth()->guard('admin')->user();
                    return redirect()->route('admin.dashboard')->with('success','You are Login successfully!!');
                }else{
                    return redirect(route('adminLogin'))->withInput()->with(['success'=>'Something went wrongs','action'=>0]);
                }
            }
        }else{
            return redirect(route('adminLogin'))->withInput()->with(['success'=>'Something went wrongs','action'=>0]);
        }
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect(route('adminLogin'))->with('success','You are logout successfully');
    }
}
