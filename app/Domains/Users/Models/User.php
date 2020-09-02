<?php

namespace App\Domains\Users\Models;

use App\Traits\FriendableTemp;
//use App\Traits\HasPost;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, FriendableTemp;

    protected $guarded = ['id'];

//    protected $dates = ['dob','last_active','deleted_at','created_at','updated_at'];

    public function educationDetails()
    {
        return $this->hasMany(EducationDetail::class);
    }

    public function companyDetails()
    {
        return $this->hasMany(CompanyDetail::class);
    }

    public function links()
    {
        return $this->hasMany(Link::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'tags_users','user_id','tag_id');
    }

}
