<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"></div>
                            Tambah Lokasi
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
                <form class="pt-3 pb-3" action="{{ empty($lokasi) ? url(Auth::user()->role.'/manage_lokasi/create') : url(Auth::user()->role.'/manage_lokasi/edit/'.$lokasi->id.'') }}" method="POST">
                    @if (!empty ($lokasi))
                    @method('put')
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="nama_lokasi">Nama Lokasi</label>
                        <input class="form-control @error('nama_lokasi') is-invalid @enderror " id="nama_lokasi" name="nama_lokasi" type="text" placeholder="Masukan Nama Lokasi" value="{{ !empty($lokasi) ? $lokasi->nama_lokasi : old('nama_lokasi') }}"/>
                        @error('nama_lokasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="lat">Latitude</label>
                        <input class="form-control @error('lat') is-invalid @enderror " id="lat" name="lat" type="text" placeholder="Masukan Latitude" value="{{ !empty($lokasi) ? $lokasi->lat : old('lat') }}"/>
                        @error('lat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="long">Longitude</label>
                        <input class="form-control @error('long') is-invalid @enderror " id="long" name="long" type="text" placeholder="Masukan Longitude" value="{{ !empty($lokasi) ? $lokasi->long : old('long') }}"/>
                        @error('long')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-success float-right" type="submit"><i class="fas fa-save mr-2"></i>Simpan</button>
                </form>
            </div>
        </div>
        <a class="text-danger text-decoration-none float-right mr-2" href="/admin/manage_lokasi" role="button"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
    </div>
</main>
