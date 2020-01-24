<?php

namespace App\Http\Controllers\Users;

use App\Domains\Users\Models\CompanyDetail;
use App\Domains\Users\Models\User;
use App\Domains\Users\Requests\UserCompanyCreateRequest;
use App\Domains\Users\Requests\UserCompanyUpdateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserCompanyController extends Controller
{
    public function create(User $user)
    {
        return view('users.company.create')->with(compact('user'));
    }


    public function store(User $user, UserCompanyCreateRequest $request)
    {
        $userCompany = (new UserCompanyCreateRequest())->handle($user, $request);
    }


    public function edit(User $user, CompanyDetail $companyDetail)
    {
        return view('users.company.edit')->with(['user' => $user, 'company' => $companyDetail]);
    }


    public function update(User $user, UserCompanyUpdateRequest $request, CompanyDetail $companyDetail)
    {
        $userCompany = (new UserCompanyUpdateRequest())->handle($user, $request, $companyDetail);
    }

    public function destroy(User $user, CompanyDetail $companyDetail)
    {
        return $companyDetail->delete();
    }
}
