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
                        <h4 class="page-title">PRODUCTS</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Product</li>
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
                                    <h5 class="card-title">Daftar Product</h5>
                                </div><br>
                                <div class="d-flex">
                                    <div class="">
                                        <a button="Click here" class="btn btn-primary" href="/dashboard/produk/create"><i class="fas fa-plus-square"></i> &nbsp;Tambah Product</a>
                                    </div>
                                </div><br>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Kategori</th>
                                                <th>Jumlah</th>
                                                <th>Harga</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($produk as $pro)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$pro['name']}}</td>
                                                <td>{{$pro['kategori_id']}}</td>
                                                <td>{{$pro['jumlah']}}</td>
                                                <td>{{$pro['harga']}}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="/dashboard/produk/{{$pro['id']}}" class="btn btn-info btn-sm text-white mx-1"><i class="fas fa-eye"></i> Lihat</a>
                                                        <a href="/dashboard/produk/{{$pro['id']}}/edit" class="btn btn-warning btn-sm  mx-1"><i class="far fa-edit"></i> Edit</a>
                                                        <button type="submit" class="btn btn-danger btn-sm text-white mx-1" data-bs-toggle="modal" data-bs-target="#produk{{$pro->id}}"><i class=" fas fa-trash"></i> Hapus</button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Modal -->
                                            <div class="modal fade rounded" id="produk{{$pro->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog rounded">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    {{-- <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi</h1> --}}
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4 class="text-center">Apakah anda yakin ingin menghapus produk ini?</h4>
                                                    </div>
                                                    <div class="d-flex p-2 justify-content-center">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>&nbsp;&nbsp;
                                                    <form action="/dashboard/produk/{{$pro['id']}}" method="post" >
                                                        @method('delete')
                                                        @csrf
                                                        <input type="hidden" name="deleted_at" value="{{\Carbon\Carbon::now()}}">
                                                        <input type="hidden" name="deleted_by" value="{{Auth::user()->id}}">
                                                        <button type="submit" class="btn btn-danger text-white"><i class=" fas fa-trash"></i> Hapus</button>
                                                    </form>
                                                    </div>
                                                    <br><br>
                                                </div>
                                                </div>
                                            </div>

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