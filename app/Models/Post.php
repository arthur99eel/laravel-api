<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{   
    protected $fillable = [
        'title',
        'slug',
        'likes',
        'content',
        'user_id'
    ];
    use HasFactory;
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
