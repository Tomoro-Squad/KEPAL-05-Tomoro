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
                            <form class="form-horizontal" method="post" action="/dashboard/produk" enctype="multipart/form-data">

                                <div class="card-body">
                                    <h3 class="card-title">TAMBAH PRODUK</h3><br>
                                    <br><br>

                                    <form enctype="multipart/form-data" method="post" action="/dashboard/produk" >
                                        @csrf
                                    <div class="modal-body">
                                      <div class="form-group mt-3">
                                          <div class="">
                                              <label class="mx-4 w-25" >Nama Produk</label>
                                              <input type="text" name="name" class="form-control mx-3" placeholder="Nama produk disini" required>
                                              @error('nama')
                                              <small class="text-danger container">
                                                 {{$message}}
                                              </small>
                                              @enderror
                                          </div>
                                      </div>
                            
                                      <div class="form-group mt-3">
                                          <div class="">
                                              <label class="mx-4 w-25" >Kategori</label>
                                              <select name="kategori_id" class="form-control mx-3" placeholder="Kategori disini" required>
                                                <option value="Smartphone">Smartphone</option>
                                                <option value="Laptop">Laptop</option> 
                                                <option value="Computer">Computer</option> 
                                                <option value="Earphone / Headshet">Earphone / Headshet</option> 
                                                <option value="Cable">Cable<option> 
                                                <option value="Memory">Memory</option> 
                                              </select>
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
                                              <input type="number" name="harga" class="form-control mx-3" placeholder="Harga disini" required>
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
                                              <input type="number" name="jumlah" class="form-control mx-3" placeholder="Jumlah disini" required>
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
                                                <input id="detail" type="hidden" name="detail" >
                                                <trix-editor input="detail" style="height: 250px;"></trix-editor>
                                                @error('detail')
                                                <small class="text-danger container">
                                                     {{$message}}
                                                </small>
                                                @enderror
                                              </div>
                                          </div>
                                      </div>
                            
                                      <div class="form-group mt-3">
                                          <div class="">
                                              <label class="mx-4 w-25" >Gambar</label><br>
                                              <input type="file" name="gambar[]" class="custom-file-input mx-3" multiple>
                                              @error('gambar')
                                              <small class="text-danger container">
                                                {{$message}}
                                              </small>
                                              @enderror
                                          </div>
                                      </div>
                            
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                  </div>
                            
                                  </form>
                        </div>
                    </div>
                </div>
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