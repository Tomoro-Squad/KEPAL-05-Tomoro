<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Events\Auth\UserActivationEmail;

class UserController extends Controller
{
    public function verification()
    {
        return view('auth.verification');
    }

    public function postVerification(Request $request)
    {
        $user = User::where('token_activation', $request->otp)->first();
        if ($user == null) {
            return redirect()->back()->with('flash_message_error', 'OTP salah, silahkan cek kembali!');
        } else {
            $user->update(['isVerified' => true, 'token_activation' => $request->otp]);
            return redirect('login')->withSuccess('Terima kasih, akun Anda telah aktif!');
        }
    }

    public function postResend(Request $request)
    {
        $this->validates($request);

        $user = User::where('email', $request->email)->first();

        if ($user == null) {
            return redirect()->back();
        } else {
            $user->token_activation = rand(100000, 999999);
            $user->save();

            event(new UserActivationEmail($user));

            return redirect()->route('verification')->withSuccess('Kode OTP telah dikirim, silakan cek email Anda untuk aktivasi');
        }
    }

    protected function validates(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email'
        ], [
            'email.exists' => 'Email tidak ditemukan, silakan cek kembali!'
        ]);
    }
}
