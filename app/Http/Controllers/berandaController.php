<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class berandaController extends Controller
{
    public function index(){
        $client = new Client();
        $response = $client->request('GET','http://localhost:9010/produk');
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();

        $data = json_decode($body, true);

        $client2 = new Client();
        $response2 = $client2->request('GET',"http://localhost:9010/pesanan");
        $statusCode2 = $response2->getStatusCode();
        $body2 = $response2->getBody()->getContents();

        $pesanan = json_decode($body2, true);

        return view('beranda',[
            'produk' => $data,
            'pesanan'=>$pesanan
        ]);
    }

    public function detail($id){
          // return $id;
          $client = new Client();
          $response = $client->request('GET',"http://localhost:9010/produk/$id");
          $statusCode = $response->getStatusCode();
          $body = $response->getBody()->getContents();
  
          $produk = json_decode($body, true);

          $client2 = new Client();
          $response2 = $client2->request('GET',"http://localhost:9010/pesanan");
          $statusCode2 = $response2->getStatusCode();
          $body2 = $response2->getBody()->getContents();
  
          $pesanan = json_decode($body2, true);


          return view('detail-produk',[
              'produk'=>$produk,
              'pesanan'=>$pesanan
            ]);
    }
}
