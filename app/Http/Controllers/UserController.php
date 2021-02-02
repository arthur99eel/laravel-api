<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function store(Request $request){
        return User::create($request->all());
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
