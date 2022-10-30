<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Auth;

class Pemesanan2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pesanan = Pemesanan::where('user_id', '=', Auth::user()->id)->latest()->get();
        $data = Produk::latest()->get();
        $pemesanan = Pemesanan::where('user_id', '=', Auth::user()->id)->get();
        // return $pesanan;

        // return $pemesanan;

        return view('keranjang',[
            'pesanan'=>$pesanan,
            'produk' => $data,
            'pemesanan' => $pemesanan
        ]);
    }

    public function bayar(Request $request, Pemesanan $keranjang){
        // return $keranjang;
        $pesan = Pemesanan::where('id',$keranjang->id)->first();

        // return $pesan;

        // return $request->bayar.$pesan->total;

        $this->validate($request,['struk' => 'required'],['struk.required' => 'Upload bukti pembayaran terlebih dahulu']);

        if($pesan->total > $request->bayar){
            return redirect("/keranjang")->with('failed','Saldo anda tidak cukup');
        }

        if($request->file('struk')){
            // $pesan = new Pemesanan();
            $dataGambar = $request->struk->store('gambar-pemesanan');
            $pesan->struk = $dataGambar;
            // $pesan->save();
        }

        $pesan->bayar = $request->bayar;
        $pesan->status = true;
        $pesan->save();

        return redirect()->back()->with('success', 'Pembayaran telah berhasil');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request;
        $data = $this->validate($request, [
            'produk_id' => 'required|string|max:255',
            'user_id' => 'required',
            'total' => 'nullable',
            'bayar' => 'nullable',
            'status' => 'required',
            'jumlah' => 'required',
        ]);

        $produk = Produk::where('id',$data['produk_id'])->first();

      

        // return $data['struk']

        try{
            $data['total'] = $produk->harga * $data['jumlah'];
        }catch(NullException $e){
            return redirect()->back()->with('success','Terjadi kesalahan');
        }

        $produk->jumlah -= $data['jumlah'];
        $produk->save();

        Pemesanan::create($data);

        return redirect()->back()->with('success','Peoduk telah dimasukkan ke keranjang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemesanan $keranjang)
    {   
        $data = $this->validate($request, ['jumlah' => 'required']);
        
        $data2 = Pemesanan::where('id',$keranjang->id)->first();
        $produk = Produk::where('id', $data2->produk_id)->first();

        $data2->total = $produk->harga * $data['jumlah'];

        $data2->update($data);

        return redirect()->back()->with('success', 'Pemesanan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemesanan $keranjang)
    {
        $data = Pemesanan::find($keranjang->id);
        $produk = Produk::find($data->produk_id);
        $produk->jumlah += $data->jumlah;
        $produk->save();

        $data->delete();

        return redirect()->back()->with('success', 'Pemesanan telah berhasil dibatalkan');
    }
}
