<?php

namespace App\Helpers;

use Str;
use Hash;

class HashSalt{

    public static function hash_salt($password){
                $random_data = "kelompok5";
                $salt = $random_data.$password;
                $data = hash('sha256', $salt, config('app.encryption_key'));
                // echo $data;
                return $data;
               
    }

}