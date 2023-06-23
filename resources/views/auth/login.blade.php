@extends('Frontlayout.master')

@section('content')
<div class="page-header">
    <div class="container d-flex flex-column align-items-center">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="demo4.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="category.html">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        My Account
                    </li>
                </ol>
            </div>
        </nav>

        <h1>My Account</h1>
    </div>
</div>

<div class="container login-container">
    <div class="row">
        <div class="col-lg-10 text-center my-5">
            @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="error" style="color: red">{{$error}}</div>
            @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="row">
                <div class="col-md-6">
                    <div class="heading mb-1">
                        <h2 class="title">Login</h2>
                    </div>


                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <label for="login-email">
                            Username or email address
                            <span class="required">*</span>
                        </label>
                        <input type="email" class="form-input form-wide" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label for="login-password">
                            Password
                            <span class="required">*</span>
                        </label>
                        <input type="password" class="form-input form-wide" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="form-footer">
                            <div class="custom-control custom-checkbox mb-0">
                                <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label mb-0" for="lost-password">Remember
                                    me</label>
                            </div>

                            {{-- <a href="forgot-password.html"
                                class="forget-password text-dark form-footer-right">Forgot
                                Password?</a> --}}
                        </div>
                        <button type="submit" class="btn btn-dark btn-md w-100">
                            LOGIN
                        </button>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="heading mb-1">
                        <h2 class="title">Register</h2>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <label for="register-email">
                            User Name
                            <span class="required">*</span>
                        </label>
                        <input type="text" name="name" class="form-input form-wide @error('name') is-invalid @enderror"  id="register-name" required />
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        <label for="register-email">
                            Email address
                            <span class="required">*</span>
                        </label>
                        <input type="email" name="email" class="form-input form-wide @error('email') is-invalid @enderror" id="register-email" required />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        <label for="register-password">
                            Password
                            <span class="required">*</span>
                        </label>
                        <input type="password" name="password" class="form-input form-wide @error('password') is-invalid @enderror" id="register-password"
                            required />
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        <label for="register-confirmpassword">
                           Confirm Password
                            <span class="required">*</span>
                        </label>
                        <input id="password-confirm" type="password" class="form-input form-wide" name="password_confirmation" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        <div class="form-footer mb-2">
                            <button type="submit" class="btn btn-dark btn-md w-100 mr-0">
                                Register
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
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
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
