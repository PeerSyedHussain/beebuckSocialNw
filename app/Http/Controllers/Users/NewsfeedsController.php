<?php

namespace App\Http\Controllers\Users;

use App\Domains\Users\Requests\UserNewsfeedCreateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsfeedsController extends Controller
{

    public function index()
    {
//        dd(auth()->user()->posts()->toSql());
        return view('users.newsfeeds.index');
    }

    public function store(UserNewsfeedCreateRequest $request)
    {
        $request->handle();
        notify('Your status has been posted!','success');
        return redirect()->back();
    }

}
