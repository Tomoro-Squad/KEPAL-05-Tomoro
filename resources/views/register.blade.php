@include('template.header')

<body>
    <div class="container text-center">
        @if (session()->has('success'))
            <h2>{{session('success')}}</h2>
        @endif
    </div>

    <div class="shadow  p-3 mb-5 bg-body rounded container border mt-5">
    <h2 class="text-center fw-bold">FORM REGISTRASI</h2>

    <div class="login-page container mt-4">
        <form action="register" method="post">
            @csrf 
            <label for="">Nama</label>
            <input type="text" name="name" class="form-control">
            @error('name') <p class="text-danger">{{$message}}</p> @enderror

            <label for="" class="mt-3">Username</label>
            <input type="text" name="username" class="form-control">
            @error('username') <p class="text-danger">{{$message}}</p> @enderror

            <label for="" class="mt-3">Alamat</label>
            <input type="text" name="alamat" class="form-control">
            @error('alamat') <p class="text-danger">{{$message}}</p> @enderror

            <label for="" class="mt-3">Jenis Kelamin</label>
            <Select for="" class="form-control" name="gender">
                <option value="Laki - laki">Laki - laki</option>
                <option value="Perempuan">Perempuan</option>
            </Select>
            @error('gender') <p class="text-danger">{{$message}}</p> @enderror

            <label for="" class="mt-3">Email</label>
            <input type="text" name="email" class="form-control">
            @error('email') <p class="text-danger">{{$message}}</p> @enderror


            <label for="" class="mt-3">Password</label>
            <input type="text" name="password" class="form-control">
            @error('password') <p class="text-danger">{{$message}}</p> @enderror

            <br>
            <div class="container text-center mt-4">
            <button type="submit" class="btn btn-primary form-control">Daftar</button>
            </div>
           
        </form>
    </div>
    </div>

</body>  
</html>