
  <div class="container">
   @include('template/header')<br>
     <div class="row container">
      <div class="col-md-7 container mb-3">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{asset('file/slide1.png')}}" class=" w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="{{asset('file/slide2.png')}}" class=" w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="{{asset('file/slide3.png')}}" class=" w-100" alt="...">
            </div>
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
       </div>
       <div class="col-md-5 container">
          <div class="text-center container info-ramadhan p-3">
            <div class="p-4">
              <h2>Diskon Ramadhan 50%</h2>
              <h1><i class="fas fa-truck"></i></h1>
              <p>Dell is offering their G15 Intel Core i5-11260H 15.6" 1080p 120Hz Gaming Laptop w/ 4GB GDDR6 NVIDIA GeForce RTX 3050 Ti Graphics, 8GB DDR4 2933MHz RAM and 256GB M.2 Solid State Drive for $699.99 Free Shipping. Save $485 off the $1185 list price.<br><br>Save $435 on the faster CPU G15 Gaming Laptop configuration available with AMD Ryzen 7 5800H 8-Core CPU for a low $799.99 after Coupon Code: "50OFF699"</p>
            </div>
          </div>
        </div>

     </div>
     <br><br>
     <div class="produk">
       <h3 class="text-secondary fw-bold container"><img src="{{asset("file/produk.png")}}" style="width: 40px" alt=""> Pilihan Produk</h3>
       <br>
      <div class="row">
       
     @foreach ($produk as $pro)
          <div class="col-lg-3 col-md-4 col-sm-5 mb-3 container">
            <div class="card-produk border border-1 container p-2">
              <div class="text-center">
              <div class="border border-1 d-flex container" style="width: max-content;">
                <img src="produk/{{$pro['gambar']}}"  alt="" style="width: 100%; height: 100px;"> 
              </div>
              <div class="mt-2">
                <small class="">{{$pro['nama']}}</small>
                <h4 class="harga-produk mt-2">Rp.{{$pro['harga']}}</h4>
              </div>
              <div class="mb-2 mt-3">
                <a href="/produk/{{$pro['ID']}}" class="tombol-detail  py-1 px-4">Detail</a>
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