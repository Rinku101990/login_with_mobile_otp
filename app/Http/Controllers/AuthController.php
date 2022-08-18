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
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
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
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $userData = ([
            'name'=>$request->name,
            'email'=> $request->email,
            'password'=>bcrypt($request->password),
            'read_password'=>$request->password,
            'mobile'=> $request->mobile
        ]);
        $user = User::create($userData);
        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
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
