<?php

namespace App\Models;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'blog_id',
        'comment_content',
        'user_id'
    ];



    public function blog(){
        return $this->belongsTo(Blog::class , 'blog_id');
    }

    public function user(){
        return $this->belongsTo(User::class , 'user_id');
    }


    public function scopeFilter($query , array $filters){
        if($filters['blog_id'] ?? false){
            $query->where('blog_id','=', request('blog_id'));
            $_SESSION['blog_id'] = request('blog_id');
        }
    }
}
