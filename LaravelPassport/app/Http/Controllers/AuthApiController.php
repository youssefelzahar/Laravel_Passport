<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class AuthApiController extends Controller
{
    //

    public function Login(Request $request){
        $validate=$request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        $user=User::where('email',$validate['email'])->first();
        if(! $user||!\Hash::check($validate['password'],$user->password)){
            return  response()->json(['invalid user'],401);
        }
        $token=$user->createToken('auth_token')->accessToken;
        return response()->json(['access token'=>$token,'user'=>$user]);

    }
}
