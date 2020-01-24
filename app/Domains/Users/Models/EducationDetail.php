<?php

namespace App\Domains\Users\Models;

use Illuminate\Database\Eloquent\Model;

class EducationDetail extends Model
{

    protected  $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
