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
                            <form class="form-horizontal" method="post" action="/dashboard/produk/tambah" enctype="multipart/form-data">
                              @csrf
                                <div class="card-body">
                                    <h3 class="card-title">TAMBAH PRODUK</h3><br>
                                    <br><br>

                                    <form enctype="multipart/form-data" method="post" action="/dashboard/produk" >
                                    <div class="modal-body">
                                      <div class="form-group mt-3">
                                          <div class="d-flex justify-content-center">
                                              <label class="mx-4 w-25" >Nama Produk</label>
                                              <input type="text" name="nama" class="form-control mx-3">
                                          </div>
                                      </div>
                            
                                      <div class="form-group mt-3">
                                          <div class="d-flex justify-content-center">
                                              <label class="mx-4 w-25" >Kategori</label>
                                              <input type="text" name="kategori" class="form-control mx-3">
                                          </div>
                                      </div>
                            
                                      <div class="form-group mt-3">
                                          <div class="d-flex justify-content-center">
                                              <label class="mx-4 w-25" >Harga</label>
                                              <input type="number" name="harga" class="form-control mx-3">
                                          </div>
                                      </div>
                            
                                      <div class="form-group mt-3">
                                          <div class="d-flex justify-content-center">
                                              <label class="mx-4 w-25" >Jumlah</label>
                                              <input type="text" name="jumlah" class="form-control mx-3">
                                          </div>
                                      </div>
                            
                                      <div class="form-group mt-3">
                                          <div class="d-flex justify-content-center">
                                              <label class="mx-4 w-25" >Deskripsi</label>
                                              <textarea name="detail" id="" cols="30" rows="10" class="form-control mx-3"></textarea>
                                          </div>
                                      </div>
                            
                                      <div class="form-group mt-3">
                                          <div class="d-flex justify-content-center">
                                              <label class="mx-4 w-25" >Gambar</label>
                                              <input type="file" name="gambar" class="form-control mx-3">
                                          </div>
                                      </div>
                            
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                  </div>
                            
                                  </form>


                                    <br><br><br>
                                    @error('nama')
                                      <p>{{$message}}</p>
                                    @enderror
                                    @error('kategori')
                                    <p>{{$message}}</p>
                                  @enderror
                                  @error('harga')
                                  <p>{{$message}}</p>
                                @enderror
                                @error('gambar')
                                <p>{{$message}}</p>
                              @enderror
                              @error('detail')
                              <p>{{$message}}</p>
                            @enderror

                            <div>
                              @if(session()->has('success'))
                                <p> Data berhasil masuk</p>
                              @endif
                            </div>
                                    <br>
                                    <div class="form-group">
                                      <label for="cono1"
                                          class="col-sm-3 control-label col-form-label">Gambar Produk</label>
                                      <div class="col-sm-9">
                                          <input type="file" name="gambar" class="custom-file-input">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="fname"
                                            class="col-sm-3 control-label col-form-label">Nama Produk</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nama" class="form-control" id="fname" placeholder="Nama produk disini">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="lname" class="col-sm-3 control-label col-form-label">Kategori Produk</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="kategori" id="lname" placeholder="Kategori produk disini">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="lname"
                                            class="col-sm-3 control-label col-form-label">Harga Produk</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" name="harga" id="lname" placeholder="Harga produk disini">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email1"
                                            class="col-sm-3 control-label col-form-label">Jumlah Produk</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="jumlah" class="form-control" id="email1" placeholder="Jumlah produk disini">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cono1"
                                            class="col-sm-3 control-label col-form-label">Detail</label>
                                        <div class="col-sm-9">
                                          <input id="detail" type="hidden" name="detail">
                                          <trix-editor input="detail" style="height: 200px;"></trix-editor>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp; Simpan</button>
                                    </div>
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
                All Rights Reserved by Matrix-admin. Designed and Developed by <a
                    href="https://www.wrappixel.com">WrapPixel</a>.
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
    <script>
        //***********************************//
        // For select 2
        //***********************************//
        $(".select2").select2();

        /*colorpicker*/
        $('.demo').each(function () {
            //
            // Dear reader, it's actually very easy to initialize MiniColors. For example:
            //
            //  $(selector).minicolors();
            //
            // The way I've done it below is just for the demo, so don't get confused
            // by it. Also, data- attributes aren't supported at this time...they're
            // only used for this demo.
            //
            $(this).minicolors({
                control: $(this).attr('data-control') || 'hue',
                position: $(this).attr('data-position') || 'bottom left',

                change: function (value, opacity) {
                    if (!value) return;
                    if (opacity) value += ', ' + opacity;
                    if (typeof console === 'object') {
                        console.log(value);
                    }
                },
                theme: 'bootstrap'
            });

        });
        /*datwpicker*/
        jQuery('.mydatepicker').datepicker();
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        var quill = new Quill('#editor', {
            theme: 'snow'
        });

    </script>
</body>

</html>