<?php

namespace App\Domains\Circles\Models;

use App\Domains\Groups\Models\Group;
use App\Domains\Pages\Models\Page;
use App\Domains\SubGroups\Models\SubGroup;
use App\Domains\Users\Models\User;
use Illuminate\Database\Eloquent\Model;

class Circle extends Model
{
    protected $guarded = ['id'];

    public function page()
    {
        return $this->belongsTo(Page::class);
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
