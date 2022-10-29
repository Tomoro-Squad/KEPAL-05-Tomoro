<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

}
