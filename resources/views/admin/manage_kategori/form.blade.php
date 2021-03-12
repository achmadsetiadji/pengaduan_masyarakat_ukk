<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"></div>
                            Tambah Kategori Laporan
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
                <form class="pt-3 pb-3" action="{{ empty($kategoriLaporan) ? url(Auth::user()->role.'/manage_kategori_laporan/create') : url(Auth::user()->role.'/manage_kategori_laporan/edit/'.$kategoriLaporan->id.'') }}" method="POST">
                    @if (!empty ($kategoriLaporan))
                    @method('put')
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="nama_kategori">Nama Kategori</label>
                        <input class="form-control @error('nama_kategori') is-invalid @enderror " id="nama_kategori" name="nama_kategori" type="text" placeholder="Masukan Nama Kategori Laporan" value="{{ !empty($kategoriLaporan) ? $kategoriLaporan->nama_kategori : old('nama_kategori') }}"/>
                        @error('nama_kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-success float-right" type="submit"><i class="fas fa-save mr-2"></i>Simpan</button>
                </form>
            </div>
        </div>
        <a class="text-danger text-decoration-none float-right mr-2" href="/admin/manage_kategori_laporan" role="button"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
    </div>
</main>
