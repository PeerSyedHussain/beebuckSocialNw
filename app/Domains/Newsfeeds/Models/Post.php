<?php

namespace App\Domains\Newsfeeds\Models;

use App\Domains\Users\Models\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];

    public function post()
    {
        return $this->morphTo();
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
}
