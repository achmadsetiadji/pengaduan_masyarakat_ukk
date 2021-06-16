@extends('layouts.auth')

@section('title', 'Login | LAPEMAS')

@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <!-- Basic login form-->
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header justify-content-center">
                        <h3 class="font-weight-light my-4">Login</h3>
                    </div>
                    <div class="card-body">
                        <!-- Login form-->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <!-- Form Group (email address)-->
                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                <input class="form-control @error('email') is-invalid @enderror" id="inputEmailAddress"
                                    type="email" name="email" autocomplete="email" autofocus
                                    placeholder="Masukan Email Anda" />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <!-- Form Group (password)-->
                            <div class="form-group">
                                <label class="small mb-1" for="inputPassword">Password</label>
                                <input class="form-control @error('password') is-invalid @enderror" id="inputPassword"
                                    type="password" name="password" autocomplete="current-password"
                                    placeholder="Masukan Password Anda" />
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <!-- Form Group (remember password checkbox)-->
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox"
                                        name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                                        <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                </div>
                            </div>
                            <!-- Form Group (login box)-->
                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                @if (Route::has('password.request'))
                                <a class="small" href="auth-password-basic.html">Forgot Password?</a>
                                @endif
                                <button class="btn btn-primary" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <div class="small">
                            <a href="{{ route('register') }}">Butuh Akun? Register Sekarang!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
