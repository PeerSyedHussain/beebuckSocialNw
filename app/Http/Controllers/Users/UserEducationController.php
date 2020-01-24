<?php

namespace App\Http\Controllers\Users;

use App\Domains\Users\Models\EducationDetail;
use App\Domains\Users\Models\User;
use App\Domains\Users\Requests\UserEducationCreateRequest;
use App\Domains\Users\Requests\UserEducationUpdateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserEducationController extends Controller
{

    public function index()
    {
        //
    }


    public function create(User $user)
    {
        return view('users.educations.create')->with(compact('user'));
    }

    public function store(User $user,UserEducationCreateRequest $request)
    {
        $userEducation = (new UserEducationCreateRequest())->handle($user,$request);
    }


    public function show($id)
    {
        //
    }


    public function edit(User $user, EducationDetail $educationDetail)
    {
        return view('users.educations.edit')->with(['user' => $user,'education' => $educationDetail]);
    }


    public function update(User $user, UserEducationUpdateRequest $request, EducationDetail $educationDetail)
    {
        $educationDetail = (new UserEducationUpdateRequest())->handle($user,$educationDetail,$request);
    }


    public function destroy($id)
    {

    }
}
