<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-fluid">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fas fa-user"></i></div>
                            Profil Saya
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container mt-4">
        <!-- Account page navigation-->
        <nav class="nav nav-borders">
            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Informasi Pribadi</a>
            <a class="nav-link" id="keamanan-tab" data-toggle="tab" href="#keamanan" role="tab" aria-controls="keamanan" aria-selected="false">Keamanan</a>
        </nav>
        <hr class="mt-0 mb-4" />
        @include('includes.alert')
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card">
                    <div class="card-header">Foto Profil</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        @if (Auth::user()->image == null)
                            <img class="img-account-profile rounded-circle mb-2" src="{{asset('backend/assets/img/illustrations/profiles/profile-1.png')}}" alt="" />
                        @else
                            <img class="img-account-profile rounded-circle mb-2" src="{{asset('upload/images/'.Auth::user()->image)}}" />
                        @endif
                        <!-- Profile picture help block-->
                        <form action="/image_profile/{{Auth::user()->id}}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 2 MB</div>
                            <input class="my-2" type="file" id="image" name="image">
                            <!-- Profile picture upload button-->
                            <button class="btn btn-primary" type="submit">Upload Foto</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="tab-content col-xl-8" id="myTabContent">
                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Informasi Pribadi</div>
                        <div class="card-body">
                            <form action="/profile/{{Auth::user()->id}}" method="POST">
                                @method('put')
                                @csrf
                                <!-- Form Group (username)-->
                                <div class="form-group">
                                    <label class="small mb-1" for="name">Nama</label>
                                    <input class="form-control @error('name') is-invalid @enderror "name="name" id="name" type="text" placeholder="Enter your username" value="{{Auth::user()->name}}" />
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Form Group (email address)-->
                                <div class="form-group">
                                    <label class="small mb-1" for="email">Email</label>
                                    <input class="form-control @error('email') is-invalid @enderror" name="email" id="email" type="email" placeholder="Enter your email address" value="{{Auth::user()->email}}" />
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Form Row-->
                                <div class="form-row">
                                    <!-- Form Group (NIK)-->
                                    <div class="form-group col-md-6">
                                        <label class="small mb-1" for="nik">NIK</label>
                                        <input class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik" type="number"  placeholder="Masukan NIK Anda" value="{{Auth::user()->nik}}"/>
                                        @error('nik')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Form Group (Nomor Telepon)-->
                                    <div class="form-group col-md-6">
                                        <label class="small mb-1" for="telp">Nomor Telepon</label>
                                        <input class="form-control @error('telp') is-invalid @enderror" name="telp" id="telp" type="tel" placeholder="Masukan Nomor Telepon Anda" value="{{Auth::user()->telp}}"/>
                                        @error('telp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Save changes button-->
                                <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="keamanan" role="tabpanel" aria-labelledby="keamanan-tab">
                    <!-- Change password card-->
                    <div class="card mb-4">
                        <div class="card-header">Change Password</div>
                        <div class="card-body">
                            <form action="{{route('profile.change_password')}}" method="POST">
                                @method('put')
                                @csrf
                                <!-- Form Group (current password)-->
                                <div class="form-group">
                                    <label class="small mb-1" for="currentPassword">Current Password</label>
                                    <input class="form-control @error('currentPassword') is-invalid @enderror" id="currentPassword" name="currentPassword" type="password" placeholder="Enter current password" />
                                    @error('currentPassword')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Form Group (new password)-->
                                <div class="form-group">
                                    <label class="small mb-1" for="newPassword">New Password</label>
                                    <input class="form-control @error('newPassword') is-invalid @enderror" id="newPassword" name="newPassword" type="password" placeholder="Enter new password" />
                                    @error('newPassword')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Form Group (confirm password)-->
                                <div class="form-group">
                                    <label class="small mb-1" for="confirmPassword">Confirm Password</label>
                                    <input class="form-control @error('confirmPassword') is-invalid @enderror" id="confirmPassword" name="confirmPassword" type="password" placeholder="Confirm new password" />
                                    @error('confirmPassword')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
