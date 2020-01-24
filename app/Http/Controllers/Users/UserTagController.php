<?php

namespace App\Http\Controllers\Users;

use App\Domains\Users\Models\User;
use App\Domains\Users\Requests\UserTagCreateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserTagController extends Controller
{
    public function create(User $user)
    {
        return view('users.tags.create')->with(compact('user'));

    }
    public function store(User $user, UserTagCreateRequest $request)
    {
        $tag = (new UserTagCreateRequest())->handle($user, $request);
    }
}
