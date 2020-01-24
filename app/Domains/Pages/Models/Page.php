<?php

namespace App\Domains\Pages\Models;

use App\Domains\Circles\Models\Circle;
use App\Domains\Groups\Models\Group;
use App\Domains\SubGroups\Models\SubGroup;
use App\Domains\Users\Models\User;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = ['id'];

    public function circles()
    {
        return $this->hasMany(Circle::class);
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function subGroups()
    {
        return $this->hasMany(SubGroup::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
}
