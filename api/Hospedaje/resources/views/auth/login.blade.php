@extends('layouts.app')

@section('content')
<section class="pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 pt-5 bsb-tpl-bg-platinum">
                <div class="d-flex flex-column justify-content-between h-100 p-3 p-md-4 p-xl-5">
                    <img class="img-fluid rounded mx-auto my-4" src="./image/pexels-pixabay-164558.jpg" width="800"
                        height="80" alt="BootstrapBrain Logo">
                    <p class="mb-0">Not a member yet? <a href="#!" class="link-secondary text-decoration-none">Register
                            now</a></p>
                </div>
            </div>
            <div class="col-12 col-md-6 pt-5 bsb-tpl-bg-lotion">
                <div class="p-3 p-md-4 p-xl-5">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-5">
                                <h3>{{ __('Login') }}</h3>
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                    @csrf
                        <div class="row gy-3 gy-md-4 overflow-hidden">
                            <div class="col-12">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address')
                                    }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password')
                                    }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" name="remember_me"
                                        id="remember_me">
                                    <label class="form-check-label text-secondary" for="remember_me">
                                        Keep me logged in
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-grid">
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
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-12">
                            <hr class="mt-5 mb-4 border-secondary-subtle">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                    old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection