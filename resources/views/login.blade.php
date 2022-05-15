@include('template.header')

<body>
    <div class="login-page container mt-5">
    <div class="shadow  p-3 mb-5 bg-body rounded container border mt-5">
    <h2 class="text-center fw-bold">LOGIN</h2>

        <form action="/login" method="post">
            @csrf
            <label for="">Email</label>
            <input type="text" name="email" class="form-control" required>
            <label for="" class="mt-3">Password</label>
            <input type="text" name="password" class="form-control" required>
            <br>

            <div class="container text-center mt-4">
            <button type="submit" class="btn btn-primary form-control">Login</button>
            </div>
        </form>
    </div>
    </div>
</body>  
</html>