@extends('layout.main')

@section('title', 'WelcomeNest')

@section('content')
<section class="pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 pt-5 bsb-tpl-bg-platinum">
                <div class="d-flex flex-column justify-content-between h-100 p-3 p-md-4 p-xl-5">
                    <h3 class="m-0">Welcome!</h3>
                    <img class="img-fluid rounded mx-auto my-4"
                        src="./image/pexels-pixabay-164558.jpg" width="245" height="80"
                        alt="BootstrapBrain Logo">
                    <p class="mb-0">Not a member yet? <a href="#!" class="link-secondary text-decoration-none">Register
                            now</a></p>
                </div>
            </div>
            <div class="col-12 col-md-6 pt-5 bsb-tpl-bg-lotion">
                <div class="p-3 p-md-4 p-xl-5">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-5">
                                <h3>Log in</h3>
                            </div>
                        </div>
                    </div>
                    <form action="#!">
                        <div class="row gy-3 gy-md-4 overflow-hidden">
                            <div class="col-12">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="name@example.com" required>
                            </div>
                            <div class="col-12">
                                <label for="password" class="form-label">Password <span
                                        class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="password" id="password" value=""
                                    required>
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
                                    <button class="btn bsb-btn-xl btn-warning" type="submit">Log in now</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-12">
                            <hr class="mt-5 mb-4 border-secondary-subtle">
                            <div class="text-end">
                                <a href="#!" class="link-secondary text-decoration-none">Forgot password</a>
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