<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
'name','user_id','cover_picture','description'
];

    public function posts()
    {
        return $this->hasMany(BlogPost::class);
    }
}
