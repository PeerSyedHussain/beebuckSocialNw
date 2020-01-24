<?php

namespace App\Domains\Users\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyDetail extends Model
{

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
