<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost:3307/produk');
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();

        $data = json_decode($body, true);

        return view('admin.product', ['produk' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.produk.tambah-produk');
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
            'nama' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'jumlah' => 'required|numeric',
            'gambar' => 'required',
            'detail' => 'required'
        ]);

        // return $request;

        $foto = $request->file('gambar');
        $NamaFoto = time() . '.' . $foto->extension();
        $foto->move(public_path('produk'), $NamaFoto);

        $response = Http::post('http://localhost:3307/produk', [
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'harga' => (int)$request->harga,
            'jumlah' => (int)$request->jumlah,
            'gambar' => $NamaFoto,
            'detail' => $request->detail
        ]);

        return redirect("/dashboard/produk")->with('success', 'Produk telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // return $id;
        $client = new Client();
        $response = $client->request('GET', "http://localhost:3307/produk/$id");
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();

        $produk = json_decode($body, true);
        // return $produk;
        // return $data;

        // return view('admin.produk.lihat-produk',['produk' => $data]);
        return view('admin.produk.lihat-produk', ['produk' => $produk]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return $id;
        $client = new Client();
        $response = $client->request('GET', "http://localhost:3307/produk/$id");
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();

        $produk = json_decode($body, true);
        // return $produk;
        // return $data;

        // return view('admin.produk.lihat-produk',['produk' => $data]);
        return view('admin.produk.ubah-produk', ['produk' => $produk]);
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
            'nama' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'jumlah' => 'required|numeric',
            'detail' => 'required'
        ]);

        // return $id;

        // return $request;
        if ($request->gambar != null) {
            $foto = $request->file('gambar');
            $NamaFoto = time() . '.' . $foto->extension();
            $foto->move(public_path('produk'), $NamaFoto);

            $response = Http::put('http://localhost:3307/produk/' . $id, [
                'nama' => $request->nama,
                'kategori' => $request->kategori,
                'harga' => (int)$request->harga,
                'jumlah' => (int)$request->jumlah,
                'gambar' => $NamaFoto,
                'detail' => $request->detail
            ]);


            //    return $response;

            return redirect("/dashboard/produk")->with('success', 'Produk telah ditambahkan');
        }


        $response = Http::put('http://localhost:3307/produk/' . $id, [
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'harga' => (int)$request->harga,
            'jumlah' => (int)$request->jumlah,
            'detail' => $request->detail
        ]);

        // return $response;

        return redirect("/dashboard/produk")->with('success', 'Produk telah ditambahkan');
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
        $response = $client->request('delete', "http://localhost:3307/produk/$id");
        //   $statusCode = $response->getStatusCode();
        //   $body = $response->getBody()->getContents();

        //   $produk = json_decode($body, true);
        // return $produk;
        // return $data;

        // return view('admin.produk.lihat-produk',['produk' => $data]);
        return redirect('/dashboard/produk');
    }
}
