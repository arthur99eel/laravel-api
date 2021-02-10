<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Log;

class VerificationController extends Controller
{
    //
       /*public function __construct(){
           
       }*/

    public function resend(Request $request){
        if ($request->user()->hasVerifiedEmail()) {

            return response(['message'=>'Already verified']);
        }

        $request->user()->sendEmailVerificationNotification();

        if ($request->wantsJson()) {
            return response(['message' => 'Email Sent']);
        }

        return back()->with('resent', true);
    }



  public function verify(EmailVerificationRequest $request){   
    // mark email as verified for the given user User::markEmailAsVerified
    // dispatch the Verified event
    $request->fulfill();
    error_log($request->user() . 'HEREEEEEEEEEEE');
    return response(['message'=> 'Congratulations, you are a verified user!']);

  }



}
