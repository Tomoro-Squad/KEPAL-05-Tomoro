<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class productController2 extends Controller
{
    public function tambah(Request $request){

        
        // $foto = $request->file('gambar');
        // $eks =  $foto->getClientOriginalExtension();
        // $foto->move(public_path('produk'), $eks);
        // return $eks;
        $response = Http::post('http://localhost:9010/dashboard/produk/tambah',[
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            // 'gambar' => $NamaFoto,
            'detail' => $request->detail
        ]);

        return back()->with('success','Produk telah ditambahkan');
    }
}
