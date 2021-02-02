<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserPostsController extends Controller
{
    //
    public function index($id){
        $user_posts = User::find($id)->posts;
        return $user_posts;
    }
}
