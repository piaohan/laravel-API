<?php

    namespace App\Http\Controllers\WEB;

    use App\User;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Auth;
    use Laravel\Socialite\Facades\Socialite;

    class AuthenticationController extends Controller
    {
        public function getSocialRedirect($account)
        {
            try {
                return Socialite::with($account)->redirect();
            } catch (\InvalidArgumentException $e) {
                return redirect('/login');
            }
        }

        public function getSocialCallback($account)
        {
            $socialUser = Socialite::with($account)->user();
            $user = User::where('provider_id', '=', $socialUser->id)->where('provider', '=', $account)->first();

            if ($user == null) {
                $newUser = new User();
                $newUser->name = $socialUser->getName();
                $newUser->email = $socialUser->getEmail() == '' ? '' : $socialUser->getEmail();
                $newUser->avatar = $socialUser->getAvatar();
                $newUser->password = '';
                $newUser->provider = $account;
                $newUser->provider_id = $socialUser->getId();

                $newUser->save();
                $user = $newUser;
            }
            // 手动登录该用户
            Auth::login($user);

            // 登录成功后将用户重定向到首页
            return redirect('/');
        }
    }
