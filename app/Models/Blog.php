<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
protected $fillable = [
    'id',
    'subject',
    'content',
    'image',
    'user_id'
];


public function user(){
    return $this->belongsTo(User::class , 'user_id');

}

    public function comment(){
        return $this->hasMany(Comment::class , 'blog_id');
    }
}

