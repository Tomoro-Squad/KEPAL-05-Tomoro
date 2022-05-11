
  <body>
   @include('template/header')
     <div>
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{asset('file/slide1.jpg')}}" class="d-block w-100 h-60" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{asset('file/slide2.webp')}}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{asset('file/slide3.jpg')}}" class="d-block w-100" alt="...">
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

     <br><br>

    <div class="row container">
      @foreach ($data as $item)
      <div class="col-md-4 container mb-3">
        <div class="card container" style="width: 18rem;">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{$item['nama']}}</h5>
            <p class="card-text">{{$item['detail']}}</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Rp.{{$item['harga']}}</li>
            <li class="list-group-item">{{$item['kategori']}}</li>
          </ul>
          <div class="card-body">
            <a href="#" class="btn btn-success btn-sm">Order</a>
            <a href="#" class="btn btn-secondary btn-sm">Detail</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <input type="file" class="btn btn-primary">
    @include('template.footer')

  </body>
</html>