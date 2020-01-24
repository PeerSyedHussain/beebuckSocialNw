<?php

namespace App\Domains\Users\Actions;

use App\Domains\Users\Models\User;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginAction
{
    public function provider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $user = Socialite::driver($provider)->user();

        $name = $user->getName();
        $nameArray = $result = preg_split('/[\s]+/', $name);
        $userValue['f_name'] = $nameArray[0];
        array_shift($nameArray);
        $userValue['l_name'] = join(' ',$nameArray);
        $userValue['email'] = $user->getEmail();
        $userValue['nick_name'] = $user->getNickname();
        $loginUser = User::where('email',$userValue['email'])->first();
        if(empty($loginUser)){
            $loginUser = User::firstOrCreate($userValue);
        }
        return $loginUser;
    }
}
