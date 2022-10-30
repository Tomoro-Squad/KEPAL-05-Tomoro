
  <div class="container">
    @include('template/header')
    <br>
        <div class="container">
            <div>
                <h3 class="text-secondary fw-bold container"><img src="{{asset("file/keranjang.png")}}" style="width: 80px" alt="">Keranjang Saya</h3>
            </div>

            @if(session()->has('success'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <i class="fas fa-check-circle"></i>&nbsp;
                <div>
                 {{session('success')}}
                </div>
              </div>
            @endif

            @if(session()->has('failed'))
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <i class="fas fa-exclamation-triangle"></i>&nbsp;
                <div>
                  {{session('failed')}}
                </div>
              </div>
            @endif
           
            <div class="row container">
                @foreach ($pesanan as $pes)
                <div class="col-md-6 @if($pes['status'] == 2) d-none @else d-block @endif container">
                    <div class=" mb-4 card-pemesanan" style="max-width: 540px;">
                        <div class="row g-0">
                          <div class="col-md-4">
                            @foreach($pes->produk->gambar as $ppg)
                              @if($loop->first)
                                <img src="{{asset('/storage/'.$ppg->gambar)}}"  class="img-fluid rounded-start mt-3" alt="...">
                              @endif
                            @endforeach
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                            <div class="d-flex">
                                
                              <h5 class="">{{$pes->produk->name}} </h5>

                                @if ($pes['status'] == 0)
                                <div class="ms-auto">
                                  <a href="" class="badge bg-warning link" data-bs-toggle="modal" data-bs-target="#ubahpesan{{$pes['id']}}"><small><i class="fas fa-pen"></i> Ubah</small></a>

                                  {{-- modal ubah --}}
                                  <div class="modal fade" id="ubahpesan{{$pes['id']}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="staticBackdropLabel">Ubah Pesanan</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          <div class="row">
                                          <div class="col-md-4">
                                            @foreach($pes->produk->gambar as $ppg)
                                              @if($loop->first)
                                                <img src="{{asset('/storage/'.$ppg->gambar)}}"  class="img-fluid rounded-start mt-3" alt="...">
                                              @endif
                                            @endforeach
                                            {{-- <img src="produk/{{$pes['gambar']}}"  class="img-fluid rounded-start mt-3" alt="..."> --}}
                                          </div>
                                          <div class="col-md-8">
                                            <h5 class="">{{$pes->produk->name}} </h5>
                                            <small class="text-secondary">Jumlah produk : </small>
                                          <form action="/keranjang/{{$pes['id']}}" method="post" enctype="multipart/form-data">
                                            @method('put')
                                            @csrf

                                                   <input type="number" min="1"
                                                   @foreach($produk as $pro)
                                                   @if ($pro['id'] == $pes['produk_id'])
                                                    max="{{$pro['jumlah']}}" 
                                                    @endif
                                                    @endforeach
                                                    value="{{$pes['jumlah']}}" name="jumlah">
                                                
                                             {{-- value="{{$pes['jumlah']}}" --}}
                                            
                                            <p class="text-main">Rp.{{$pes['total']}}</p>
                                          </div>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="d-none">
                                            <small>Jumlah : </small>
                                            {{-- <input type="number" id="number" name="jumlah" min="1" value="1" max="{{$pes['jumlah']}}" required>  --}}
                                            {{-- <input type="text" name="pnama" value="{{$pes['pnama']}}">
                                            <input type="text" name="user_nama" value="{{$pes['user_nama']}}">
                                            <input type="number" name="pid" value="{{$pes['pid']}}">
                                            <input type="number" name="user_id" value="{{$pes['user_id']}}">
                                            <input type="number" name="harga" value="{{$pes['harga']}}">
                                            <input type="text" name="gambar" value="{{$pes['gambar']}}">
                                            <input type="number" name="total" value="{{$pes['total']}}">
                                            <small>Input jumlah pembayaran</small><br>
                                            <input type="number" name="bayar" value="{{$pes['bayar']}}">
                                            <input type="number" name="status" value="{{$pes['status']}}"> --}}
                                            </div>
                                            <button type="submit" class="btn btn-primary">Ubah Pesanan</button>
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
                                        </form>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  {{--end of modal ubah--}}
                                  <form action="/keranjang/{{$pes['id']}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="badge border-0 mt-2 bg-danger link"><small><i class="fas fa-trash"></i> Batalkan</small></button>
                                  </form>
                                </div>
                                @endif
                            </div>

                              <small class="text-secondary">Jumlah produk : {{$pes['jumlah']}}</small>
                              @if ($pes['status'] == 1)
                              <p class="text-main fw-bold"><i class="fas fa-check-circle"></i>&nbsp;Pembelian produk berhasil</p>
                              @else
                              <p class="text-main">Rp.{{$pes['total']}}</p>
                              @endif
                              @if ($pes['status'] == 0)
                              <a href="" class="tombol-detail mt-2 px-3 py-2" data-bs-toggle="offcanvas" data-bs-target="#bayar{{$pes['id']}}" aria-controls="offcanvasBottom><small><i class="fas fa-money-bill-wave-alt"></i>&nbsp; Bayar Sekarang</small></a>
                              @elseif($pes['status'] == 1)
                              <form action="/keranjang/bayar/{{$pes['id']}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="d-none">
                                <small>Jumlah : </small>
                                <small>Input jumlah pembayaran</small><br>
                                <input type="number" name="bayar" value="{{$pes['bayar']}}">
                                </div>
                                <button type="submit" class="btn btn-info mt-4 text-white">Konfirmasi</button>
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
                            </form>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                </div>

                {{-- pembayaran kanvas --}}
                <div class="offcanvas offcanvas-start @if($pes->id == old('pes_id')) @error('struk') show  @enderror @endif"  tabindex="-1" id="bayar{{$pes['id']}}" aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-header">
                      <h5 class="offcanvas-title" id="offcanvasBottomLabel">Konfirmasi Pembayaran</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body small">
                      <div class=" container" style="margin-top: -30px;">

                        <div class="d-flex">
                          <div class=" container">
                            @foreach($pes->produk->gambar as $ppg)
                            @if($loop->first)
                              <img src="{{asset('/storage/'.$ppg->gambar)}}"  class="img-fluid rounded-start mt-3" style="">
                            @endif
                          @endforeach
                            {{-- <img src="produk/{{$pes['gambar']}}"  class="img-fluid rounded-start mt-3" > --}}
                          </div>
                          <div>
                            <div class=" container mt-4">
                              <h3>{{$pes['pnama']}}</h3>
                              <small class="text-secondary">Jumlah produk : {{$pes['jumlah']}}</small>
                            </div>
                            <div class=" container mt-4">
                                <b class="text-secondary">Total Harga :</b>
                              <h4 class="text-main">Rp.{{$pes['total']}}</h4>
                            </div>
                          </div>
                        </div>
                    


                          <div class=" container mt-4">
                            <form action="/keranjang/bayar/{{$pes['id']}}" method="post" enctype="multipart/form-data">
                                @csrf
                                {{-- <small>Jumlah : </small> --}}
                                <div class="d-none">
                                <input type="number" id="number" name="jumlah" min="1" value="{{$pes['jumlah']}}" max="{{$pes['jumlah']}}" required> 
                                <input type="text" name="pnama" value="{{$pes['pnama']}}">
                                <input type="text" name="user_nama" value="{{$pes['user_nama']}}">
                                <input type="number" name="pid" value="{{$pes['pid']}}">
                                <input type="number" name="user_id" value="{{$pes['user_id']}}">
                                <input type="number" name="harga" value="{{$pes['harga']}}">
                                <input type="text" name="gambar" value="{{$pes['gambar']}}">
                                <ind-flexput type="number" name="total" value="{{$pes['total']}}">
                                <input type="number" name="status" value="1">
                                </div>
                                <small>Upload bukti pembayaran</small><br><br>
                                <input type="file" class="" name="struk" >
                                <input type="hidden" class="" value="{{$pes->id}}" name="pes_id"><br><br>
                                @error('struk') <i class="text-danger">{{$message}}</i>  <br>@enderror 
                                <small>Input jumlah pembayaran</small><br><br>
                                <input type="number" name="bayar" value="" min="1" max="{{$pes['total']}}" style="width: 80px" required><br><br>
                               
                                <button type="submit" class="tombol-detail  py-2 px-4 mt-1"><i class="fas fa-money-bill-wave-alt"></i>&nbsp; Bayar</button>
                                
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
            </div>
        </div>
    <br><br>
     @include('template.footer')
 
   </div>
 </html>