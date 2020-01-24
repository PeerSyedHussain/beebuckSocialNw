<?php

namespace App\Http\Controllers\Auth;

use App\Domains\Users\Actions\SocialLoginAction;
use App\Http\Controllers\Controller;
use App\Notifications\Users\SocialLoginNotification;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider()
    {
        return (new SocialLoginAction())->provider(request('provider'));
    }

    public function handleProviderCallback()
    {
        $loginUser = (new SocialLoginAction())->callback(request('provider'));
        Auth::loginUsingId($loginUser->id);
        auth()->user()->notify(new SocialLoginNotification(request('provider')));
        return redirect()->route('users.index');
    }
}
