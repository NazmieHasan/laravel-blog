<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'body', 'image', 'user_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
