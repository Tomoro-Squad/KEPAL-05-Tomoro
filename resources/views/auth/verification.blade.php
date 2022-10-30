@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            <div class="card">
                <div class="card-header">{{ __('Verifikasi OTP') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{url('/postVerification')}}">
                        @csrf

                        <div class="row mb-3">
                            <label for="otp" class="col-md-4 col-form-label text-md-end"></label>
                            <div class="col-md-6">
                                @if(Session::has('flash_message_error'))
                                <strong style="color:red">{!! session('flash_message_error')!!}</strong>
                                @endif

                                @if(Session::has('flash_message_success'))
                                <strong style="color:green">{!! session('flash_message_success')!!}</strong>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="otp" class="col-md-4 col-form-label text-md-end">{{ __('Kode OTP') }}</label>

                            <div class="col-md-6">
                                <input id="otp" type="text" maxlength="6" class="form-control @error('otp') is-invalid @enderror" name="otp" value="{{ old('otp') }}" required autocomplete="otp" autofocus>
                            </div>


                        </div>




                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Kirim
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection