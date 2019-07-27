<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    protected $guarded = [];

    protected $table = 'page_views';

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
