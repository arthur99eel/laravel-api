<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class VerificationController extends Controller
{
    //
       /*public function __construct(){
           
       }*/

    public function resend(Request $request){
        
        
        if ($request->user()->hasVerifiedEmail()) {

            return response(['message'=>'Already verified']);
        }

        $request->user()->sendApiEmailVerificationNotification();

        if ($request->wantsJson()) {
            return response(['message' => 'Email Sent']);
        }

        //return back()->with('resent', true);
    }



  public function verify(Request $request){   
    // mark email as verified for the given user User::markEmailAsVerified
    // dispatch the Verified event
    $userId = $request['id'];
    $user = User::findOrFail($userId);
    $date = date("Y-m-d g:i:s");
    

    if ($user->hasVerifiedEmail()) {

        return response()->json(['message','Already verified']);

        // return redirect($this->redirectPath());
    }

    $user->email_verified_at = $date;
    $user->save();
    event(new Verified($user));
    return response()->json(['message','Your email is now verified!']);

        
    

  


  }



}
