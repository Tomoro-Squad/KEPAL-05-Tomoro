<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class pemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client();
        $response = $client->request('GET',"http://localhost:9010/pesanan");
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();

        $pesanan = json_decode($body, true);

        $client2 = new Client();
        $response2 = $client2->request('GET','http://localhost:9010/produk');
        $statusCode2 = $response2->getStatusCode();
        $body2 = $response2->getBody()->getContents();

        $data = json_decode($body2, true);

        return view('keranjang',[
            'pesanan'=>$pesanan,
            'produk' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }


    public function bayar(Request $request, $id)
    {
        $request->validate([
            'pid' => 'required|numeric',
            'pnama' => 'required',
            'user_id' => 'required|numeric',
            'user_nama' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            'total' => 'nullable',
            'bayar' => 'nullable',
            'status' => 'required',
            'gambar' => 'nullable'
        ]);

    
       if($request->total > $request->bayar){
            return redirect("/keranjang")->with('failed','Saldo anda tidak cukup');
       }
      
   
        $response = Http::put("http://localhost:9010/pesanan/$id",[
            'pid' => (int)$request->pid,
            'pnama' => $request->pnama,
            'user_id' => (int)$request->user_id,
            'user_nama' => $request->user_nama,
            'jumlah' => (int)$request->jumlah,
            'harga' => (int)$request->harga,
            'total' => (int)$request->total,
            'bayar' => (int)$request->bayar,
            'status' => (int)$request->status,
            'gambar' => $request->gambar
        ]);
        // return $response;
        // return $response;

        return redirect("/keranjang")->with('success','Pembayaran telah berhasil');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pid' => 'required|numeric',
            'pnama' => 'required',
            'user_id' => 'required|numeric',
            'user_nama' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            'total' => 'nullable',
            'bayar' => 'nullable',
            'status' => 'required',
            'gambar' => 'nullable'
        ]);

        // return $request;
        $hargaTotal = $request->jumlah * $request->harga;
        // return $hargaTotal;
        // $response = [
        //     'pid' => $request->pid,
        //     'pnama' => $request->pnama,
        //     'user_id' => $request->user_id,
        //     'user_nama' => $request->user_nama,
        //     'jumlah' => $request->jumlah,
        //     'harga' => $request->harga,
        //     'total' => $hargaTotal,
        //     'bayar' => $request->bayar,
        //     'status' => $request->status,
        //     'gambar' => $request->gambar
        // ];

        // return $response;
   
        $response = Http::post('http://localhost:9010/pesanan',[
            'pid' => (int)$request->pid,
            'pnama' => $request->pnama,
            'user_id' => (int)$request->user_id,
            'user_nama' => $request->user_nama,
            'jumlah' => (int)$request->jumlah,
            'harga' => (int)$request->harga,
            'total' => (int)$hargaTotal,
            'bayar' => (int)$request->bayar,
            'status' => (int)$request->status,
            'gambar' => $request->gambar
        ]);

        // return $response;

        return redirect("/keranjang")->with('success','Pesanan telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'pid' => 'required|numeric',
            'pnama' => 'required',
            'user_id' => 'required|numeric',
            'user_nama' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            'total' => 'nullable',
            'bayar' => 'nullable',
            'status' => 'required',
            'gambar' => 'nullable'
        ]);

    
        $hargaTotal = $request->jumlah * $request->harga;
      
   
        $response = Http::put("http://localhost:9010/pesanan/$id",[
            'pid' => (int)$request->pid,
            'pnama' => $request->pnama,
            'user_id' => (int)$request->user_id,
            'user_nama' => $request->user_nama,
            'jumlah' => (int)$request->jumlah,
            'harga' => (int)$request->harga,
            'total' => (int)$hargaTotal,
            'bayar' => (int)$request->bayar,
            'status' => (int)$request->status,
            'gambar' => $request->gambar
        ]);
        // return $response;
        // return $response;

        return redirect("/keranjang")->with('success','Pesanan telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = new Client();
        $response = $client->request('delete',"http://localhost:9010/pesanan/$id");
      //   $statusCode = $response->getStatusCode();
      //   $body = $response->getBody()->getContents();

      //   $produk = json_decode($body, true);
        // return $produk;
        // return $data;

        // return view('admin.produk.lihat-produk',['produk' => $data]);
        return redirect('keranjang')->with('success','Pesanan telah dibatalkan');
    }
}
