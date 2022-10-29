<div class="container">
    @include('template/header')<br>

    <h2 class="mb-3 mt-4 fw-bold mx-4 mb-5 mt-5">PROFIL PENGGUNA</h2>

    <div class="row">
        <div class="col-8">
            <label for="">Nama</label>
            <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}" disabled>
            @error('name') <p class="text-danger">{{$message}}</p> @enderror

            <label for="" class="mt-3">Alamat Email</label>
            <input type="text" name="email" class="form-control" value="{{Auth::user()->email}}" disabled>
            @error('email') <p class="text-danger">{{$message}}</p> @enderror

            <label for="" class="mt-3">Username</label>
            <input type="text" name="username" class="form-control" value="{{Auth::user()->username}}" disabled>
            @error('username') <p class="text-danger">{{$message}}</p> @enderror

            <label for="" class="mt-3">Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{Auth::user()->alamat}}" disabled>
            @error('alamat') <p class="text-danger">{{$message}}</p> @enderror

            <label for="" class="mt-3">Jenis Kelamin</label>
            <input type="text" name="gender" class="form-control" value="{{Auth::user()->gender}}" disabled>
            @error('gender') <p class="text-danger">{{$message}}</p> @enderror
        </div>
    </div>

    <br><br><br><br>
    @include('template.footer')

</div>

</html>