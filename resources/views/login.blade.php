@include('template.header')

<body>
    <div class="login-page container mt-5">
    <div class="shadow  p-3 mb-5 bg-body rounded container border mt-5">
    <h2 class="text-center fw-bold">LOGIN</h2>
    @if(session()->has('loginError'))
    <h6 class="text-center text-danger">{{session('loginError')}}</h6>
    @endif
        <br><br>
        <form action="/login" method="post">
            @csrf
            <label for="">Email</label>
            <input type="text" name="email" class="form-control" required>
            @error('email')
                <small class="text-danger">{{$message}}</small>
            @enderror
            <br>
            <label for="" class="mt-3">Password</label>
            <input type="password" name="password" class="form-control" required>
            @error('password')
                <small class="text-danger">{{$message}}</small>
            @enderror
            <br>

            <div class="container text-center mt-4">
            <button type="submit" class="btn btn-primary form-control">Login</button>
            </div>
        </form>
    </div>
    </div>
</body>  
</html>