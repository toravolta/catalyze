<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title', 'content', 'topic', 'slug', 'user_id', 'image'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
