<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class LoginController extends Controller
{
    //
    public function login(Request $request){
           
        $loginData = $request->validate([
            'email' => 'email|required',
            'password'=>'required'
        ]);
    
        if(!Auth::attempt($loginData)){
            return response(['message'=> 'Invalid Credentials']);
        }
        $authenticated_user = Auth::user();
        $user = User::find($authenticated_user->id);
        if (!$user){
            return response(['status' => 404, 'message' => 'Not Found'],404);
        };
        $accessToken = $user->createToken('authToken')->accessToken;
        return response(['user'=> $user,'access_token'=>$accessToken]);


    }
}
