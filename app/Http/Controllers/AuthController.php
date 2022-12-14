<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\File;
use Validator;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
    */
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register','sentcode','verifyotp']]);
    }
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        if (! $token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->createNewToken($token);
    }

    /**
     * Sent OTP
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function sentcode(Request $request){
    	$validator = Validator::make($request->all(), [
            'mobile' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::where('mobile', $request->mobile)->first();
        if(!empty($user)){
            if($request->mobile == $user->mobile && $user->registerAs =='user' && $user->status=='active') {
                $otp = mt_rand(100000,999999);
                $user->otp = $otp;
                User::where('id',$user->id)->update(['otp'=>$otp]);
                $message = "Your Otp is ".$otp;
                // Update OTP in database //
                //$user = User::create($message);
                return response()->json([
                    'mobile' => $request->mobile,
                    'otp' => $message,
                    'message'=>'Mobile OTP Created'
                ], 201);
            }
        }
    }

    /**
     * Verify OTP
     * 
     * @return \Illuminate\Http\JsonResponse
     */ 
    public function verifyotp(Request $request){
    	$validator = Validator::make($request->all(), [
            'mobile' => 'required',
            'otp' => 'required|min:6|max:6',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $user = User::where('mobile',$request->mobile)->where('registerAs','user')->where('otp',$request->otp)->first(); 
        if(!empty($user)){
            if($request->mobile == $user->mobile && $user->registerAs =='user' && $user->status=='active' && $user->otp == $request->otp) {
                if(auth()->guard('admin')->attempt(['email' => $user->email,'password' => $user->read_password,'registerAs' => 'user','status' => 'active'])){
                    $token = auth()->attempt(['email' => $user->email,'password' => $user->read_password]);
                    return $this->createNewToken($token);
                }
            }else{
                return response()->json(['error' => 'Unauthorized'], 401);
            }
        }else{
            return response()->json(['error' => 'Unauthorized'], 401);
        }

    }

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:6',
            'mobile'=>'required|max:10|unique:users'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $userData = array(
            'name'=>$request->name,
            'email'=> $request->email,
            'password' => bcrypt($request->password),
            'read_password' => $request->password,
            'mobile'=> $request->mobile
        );
        $user = User::create($userData);

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user->makeHidden('read_password')->toArray() // Hide Particular column
        ], 201);
    }

     /**
     * document list.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function documentslist()
    {
        return File::all();
    }

    /**
     * Upload a document.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function documents(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'file' => ['required', 'mimes:jpeg,jpg,png,svg'],
            'name' => ['required'],
        ]);
    
        $name = rand().time().'.'.$request->file('file')->getClientOriginalExtension();
        $path = $request->file('file')->store('public/files');

        try{
            $files = new File;
            $files->name = $name;            
            $files->path = $path;
            if($files->save()){
                return response()->json([
                    'message' => 'File Created Successfully',
                    'file' => $files
                ], 201);
            }
        }catch(\Exception $e){
            dd($e);
        }
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout() {
        auth()->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile() {
        return response()->json(auth()->user());
    }
    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}
