<?php

namespace App\Http\Controllers\Users;

use App\Domains\Users\Models\User;
use App\Domains\Users\Requests\UserCreateRequest;
use App\Domains\Users\Requests\UserUpdateRequest;
use App\Http\Controllers\Controller;
class UsersController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view("users.index")->with(['users' => $users]);
    }


    public function create()
    {
        return view("users.create");
    }


    public function store(UserCreateRequest $request)
    {
        $user = (new UserCreateRequest())->handle($request);
        return redirect()->back();
    }


    public function show(User $user)
    {
        return view('users.show')->with(compact('user'));
    }


    public function edit(\App\Domains\Users\Models\User $user)
    {
        return view('users.edit')->with(['user' => $user]);
    }


    public function update(UserUpdateRequest $request, User $user)
    {
        $user = (new UserUpdateRequest())->handle($request, $user);
    }


    public function destroy(User $user)
    {
        return $user = $user->delete();
    }
}
