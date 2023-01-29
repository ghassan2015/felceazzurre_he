<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
class AuthController extends Controller
{
    public function getLogin(){
        return view('admin.auth.login');
    }
    public function postLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'error' => $validator->errors()->toArray()
            ]);
        }

        $admin_cred = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($admin_cred)) {

            if (\auth('admin')->user()->status){
                return response()->json(["status"=>201,"redirect_location"=>route("admin.index")]);

            }else{
                return response()->json(["status"=>422,"redirect_location"=>route("login")]);

            }

        }else{


            return response()->json(["status"=>404,"redirect_location"=>route("login")]);


        }

    }
}
