<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    //
    public function register(Request $request){
        $validatedData = $request->validate([
            "name"=>'required|max:55',
            "email"=>'email|required|unique:users',
            "password"=> 'required'
        ]);
        $validatedData['password'] = bcrypt($request->password);
        $created_user = User::create($validatedData);
        $accessToken = $created_user->createToken('authToken')->accessToken;
        if ($accessToken){
            $created_user->sendApiEmailVerificationNotification();
        }
        return ["created_user"=>$created_user,'access_token'=>$accessToken];
   }
   
   public function index(){
       return User::all();
   }

   public function show($id){
       return User::find($id);
   }

   public function update(Request $request,$id){
       $user = User::find($id);
       $user->update($request->all());
       return $user;
   }

   public function destroy($id){
       return User::destroy($id);
   }





}
