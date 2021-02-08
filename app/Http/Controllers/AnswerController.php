<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
class AnswerController extends Controller
{
    //
    public function store(Request $request){
        return Answer::create($request->all());
   }
   
   public function index(){
       return Answer::all();
   }

   public function show($id){
       return Answer::find($id);
   }

   public function update(Request $request,$id){
       $Answer = Answer::find($id);
       $Answer->update($request->all());
       return $Answer;
   }

   public function destroy($id){
       return Answer::destroy($id);
   }
}
