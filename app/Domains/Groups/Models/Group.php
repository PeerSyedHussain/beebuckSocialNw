<?php

namespace App\Domains\Groups\Models;

use App\Domains\Circles\Models\Circle;
use App\Domains\Pages\Models\Page;
use App\Domains\SubGroups\Models\SubGroup;
use App\Domains\Users\Models\User;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $guarded = ['id'];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function circle()
    {
        return $this->belongsTo(Circle::class);
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
