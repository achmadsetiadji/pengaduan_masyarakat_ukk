@extends('layouts.auth')

@section('title', 'Register | LAPEMAS')

@section('content')
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <!-- Basic registration form-->
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header justify-content-center">
                                <h3 class="font-weight-light my-4">Create Account</h3>
                            </div>
                            <div class="card-body">
                                <!-- Registration form-->
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <!-- Form Row-->
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="name">Nama Lengkap</label>
                                                <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text"
                                                    aria-describedby="nameHelp" placeholder="Masukkan Nama Lengkap Anda" value="{{ old('name') }}"/>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="email">Email</label>
                                                <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email"
                                                    aria-describedby="emailHelp" placeholder="Masukkan Email Anda" value="{{ old('email') }}"/>
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Form Row-->
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="nik">NIK</label>
                                                <input class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" type="number"
                                                    aria-describedby="nikHelp" placeholder="Masukkan NIK Anda" value="{{ old('nik') }}"/>
                                                    @error('nik')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="telp">Nomor Telepon</label>
                                                <input class="form-control @error('telp') is-invalid @enderror" id="telp" name="telp" type="tel"
                                                    aria-describedby="telpHelp" placeholder="Masukkan Nomor Telepon Anda" />
                                                    @error('telp')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Form Row    -->
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <!-- Form Group (password)-->
                                            <div class="form-group">
                                                <label class="small mb-1" for="password">Password</label>
                                                <input class="form-control @error('password') is-invalid @enderror" id="password" name="password" type="password"
                                                    placeholder="Enter password" />
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- Form Group (confirm password)-->
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Confirm password">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Form Group (create account submit)-->
                                    <div class="form-group mt-4 mb-0">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            Create Account
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <div class="small"><a href="{{ route('login') }}">Have an account? Go to login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="footer mt-auto footer-dark">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 small">Copyright &copy; Your Website 2021</div>
                    <div class="col-md-6 text-md-right small">
                        <a href="#!">Privacy Policy</a>
                        &middot;
                        <a href="#!">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
@endsection
