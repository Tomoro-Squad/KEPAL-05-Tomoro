<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use App\Models\Produk;
use App\Models\Pemesanan;
use Auth;

class berandaController extends Controller
{
    public function index(){

        $pemesanan = 0;
        
        if(Auth::check()){
            $pemesanan = Pemesanan::where('user_id', '=', Auth::user()->id)->get();
        }

        $data = Produk::where('deleted_at','=',NULL)->where('deleted_by','=',NULL)->get();
        // return $data;

        return view('beranda',[
            'produk' => $data,
             'pemesanan'=>$pemesanan
        ]);
    }

    public function detail(Produk $produk){
        
        if(Auth::check()){
            $pemesanan = Pemesanan::where('user_id', '=', Auth::user()->id)->get();
        }

          return view('detail-produk',[
              'produk'=>$produk,
              'pemesanan'=>$pemesanan
            ]);
    }
}
