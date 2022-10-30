@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('flash_message_error'))
            <div class="alert alert-error alert block">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <center><strong style="color:red">{!! session('flash_message_error')!!}</strong></center>
            </div>
            @endif
            @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert block" style="background: #69f0ae;">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <center><strong style="color:green">{!! session('flash_message_success')!!}</strong></center>
            </div>
            @endif

            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="/loginUser">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Alamat Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Ingat saya') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0 text-center">
                            <div class="col-md-12">
                                <button type="submit" style="width: 30%" class="btn btn-primary ">
                                    {{ __('Login') }}
                                </button>

                            </div>
                        </div>

                        <div class="row mb-0 text-center">
                            <div class="col-md-12">

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Anda lupa Password?') }}
                                </a>
                                @endif
                                
                                <a href="" style="margin-left: 20px;" data-bs-toggle="modal" data-bs-target="#exampleModal">Kirim OTP kembali</a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kirim OTP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <form method="POST" action="{{url('/postResend')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Alamat Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>


                </form>

            </div>
        </div>
    </div>
</div>

@endsection