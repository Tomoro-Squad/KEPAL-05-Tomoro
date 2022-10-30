<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Gambar;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Produk::where('deleted_at','=',NULL)->where('deleted_by','=',NULL)->get();
        // return $data;

        return view('admin.product',[
            'produk' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.produk.create');
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
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'harga' => 'required',
            'kategori_id' => 'required',
            'detail' => 'required|string|max:855',
            'jumlah' => 'required',
        ],[
            'name.required' => 'Nama produk harus diisi!',
            'name.max' => 'Nama produk maksimal 255 karakter',
            'harga.max' => 'Harga produk maksimal 255 karakter',
            'detail.required' => 'Detail produk harus diisi',
            'jumlah.required' => 'Jumlah produk harus diisi',
            'kategori_id.required' => 'Kategori produk harus diisi',
        ]);

        $produk = new Produk();
        $produk->name = $request->name;
        $produk->harga = $request->harga;
        $produk->kategori_id = $request->kategori_id;
        $produk->detail = $request->detail;
        $produk->jumlah = $request->jumlah;
        $produk->save();

        // return $produk;

        foreach ($request->file('gambar') as $imagefile) {
            $image = new Gambar();
            $dataGambar = $imagefile->store('gambar-produk');
            $image->gambar = $dataGambar;
            $image->produk_id = $produk->id;
            $image->save();
         }

        return redirect('/dashboard/produk')->with('success','Produk telah berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {

        $produk = Produk::where('id',$produk->id)->first();
        // return $produk['name'];

        if($produk->deleted_at != NULL || $produk->deleted_by != NULL){
            return abort(404);
        }

        return view('admin.produk.detail', [
            'produk' => $produk
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        return view('admin.produk.edit', [
            'produk' => $produk
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {   

        // return $request;

        $data = $this->validate($request, [
            'name' => 'required|string|max:255',
            'harga' => 'required',
            'kategori_id' => 'required',
            'detail' => 'required|string|max:855',
            'jumlah' => 'required',
        ],[
            'name.required' => 'Nama produk harus diisi!',
            'name.max' => 'Nama produk maksimal 255 karakter',
            'harga.max' => 'Harga produk maksimal 255 karakter',
            'detail.required' => 'Detail produk harus diisi',
            'jumlah.required' => 'Jumlah produk harus diisi',
            'kategori_id.required' => 'Kategori produk harus diisi',
        ]);

        // $validasi = $request->validate($data);

        Produk::where('id', $produk->id)->update($data);

        return redirect('/dashboard/produk')->with('success','Produk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Produk $produk)
    {
        $data = $this->validate($request, [
            'deleted_at' => 'required',
            'deleted_by' => 'required'
        ]);

        Produk::where('id', $produk->id)->update($data);

        return redirect('/dashboard/produk')->with('success','Produk berhasil dihapus');
    }
}
