@include('admin/template-admin/header')

@include('admin/template-admin/sidebar')
        <style>
            .edit-button{
                padding: 8px;
                padding-right: 10px;
                padding-left: 10px;
                /* border: 1px solid black; */
                width: max-content;
                /* border-radius: 100%; */
                position: absolute;
            }
        </style>
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
                                    <h3 class="card-title">Detail Produk</h3><br>
                                    <div class="row">
                                        <div class="col-md-5 mb-3">
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
                                              <div class="">
                                                <div class="edit-button rounded-pill">
                                                    <a href=""><small><i class="fas fa-edit"></i> Ubah gambar</small></a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        {{-- @foreach ($produk as $pro) --}}
                                        <div class="col-md-5">
                                            <div>
                                                <h4>{{$produk->name}}</h4>
                                                <b class="text-secondary">{{$produk->kategori_id}}</b>
                                            </div>
                                            <div>
                                                <h2 class="mt-2 text-info fw-bold">Rp.{{$produk->harga}}</h2>
                                                <p>Jumlah produk : {{$produk->jumlah}} buah</p>
                                            </div>
                                            <div>
                                                <h5 class="text-success">Detail</h5>
                                                <p>
                                                    {!!$produk->detail!!} 
                                                </p>
                                            </div>
                                        </div>
                                        {{-- @endforeach --}}
                                    </div>

                                    <br>
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