<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller{
    public function register(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'password'=>'required',

        ]);
        $user=User::create([
            'name'=> $request->name,
            'phone'=> $request->phone,
            'email'=> $request->email ,
            'password'=> Hash::make($request->password),

        ]);
        $user->save();


    return response()->json([
        'message'=>'Account created successfully'
    ]);

    }

    public function login(Request $request){
        $user=User::whereEmail($request->email)->first();
        if(isset($user->id)){
            if(Hash::check($request->password,$user->password)){
                $token=$user->createToken('auth_token')->plainTextToken;
                return response()->json(['message'=>'Connected Successfuly','token'=>$token]);
            }else{
                return response()->json(['message'=>'Invalid Credentials']);
            }
        }else{
            return response()->json(['message'=>'Invalid Credentials']);
        }
    }
}
