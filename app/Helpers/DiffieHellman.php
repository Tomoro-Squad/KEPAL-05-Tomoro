<?php

namespace App\Helpers;

// use Str;
// use Hash;

class DiffieHellman{

    public static function diffie_hellman($client, $server){
        $p = 23;
        $g = 9;

        // return (int)pow($g,$client);
        $x = pow($g,$client) % $p;
        $y = pow($g,$server) % $p;

        // return $x."-".$y;

        // Generate secret key
        $ka = pow($y,$client) % $p;
        $kb = pow($x,$server) % $p;

        if($ka == $kb){
            $key = "".$ka;
            $salt = $key."kelompok5";
            $data = hash('sha256', $salt, config('app.encryption_key'));
            return $data;
        }

        return redirect()->back()->with('failed','Terjadi kesalahan saat transaksi');
               
    }

}