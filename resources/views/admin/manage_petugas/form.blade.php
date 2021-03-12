<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"></div>
                            Tambah Petugas
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container mt-n10">
        <div class="card mb-4">
            <div class="card-body">
                <form class="pt-3 pb-3" action="{{ empty($petugas) ? url(Auth::user()->role.'/manage_petugas/create') : url(Auth::user()->role.'/manage_petugas/edit/'.$petugas->id.'') }}" method="POST">
                    @if (!empty ($petugas))
                    @method('put')
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Petugas</label>
                        <input class="form-control @error('name') is-invalid @enderror " id="name" name="name" type="text" placeholder="Masukan Nama Lengkap" value="{{ !empty($petugas) ? $petugas->name : old('name') }}"/>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control @error('email') is-invalid @enderror " id="email" name="email" type="email" placeholder="Masukan Email" value="{{ !empty($petugas) ? $petugas->email : old('email') }}"/>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input class="form-control @error('nik') is-invalid @enderror " id="nik" name="nik" type="text" placeholder="Masukan NIK" value="{{ !empty($petugas) ? $petugas->nik : old('nik') }}"/>
                        @error('nik')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="telp">Nomor Telepon</label>
                        <input class="form-control @error('telp') is-invalid @enderror " id="telp" name="telp" type="tel" placeholder="Masukan Nomor Telepon" value="{{ !empty($petugas) ? $petugas->telp : old('telp') }}"/>
                        @error('telp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="hidden" name="role" value="petugas">
                    <button class="btn btn-success float-right" type="submit"><i class="fas fa-save mr-2"></i>Simpan</button>
                </form>
            </div>
        </div>
        <a class="text-danger text-decoration-none float-right mr-2" href="/admin/manage_petugas" role="button"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
    </div>
</main>
