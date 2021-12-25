<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

      /**
     * ログアウトしたときの画面遷移先
     */
    protected function loggedOut(\Illuminate\Http\Request $request)
    {
        return redirect(RouteServiceProvider::HOME);
    }

    //以下でgoogleログイン
    public function redirectToGoogle()
    {
        // Googleへのリダイレクト→Google側で認証処理
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        // googleのユーザ情報を取得
        $googleUser = Socialite::driver('google')->stateless()->user();
        // email が合致するユーザをDBから取得
        $user = User::where('email', $googleUser->email)->first();
        // DBに該当するユーザがなければ新しくユーザを作成
        if ($user == null) {
            $user = $this->createUser($googleUser);
        }

        // 作成したユーザでログイン処理
        Auth::login($user, true);

        // ホーム画面にリダイレクト
        return redirect(RouteServiceProvider::HOME);
    }

    public function createUser($googleUser)
    {
        $user = User::create([
            'name'     => $googleUser->name,
            'email'    => $googleUser->email,
            'password' => Hash::make(uniqid()),
        ]);
        return $user;
    }

}
