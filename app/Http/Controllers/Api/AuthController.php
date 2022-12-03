<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use stdClass;

class AuthController extends Controller
{
    protected $res, $status;

    function __construct()
    {
        $this->res = new stdClass;
        $this->status = 200;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    function emailLogin(Request $request)
    {

        $res = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if ($res) {
            //logged in
            $user = User::where('email', $request->email)->get()->first();
            $user->token = $user->createToken('API TOKEN')->plainTextToken;
            $this->res->user = $user;
        } else {
            $this->res->error = "Invalid password!";
        }
    }

    function socialLogin(Request $request)
    {
        $res = Auth::attempt(['email' => $request->email, 'google_auth' => $request->auth]);
        if ($res) {
            //logged in
            $user = User::where('email', $request->email)->get()->first();
            $user->token = $user->createToken('API TOKEN')->plainTextToken;
            $this->res->user = $user;
        } else {
            $this->res->error = "No account found!";
        }
    }

    function signUp(Request $request){
        $this->validate($request,[
            'email'=>"required|unique:users",
            'password'=>"required",
            'gender'=>'required',
            'name'=>"required",
            'dob'=>'required',
            
        ],[
            'email.required'=>"Email is required!",
            'email.unique'=>"This email is already taken!",
            'password.required'=>"Password is required!",
            'gender.required'=>"Gender is required!",
            'dob.required'=>'Date of birth is required!',
        ]);

        $data=$request->only('name','email','gender','dob');
        $data['password']=Hash::make($request->password);
        $user=User::create($data);
        $user->token=$user->createToken("API TOKEN")->plainTextToken;
        $this->res->user=$user;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'grantType' => 'required'
            ], [
                'grantType.required' => "Unspecified attempted!"
            ]);

            if ($request->input('grantType') == "email-pass") {
                $this->validate($request, [
                    'email' => "required|exists:users",
                    'password' => "required"
                ], [
                    'email.required' => "Email is required!",
                    'email.exists' => "No account found with that email!",
                    'password.required' => "Password is required!"
                ]);

                $this->emailLogin($request);
            } else if ($request->input('grantType') == 'google') {
                $this->validate($request, [
                    'email' => "required|exists:users",
                    'auth' => "required"
                ], [
                    'email.required' => "Email is required!",
                    'email.exists' => "No account found with that email!",
                    'auth.required' => "Credentials not found!"
                ]);
                 $this->socialLogin($request);
            }else if($request->input('grantType')=='signup'){
                
                $this->signUp($request);
            }
            else{
                $this->res->error='Unexpected request!';
            }
        } catch (Exception $ex) {
            $this->res->error = $ex->getMessage();
        } finally {
            return response()->json($this->res, $this->status);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
