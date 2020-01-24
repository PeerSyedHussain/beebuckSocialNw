<?php

namespace App\Http\Controllers\Users;

use App\Domains\Users\Models\Link;
use App\Domains\Users\Models\User;
use App\Domains\Users\Requests\UserLinkCreateRequest;
use App\Domains\Users\Requests\UserLinkUpdateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserLinkController extends Controller
{
    public function create(User $user)
    {
        return view('users.links.create')->with(compact('user'));
    }

    public function store(User $user, UserLinkCreateRequest $request)
    {
        return $link = (new UserLinkCreateRequest())->handle($user, $request);
    }

    public function edit(User $user, Link $link)
    {
        return view('users.links.edit')->with(['user' => $user, 'link' => $link]);
    }

    public function update(User $user, UserLinkUpdateRequest $request, Link $link)
    {
        return $link = (new UserLinkUpdateRequest())->handle($user, $request, $link);
    }

    public function destroy(User $user, Link $link)
    {
        return $link = $user->links()->find($link->id)->delete();
    }
}
