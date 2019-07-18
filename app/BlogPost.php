<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\User;
use App\Comment;

class BlogPost extends Model
{

  protected $fillable = [
      'cover_picture', 'category_id', 'user_id','title','summary','content'
  ];

  public function user()
      {
          return $this->belongsTo(User::class);
      }

      public function comments()
      {
          return $this->hasMany(Comment::class,'blogpost_id');
      }

      public function category(){
          return $this->belongsTo(Category::class);
      }
}
