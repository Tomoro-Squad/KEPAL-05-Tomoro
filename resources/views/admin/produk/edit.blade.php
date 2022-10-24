@include('admin/template-admin/header')

@include('admin/template-admin/sidebar')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Form Basic</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">UBAH PRODUK</h3><br>
                                <br><br>

                                <div class="form-group mt-3">
                                    <div class="">
                                      <label class="mx-4 w-25" >Gambar</label><br>
                                        <div class="d-flex">
                                       @foreach ($produk->gambar as $pg)
                                          <div class="px-4">
                                              <div class="d-flex manage-img" >
                                                  <form action="/dashboard/produk/gambar/{{$pg->id}}" method="post" enctype="multipart/form-data" >
                                                      @method('delete')
                                                      @csrf
                                                      <input type="hidden" name="gambar-lama" value="{{$pg->gambar}}">
                                                      <button class="btn btn-sm btn-danger text-white rounded delete-img" type="submit"><i class="fas fa-trash"></i></button>
                                                  </form>
                                                  &nbsp;&nbsp;
                                                  <a class="btn btn-sm btn-warning rounded" data-bs-toggle="modal" data-bs-target="#gambar{{$pg->id}}"><i class="fas fa-edit"></i></a>
                                              </div>
                                              <img src="{{asset('/storage/'.$pg->gambar)}}" class="c" style="max-width: 100px;" alt="">&nbsp;&nbsp;
                                          </div>

                                                   <!-- Modal -->
                                                   <div class="modal fade" id="gambar{{$pg->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                      <div class="modal-dialog">
                                                      <div class="modal-content">
                                                          <div class="modal-header">
                                                          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                          </div>
                                                          <div class="modal-body">

                                                           <form action="/dashboard/produk/gambar/{{$pg->id}}" method="post" enctype="multipart/form-data">
                                                              @method('put')
                                                              @csrf
                                                              <input type="file" name='gambar' value="{{$pg->gambar}}" > 
                                                              <input type="hidden" name='gambar_lama' value="{{$pg->gambar}}">
                                                           </form>

                                                          </div>
                                                          <div class="modal-footer">
                                                          <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                          <button class="btn btn-primary">Save changes</button>
                                                          </div>
                                                      </div>
                                                      </div>
                                                  </div>

                                          @endforeach
                                        </div>
                                        
                                        <br><br>
                                    </div>
                                </div>

                                <form  method="post" action="/dashboard/produk/{{$produk['id']}}"> 
                                    @method('put')
                                    @csrf
                                    <div class="modal-body">
                                      <div class="form-group mt-3">
                                          <div class="">
                                              <label class="mx-4 w-25" >Nama Produk</label>
                                              <input type="text" name="name" class="form-control mx-3" placeholder="Nama produk disini" value="{{$produk['name']}}" required>
                                              @error('name')
                                              <small class="text-danger container">
                                                 {{$message}}
                                              </small>
                                              @enderror
                                          </div>
                                      </div>
                            
                                      <div class="form-group mt-3">
                                          <div class="">
                                              <label class="mx-4 w-25" >Kategori</label>
                                              <input type="text" name="kategori_id" class="form-control mx-3" placeholder="Kategori disini" value="{{$produk['kategori']}}" required>
                                              @error('kategori')
                                              <small class="text-danger container">
                                                 {{$message}}
                                              </small>
                                              @enderror
                                          </div>
                                      </div>
                            
                                      <div class="form-group mt-3">
                                          <div class="">
                                              <label class="mx-4 w-25" >Harga</label>
                                              <input type="number" name="harga" class="form-control mx-3" placeholder="Harga disini" value="{{$produk['harga']}}" required>
                                              @error('harga')
                                              <small class="text-danger container">
                                                 {{$message}}
                                              </small>
                                              @enderror
                                          </div>
                                      </div>
                            
                                      <div class="form-group mt-3">
                                          <div class="">
                                              <label class="mx-4 w-25" >Jumlah</label>
                                              <input type="number" name="jumlah" class="form-control mx-3" placeholder="Jumlah disini" value="{{$produk['jumlah']}}" required>
                                              @error('jumlah')
                                              <small class="text-danger container">
                                                 {{$message}}
                                              </small>
                                              @enderror
                                          </div>
                                      </div>
                            
                                      <div class="form-group mt-3">
                                          <div class="">
                                              <label class="mx-4 w-25" >Deskripsi</label> 
                                              <div class="mx-3">
                                                <input id="detail" type="hidden" name="detail" value="{{$produk['detail']}}">
                                                <trix-editor input="detail" style="height: 200px;"></trix-editor>
                                                @error('detail')
                                                <small class="text-danger container">
                                                     {{$message}}
                                                </small>
                                                @enderror
                                              </div>
                                          </div>
                                      </div>

                                      <style>
                                        .manage-img{
                                            position: absolute;
                                            transform: scale(0.8);
                                        }
                                      </style>
                            
                                     
                            
                                  </div>
                                   @csrf
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                        {{-- <input type="submit" value="submit" /> --}}
                                      </div>
                                </form>
                        </div>
                    </div>
                </div>

                <form action="/adasd" method="post">
                    <button type="submit">casdasd</button>
                </form>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                Kelompok 10 - PASTI
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src={{asset("/assets/libs/jquery/dist/jquery.min.js")}}></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src={{asset("/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js")}}></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src={{asset("/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js")}}></script>
    <script src={{asset("/assets/extra-libs/sparkline/sparkline.js")}}></script>
    <!--Wave Effects -->
    <script src={{asset("/js/waves.js")}}></script>
    <!--Menu sidebar -->
    <script src={{asset("/js/sidebarmenu.js")}}></script>
    <!--Custom JavaScript -->
    <script src={{asset("/js/custom.min.js")}}></script>
    <!-- This Page JS -->
    <script src={{asset("/assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js")}}></script>
    <script src={{asset("/js/pages/mask/mask.init.js")}}></script>
    <script src={{asset("/assets/libs/select2/dist/js/select2.full.min.js")}}></script>
    <script src={{asset("/assets/libs/select2/dist/js/select2.min.js")}}></script>
    <script src={{asset("/assets/libs/jquery-asColor/dist/jquery-asColor.min.js")}}></script>
    <script src={{asset("/assets/libs/jquery-asGradient/dist/jquery-asGradient.js")}}></script>
    <script src={{asset("/assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js")}}></script>
    <script src={{asset("/assets/libs/jquery-minicolors/jquery.minicolors.min.js")}}></script>
    <script src={{asset("/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js")}}></script>
    <script src={{asset("/assets/libs/quill/dist/quill.min.js")}}></script>
</body>

</html>