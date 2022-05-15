<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200;400&family=Nunito:ital,wght@0,500;1,400&family=Poppins&family=Quicksand:wght@600&family=Roboto:wght@400;500;900&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>TokoOnlen</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light p-1">

    <div class="d-flex ">
      <a class="navbar-brand fw-bold" href="/" style=" color: #2ED00D;"><h4><img src="{{asset('/file/logo.jpg')}}" alt="" style="max-width:40px;"> TokOnlen</h4></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        @auth           
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown mt-3">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button"  data-bs-display="static" aria-expanded="false" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-user" style=""></i>&nbsp;{{Auth::user()->name}}
            </a>
            <ul class="dropdown-menu dropdown-menu-dark mr-5" aria-labelledby="navbarDarkDropdownMenuLink" style="width:max-content">
              @if (Auth::user()->role == 1)
              <li><a class="dropdown-item" href="/dashboard/produk">Dashboard</a></li>
              @endif
              <li>
                <div class="dropdown-item" href="">
                  <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="bg-transparent border-0 link-danger"><i class="fas fa-sign-out-alt"></i>&nbsp; Logout</button>
                  </form>
                </div>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/keranjang" >
              <img src="{{asset('file/keranjang.png')}}" style="width: 80px; margin-top: -4px;" alt="">
              @php
                $i = 0;
              @endphp
              @foreach ($pesanan as $pes)
              @if (Auth::user()->id == $pes['user_id'] && $pes['status'] == 0)
                @php
                  $i++;
                @endphp
              @endif
              @endforeach
              @if (Auth::user()->id == $pes['user_id'] && $pes['status'] == 0)
              <span class="bg-danger rounded-circle text-white position-absolute px-1" style="margin-left: -25px;"><small class="text-sm" style="font-size:10px">{{$i}}</small></span>
              @endif
            </a>
          </li>
        </ul>
        @else
        <div class="d-flex justify-content-end">
          <a href="/login" class="btn btn-success btn-sm" >Login</a>&nbsp;
          <a href="/register" class="btn btn-outline-success btn-sm" >Register</a>
        </div>
        @endauth
      </div>
    </div>
  </nav>