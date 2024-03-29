
  <div class="container">
    @include('template/header')   

    <br>
    <div class="card-body container">
        <h3 class="card-title">Detail Produk</h3><br>
        <div class="row container">
            <div class="col-md-4 mb-3">
                
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                    <div class="carousel-indicators">
                        @php
                        $i = 0;    
                        @endphp
                        @foreach ($produk->gambar as $pgam)
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$i}}" class="active" @if($loop->first) aria-current="true" @else data-bs-slide-to="{{$loop->iteration}}" @endif aria-label="Slide {{$loop->iteration}}"></button>
                        @php
                            $i++;    
                        @endphp
                        @endforeach
                      
                      {{-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button> --}}
                    </div>
                    <div class="carousel-inner">
                    @foreach ($produk->gambar as $pgam)
                    <div class="carousel-item @if($loop->first) active @endif">
                        <img src="{{asset('/storage/'.$pgam->gambar)}}" class="d-block w-100" alt="...">
                      </div>
                    @endforeach
                     


                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>

                {{-- <img src="/produk/{{$produk['gambar']}}" alt="" style="width: 100%;"> --}}
            </div>
            {{-- @foreach ($produk as $pro) --}}
            <div class="col-md-4">
                <div>
                    <h4>{{$produk['name']}}</h4>
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
                        <form action="/pemesanan" method="post" enctype="multipart/form-data">
                            @csrf
                            @auth
                            <div class="d-none">
                                <input type="text" name="produk_id" value="{{$produk['id']}}">
                                <input type="text" name="user_id" value="{{Auth::user()->id}}">
                                <input type="number" name="total" value="">
                                <input type="number" name="bayar" value="">
                                <input type="number" name="status" value="0">
                            </div> 
                            @endauth
                            <small>Jumlah : </small>
                            <input type="number" id="number" name="jumlah" min="1" value="1" max="{{$produk['jumlah']}}" required> <small>dari {{$produk['jumlah']}} tersisa </small><br>
                            @auth
                            @if($produk->jumlah > 0)
                            <button class="tombol-detail  py-2 px-4 mt-4"><i class="fas fa-cart-plus"></i> Masukkan keranjang</button>
                            @else
                            <br>
                            <i class="text-danger mt-2">Stok produk telah habis</i>
                            @endif
                            {{-- @error('pid')
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
                            @enderror --}}
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

    <style>
        .toast-kerangjang{
            position: absolute;
            top: 40 ;
            right: 40;

        }
    </style>

    @if(session()->has('success'))
    <div class="toast-kerangjang">
        <div class="toast show bg-success top-0 end-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-white">
              <strong class="me-auto text-success"><i class="fas fa-check-circle"></i> Sukses</strong>
              {{-- <small>11 mins ago</small> --}}
              <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <h6 class="text-white"><i class="fas fa-shopping-cart"></i> Berhasil ditambahkan ke keranjang</h6>
            </div>
        </div>
    </div>
    @endif

     @include('template.footer')
 
   </div>
 </html>