<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostCommentsController extends Controller
{
    //
    public function index($id){
        $post_comments = Post::find($id)->comments;
        return $post_comments;
    }
}
