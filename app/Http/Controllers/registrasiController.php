<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\MOdels\User;

class registrasiController extends Controller
{
    public function register(){
        return view('register');
    }

    public function registerUser(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'gender' => 'required',
            'alamat' => 'required|min:3|max:255',
            'password' => 'required|min:3|max:255'
        ]);

        // return $validatedData;

        $validatedData['password'] = Hash::make($validatedData['password']);

        // return $validatedData;

        User::create($validatedData);

        // $request->session()->flash('success','Registrasi berhasil');

        return redirect('/register')->with('success','user berhasil didaftarkan');
    }
}
