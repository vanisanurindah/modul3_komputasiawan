@extends('layouts.app2')

@section('content')
<style>
    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-image: url('https://cdn0-production-images-kly.akamaized.net/2qetjl1N-Dujir0nY3MlkxY1Wwo=/1200x675/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/3033787/original/095111500_1580130643-linen-542866_1920.jpg'); /* Path gambar background */
        background-size: cover;
        background-position: center;
    }
    .login-card {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 500px;
        background-color:rgba(255, 255, 255, 0.9); /* Sedikit transparan untuk terlihat lebih baik dengan background */
        padding: 20px;
    }
    .login-card-header {
        background-color: rgba(189, 125, 6, 0.493);
        color: white;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        text-align: center;
        padding: 10px 0;
    }
    .login-card-body {
        padding: 20px;
    }
    .login-input {
        margin-bottom: 15px;
    }
    .login-btn {
        background-color: rgba(189, 125, 6, 0.493);
        border: none;
        width: 100%;
    }
    .login-btn:hover {
        background-color: rgba(161, 100, 7, 0.853);
    }
    .login-title {
        text-align: center;
        margin-bottom: 20px;
        font-size: 24px;
        color: rgba(161, 100, 7, 0.853);
        font-weight: bold;
    }
</style>
<div class="login-container">
    <div class="card login-card">
        <div class="login-title">{{ __('Login Akun') }}</div>
        <div class="card-header login-card-header">{{ __('Login') }}</div>

        <div class="card-body login-card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="row mb-3 login-input">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3 login-input">
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

                <div class="row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary login-btn">
                            {{ __('Login') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
