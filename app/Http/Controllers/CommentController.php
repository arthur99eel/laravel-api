<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
class CommentController extends Controller
{
    //
    public function store(Request $request){
        return Comment::create($request->all());
   }
   
   public function index(){
       return Comment::all();
   }

   public function show($id){
       return Comment::find($id);
   }

   public function update(Request $request,$id){
       $Comment = Comment::find($id);
       $Comment->update($request->all());
       return $Comment;
   }

   public function destroy($id){
       return Comment::destroy($id);
   }
}
