<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'user_id', 'body',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
