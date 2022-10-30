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
                        <h4 class="page-title">PEMESANAN</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Pemesanan</li>
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
                    <div class="col-12">
                        

                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <h5 class="card-title">Data Pemesanan</h5>
                                </div><br>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Pembeli</th>
                                                <th>Produk</th>
                                                <th>Harga</th>
                                                <th>Jumlah</th>
                                                <th>Total Harga</th>
                                                <th>Status</th>
                                                <th>Tanggal Pembelian</th>
                                                <th>Update Pembelian</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @dd($pesanan) --}}
                                            @foreach ($pesanan as $pes)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$pes->user->name}}</td>
                                                <td>{{$pes->produk->name}}</td>
                                                <td>{{$pes->produk->harga}}</td>
                                                <td>{{$pes->jumlah}}</td>
                                                <td>{{$pes->total}}</td>
                                                <td>
                                                    @if ($pes['status'] != 0)
                                                        <small class="text-success fw-bold"><i class="fas fa-check-square"></i> Sudah dibayar</small>
                                                        @else
                                                        <small class="text-danger"><i class="fas fa-window-close"></i> Belum dibayar</small>
                                                    @endif
                                                </td> 
                                                <td>{{\Carbon\Carbon::parse($pes['CreatedAt'])->format('d F Y , h ; i')}}</td>
                                                <td>{{\Carbon\Carbon::parse($pes['UpdatedAt'])->format('d F Y , h ; i')}}</td>
                                                {{-- <td>
                                                    <div class="d-flex">
                                                        <a href="/dashboard/produk/{{$pes['ID']}}" class="btn btn-info btn-sm text-white"><i class="fas fa-eye"></i> Lihat</a>
                                                        <a href="/dashboard/produk/{{$pes['ID']}}/edit" class="btn btn-warning btn-sm"><i class="far fa-edit"></i> Edit</a>
                                                        <form action="/dashboard/produk/{{$pes['ID']}}" method="post" >
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger btn-sm text-white"><i class=" fas fa-trash"></i> Hapus</button>
                                                        </form>
                                                    </div>
                                                </td> --}}
                                            </tr>
                                            @endforeach

                                            {{-- <form action="/dashboard/beritas/{{$b->slug}}" method="post" >
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Hapus</button>
                                            </form> --}}


                                        </tbody>
                                    </table>
                                </div>

                            </div>
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
    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="/js/custom.min.js"></script>
    <!-- this page js -->
    <script src="../../assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="../../assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="../../assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>

</body>

</html>