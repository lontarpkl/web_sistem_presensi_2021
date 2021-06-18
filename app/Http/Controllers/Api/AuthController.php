<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Student;
use App\Presences;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;



class AuthController extends Controller
{
        public function index() 
        {
            return Student::all();
        }

        public function login()
        {
            $validatedData = request()->validate([
                'nis' => 'required',
                'password' => 'required|min:6'
            ]);
            // get user object
            $user = Student::where('nis', request()->nis)->first();
            // do the passwords match?
            if (!Hash::check(request()->password, $user->password)) {
                // no they don't
                return response()->json([
                    'error' => 'Unauthorized',
                    'message' => 'Invalid Email or Password',
                ], 401);
            }
            // log the user in (needed for future requests)
            Auth::login($user);
            // get new token
            $tokenResult = $user->createToken('Presensi');
            // return token in json response
            return response()->json([
                'success' => ['token' => $tokenResult->accessToken],
                'user' =>  $user
            ], 200);


            // $accessToken = auth()->user()->createToken('authToken')->accessToken;

            // return response(['user' => auth()->user(), 'access_token' => $accessToken]);
        }

        public function logout(Request $request)
        {
            $logout = $request->user()->token()->revoke();
            if($logout){
                return response()->json([
                    'message' => 'Successfully logged out'
                ]);
            }
        }

        public function changePassword(Request $request) {
            $input = $request->all();
            $userid = Auth::guard('student')->user()->id;
            $rules = array(
                'old_password' => 'required',
                'new_password' => 'required|min:6',
                'confirm_password' => 'required|same:new_password',
            );
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                $arr = array("status" => 400, "message" => $validator->errors()->first(), "data" => array());
            } else {
                try {
                    if ((Hash::check(request('old_password'), Auth::user()->password)) == false) {
                        $arr = array("status" => 400, "message" => "Check your old password.", "data" => array());
                    } else if ((Hash::check(request('new_password'), Auth::user()->password)) == true) {
                        $arr = array("status" => 400, "message" => "Please enter a password which is not similar then current password.", "data" => array());
                    } else {
                        Student::where('id', $userid)->update(['password' => Hash::make($input['new_password'])]);
                        $arr = array("status" => 200, "message" => "Password updated successfully.", "data" => array());
                    }
                } catch (\Exception $ex) {
                    if (isset($ex->errorInfo[2])) {
                        $msg = $ex->errorInfo[2];
                    } else {
                        $msg = $ex->getMessage();
                    }
                    $arr = array("status" => 400, "message" => $msg, "data" => array());
                }
            }
            return \Response::json($arr);
        }

        public function saveToken(Request $request, Student $id) {
            
            // auth()->user()->update(['device_token' => $request->token]);

            $user = Student::find(Auth::id());
            $user['device_token'] = $request->input('token');
            $user->update();

            return response()->json([
                'message' => 'Token saved successfully']);
        }
        

        public function details(Request $request)
        {
            $user = Auth::user()->with('kelas')->find(Auth::id());
            // $user = Auth::user()->with('kelas')->get();

            return response()->json(
                $user
            ,200);

        }

}
