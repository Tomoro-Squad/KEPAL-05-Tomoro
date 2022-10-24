<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\MOdels\User;
use App\Helpers\HashSalt;

class loginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function loginUser(Request $request){

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'email.required' => 'Inputan ini harus diisi',
            'email.email' => 'Inputan harus berupa email yang valid',
            'password.required' => 'Inputan ini harus diisi'
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if(empty($user)){
            return back()->with('loginError','Username atau password anda salah!');
        }

        $password =  HashSalt::hash_salt($credentials['password']);
        // var_dump($password);
       

        if($password == $user->password){
            Auth::loginUsingId($user->id, TRUE);
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('loginError','Username atau password anda salah!');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
