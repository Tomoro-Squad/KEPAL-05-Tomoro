
  <div class="container">
    @include('template/header')
    <br>
    <div class="card-body container">
        <h3 class="card-title">Detail Produk</h3><br>
        <div class="row container">
            <div class="col-md-4 mb-3">
                <img src="/produk/{{$produk['gambar']}}" alt="" style="width: 100%;">
            </div>
            {{-- @foreach ($produk as $pro) --}}
            <div class="col-md-4">
                <div>
                    <h4>{{$produk['nama']}}</h4>
                    <b class="text-secondary">{{$produk['kategori']}}</b>
                </div>
                <div>
                    <h2 class="mt-2 text-info fw-bold">Rp.{{$produk['harga']}}</h2>
                    <p>Jumlah produk : {{$produk['jumlah']}} buah</p>
                </div>
                <div>
                    <h5 class="text-success">Detail</h5>
                    <p>
                        {!!$produk['detail']!!} 
                    </p>
                </div>
            </div>
            <div class="col-md-4 ">
                <h4 class="text-main">Pemesanan</h4>
                <div class="pesan border border-1">
                    <div class="p-3">
                        <form action="/keranjang" method="post" enctype="multipart/form-data">
                            @csrf
                            @auth
                            <div class="d-none">
                                <input type="text" name="pnama" value="{{$produk['nama']}}">
                                <input type="text" name="user_nama" value="{{Auth::user()->username}}">
                                <input type="number" name="pid" value="{{$produk['ID']}}">
                                <input type="number" name="user_id" value="{{Auth::user()->id}}">
                                <input type="number" name="harga" value="{{$produk['harga']}}">
                                <input type="text" name="gambar" value="{{$produk['gambar']}}">
                                <input type="number" name="total" value="">
                                <input type="number" name="bayar" value="">
                                <input type="number" name="status" value="0">
                            </div> 
                            @endauth
                            <small>Jumlah : </small>
                            <input type="number" id="number" name="jumlah" min="1" value="1" max="{{$produk['jumlah']}}" required> <small>dari {{$produk['jumlah']}} tersisa </small><br>
                            @auth
                            <button class="tombol-detail  py-2 px-4 mt-4"><i class="fas fa-cart-plus"></i> Masukkan keranjang</button>
                            @error('pid')
                            <small>{{$message}}</small>
                            @enderror
                            @error('pnama')
                            <small>{{$message}}</small>
                            @enderror
                            @error('user_id')
                            <small>{{$message}}</small>
                            @enderror
                            @error('user_nama')
                            <small>{{$message}}</small>
                            @enderror
                            @error('jumlah')
                            <small>{{$message}}</small>
                            @enderror
                            @error('harga')
                            <small>{{$message}}</small>
                            @enderror
                            @error('total')
                            <small>{{$message}}</small>
                            @enderror
                            @error('bayar')
                            <small>{{$message}}</small>
                            @enderror
                            @error('status')
                            <small>{{$message}}</small>
                            @enderror
                            @error('gambar')
                            <small>{{$message}}</small>
                            @enderror
                            @else
                            <br>
                            <a href="/login" class="tombol-detail  py-2 px-4 mt-5"><i class="fas fa-cart-plus"></i> Masukkan keranjang</a>
                            @endauth
                        </form>
                    </div>
                </div>
            </div>
            {{-- @endforeach --}}
        </div>

        <br>
</div>
    <br><br>
     @include('template.footer')
 
   </div>
 </html>