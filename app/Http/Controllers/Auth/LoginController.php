<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Helpers\HashSalt;
use Illuminate\Validation\Rule;
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

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => [
                'required', 'string',
                Rule::exists('users')->where(function ($query) {
                    $query->where('isVerified', true);
                })

            ], 'password' => 'required|string',


        ], [
            $this->username() . '.exists' => 'Email Anda belum Aktif, Silahkan Aktivasi terlebih Dahulu'
        ]);
    }

    public function loginUser(Request $request)
    {

        $credentials = $request->validate([
            $this->username() => [
                'required', 'string',
                Rule::exists('users')->where(function ($query) {
                    $query->where('isVerified', true);
                })

            ], 'password' => 'required|string',
            'g-recaptcha-response' => 'required|captcha',


        ], [
            $this->username() . '.exists' => 'Email Anda belum Aktif, Silahkan Aktivasi terlebih Dahulu'
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (empty($user)) {
            return back()->with('loginError', 'Username atau password anda salah!');
        }

        $password =  HashSalt::hash_salt($credentials['password']);
        // var_dump($password);


        if ($password == $user->password) {
            Auth::loginUsingId($user->id, TRUE);
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Username atau password anda salah!');
    }
}
