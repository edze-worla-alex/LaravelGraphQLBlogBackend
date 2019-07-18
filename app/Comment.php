<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BlogPost;
use App\User;
class Comment extends Model
{
  protected  $fillable = [
  'blogpost_id','user_id','response'
];

  public function user()
  {
      return $this->belongsTo(User::class);
  }

  public function post()
  {
      return $this->belongsTo(BlogPost::class);
  }
}
