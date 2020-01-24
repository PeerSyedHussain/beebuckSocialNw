<?php

namespace App\Domains\SubGroups\Models;

use App\Domains\Circles\Models\Circle;
use App\Domains\Groups\Models\Group;
use App\Domains\Pages\Models\Page;
use App\Domains\Users\Models\User;
use Illuminate\Database\Eloquent\Model;

class SubGroup extends Model
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

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
}
