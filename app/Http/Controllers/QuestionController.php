<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
class QuestionController extends Controller
{
  public function store(Request $request){
        return Question::create($request->all());
   }
   
   public function index(){
       return Question::all();
   }

   public function show($id){
       return Question::find($id);
   }

   public function update(Request $request,$id){
       $Question = Question::find($id);
       $Question->update($request->all());
       return $Question;
   }

   public function destroy($id){
       return Question::destroy($id);
   }
}
