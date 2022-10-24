<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Helpers\HashSalt;
use Str;

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
            'password' => 'required|min:3|max:255',
            'salt' => 'nullable'
        ]);

        // return $validatedData;

     
        
        $validatedData['password'] = HashSalt::hash_salt($validatedData['password']);
        // $validatedData['password'] =  $validatedData['password'].$validatedData['salt'];

        User::create($validatedData);

        // $request->session()->flash('success','Registrasi berhasil');

        return redirect('/register')->with('success','user berhasil didaftarkan');
    }
}
