<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Space;
class SpaceController extends Controller
{
    //
      //
      public function store(Request $request){
        return Space::create($request->all());
   }
   
   public function index(){
       return Space::all();
   }

   public function show($id){
       return Space::find($id);
   }

   public function update(Request $request,$id){
       $Space = Space::find($id);
       $Space->update($request->all());
       return $Space;
   }

   public function destroy($id){
       return Space::destroy($id);
   }
}
