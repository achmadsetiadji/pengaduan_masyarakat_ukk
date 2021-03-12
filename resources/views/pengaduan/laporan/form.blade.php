<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"></div>
                            Tambah Laporan Pengaduan
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container mt-n10">
        <div class="card mb-4">
            {{-- <div class="card-header">
                <nav class="nav nav-borders">
                    <a class="nav-link active" id="pengaduan-tab" data-toggle="tab" href="#pengaduan" role="tab" aria-controls="pengaduan" aria-selected="true">Pengaduan</a>
                    <a class="nav-link" id="aspirasi-tab" data-toggle="tab" href="#aspirasi" role="tab" aria-controls="aspirasi" aria-selected="false">Aspirasi</a>
                    <a class="nav-link" id="permintaan-informasi-tab" data-toggle="tab" href="#permintaan-informasi" role="tab" aria-controls="permintaan-informasi" aria-selected="false">Permintaan Informasi</a>
                </nav>
            </div> --}}

            {{-- <div class="tab-content col-xl-12" id="myTabContent">
                <div class="tab-pane fade show active" id="pengaduan" role="tabpanel" aria-labelledby="pengaduan-tab"> --}}
                    <div class="card-body">
                        <form class="pt-3 pb-3" action="{{ empty($laporan) ? url(Auth::user()->role.'/laporan/create') : url(Auth::user()->role.'/laporan/edit/'.$laporan->id.'') }}" method="POST">
                            @if (!empty ($laporan))
                            @method('put')
                            @endif
                            @csrf
                            {{-- <input type="hidden" name="type" value="Pengaduan"> --}}
                            <div class="form-group">
                                <input class="form-control @error('judul_laporan') is-invalid @enderror " id="judul_laporan" name="judul_laporan" type="text" placeholder="Ketik Judul Laporan Anda" value="{{ old('judul_laporan') }}"/>
                                @error('judul_laporan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea class="form-control @error('isi_laporan') is-invalid @enderror" id="isi_laporan" name="isi_laporan" rows="12" placeholder="Ketik Isi Laporan Anda">{{ old('isi_laporan') }}</textarea>
                                @error('isi_laporan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input class="form-control @error('tanggal_kejadian') is-invalid @enderror datepicker" id="tanggal_kejadian" name="tanggal_kejadian" type="text" placeholder="Pilih Tanggal Kejadian" value="{{ old('tanggal_kejadian') }}"/>
                                @error('tanggal_kejadian')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <select class="custom-form border form-control @error('lokasi_id') is-invalid @enderror selectpicker" id="lokasi_id" name="lokasi_id" data-live-search="true">
                                    <option value="{{ old('lokasi_id')}}" selected disabled>Pilih Lokasi Kejadian</option>
                                </select>
                                @error('lokasi_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <select class="custom-form border form-control @error('instansi_id') is-invalid @enderror selectpicker" id="instansi_id" name="instansi_id" data-live-search="true">
                                    <option value="{{ old('instansi_id')}}" selected disabled>Pilih Instansi Tujuan</option>
                                </select>
                                @error('instansi_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <select class="custom-form border form-control @error('kategori_id') is-invalid @enderror selectpicker" id="kategori_id" name="kategori_id" data-live-search="true">
                                    <option value="{{ old('kategori_id')}}" selected disabled>Pilih Kategori Laporan Anda</option>
                                    @foreach ($kategori as $item)
                                    <option value="{{$item->id}}" @if (empty($laporan)) @else @if ($laporan->kategori_id == $item->id) selected @endif @endif>{{$item->nama_kategori}}</option>
                                    @endforeach
                                </select>
                                @error('kategori_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="foto">Upload Foto Bukti</label>
                                <input class="form-control @error('foto') is-invalid @enderror " id="foto" name="foto" type="file" value="{{ !empty($petugas) ? $petugas->foto : '' }}"/>
                                @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button class="btn btn-success float-right" type="submit"><i class="fas fa-save mr-2"></i>Simpan</button>
                        </form>
                    </div>
                </div>

                {{-- <div class="tab-pane fade" id="aspirasi" role="tabpanel" aria-labelledby="aspirasi-tab">
                    <div class="card-body">
                        <form class="pt-3 pb-3" action="{{ empty($laporan) ? url(Auth::user()->role.'/laporan/create') : url(Auth::user()->role.'/laporan/edit/'.$laporan->id.'') }}" method="POST">
                            @if (!empty ($laporan))
                            @method('put')
                            @endif
                            @csrf
                            <input type="hidden" name="type" value="Aspirasi">
                            <div class="form-group">
                                <input class="form-control @error('judul_laporan') is-invalid @enderror " id="judul_laporan" name="judul_laporan" type="text" placeholder="Ketik Judul Laporan Anda" value="{{ old('judul_laporan') }}"/>
                                @error('judul_laporan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea class="form-control @error('isi_laporan') is-invalid @enderror" id="isi_laporan" name="isi_laporan" rows="12" placeholder="Ketik Isi Laporan Anda">{{ old('isi_laporan') }}</textarea>
                                @error('isi_laporan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <select class="custom-form border form-control @error('lokasi_id') is-invalid @enderror selectpicker" id="lokasi_id" name="lokasi_id" data-live-search="true">
                                    <option value="{{ old('lokasi_id')}}" selected disabled>Pilih Asal Pelapor</option>
                                </select>
                                @error('lokasi_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <select class="custom-form border form-control @error('instansi_id') is-invalid @enderror selectpicker" id="instansi_id" name="instansi_id" data-live-search="true">
                                    <option value="{{ old('instansi_id')}}" selected disabled>Pilih Instansi Tujuan</option>
                                </select>
                                @error('instansi_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <select class="custom-form border form-control @error('kategori_id') is-invalid @enderror selectpicker" id="kategori_id" name="kategori_id" data-live-search="true">
                                    <option value="{{ old('kategori_id')}}" selected disabled>Pilih Kategori Laporan Anda</option>
                                    @foreach ($kategori as $item)
                                    <option value="{{$item->id}}" @if (empty($laporan)) @else @if ($laporan->kategori_id == $item->id) selected @endif @endif>{{$item->nama_kategori}}</option>
                                    @endforeach
                                </select>
                                @error('kategori_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="foto">Upload Foto Bukti</label>
                                <input class="form-control @error('foto') is-invalid @enderror " id="foto" name="foto" type="file" value="{{ !empty($petugas) ? $petugas->foto : '' }}"/>
                                @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <input class="form-check-input" type="checkbox" id="anonim" value="anonim">Anonim
                            <button class="btn btn-success" type="submit"><i class="fas fa-save mr-2"></i>Simpan</button>
                        </form>
                    </div>
                </div> --}}

                {{-- <div class="tab-pane fade" id="permintaan-informasi" role="tabpanel" aria-labelledby="permintaan-informasi-tab">
                    <div class="card-body">
                        <form class="pt-3 pb-3" action="{{ empty($laporan) ? url(Auth::user()->role.'/laporan/create') : url(Auth::user()->role.'/laporan/edit/'.$laporan->id.'') }}" method="POST">
                            @if (!empty ($laporan))
                            @method('put')
                            @endif
                            @csrf
                            <input type="hidden" name="type" value="Aspirasi">
                            <div class="form-group">
                                <input class="form-control @error('judul_laporan') is-invalid @enderror " id="judul_laporan" name="judul_laporan" type="text" placeholder="Ketik Judul Laporan Anda" value="{{ old('judul_laporan') }}"/>
                                @error('judul_laporan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea class="form-control @error('isi_laporan') is-invalid @enderror" id="isi_laporan" name="isi_laporan" rows="12" placeholder="Ketik Isi Laporan Anda">{{ old('isi_laporan') }}</textarea>
                                @error('isi_laporan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <select class="custom-form border form-control @error('lokasi_id') is-invalid @enderror selectpicker" id="lokasi_id" name="lokasi_id" data-live-search="true">
                                    <option value="{{ old('lokasi_id')}}" selected disabled>Pilih Asal Pelapor</option>
                                </select>
                                @error('lokasi_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <select class="custom-form border form-control @error('instansi_id') is-invalid @enderror selectpicker" id="instansi_id" name="instansi_id" data-live-search="true">
                                    <option value="{{ old('instansi_id')}}" selected disabled>Pilih Instansi Tujuan</option>
                                </select>
                                @error('instansi_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <select class="custom-form border form-control @error('kategori_id') is-invalid @enderror selectpicker" id="kategori_id" name="kategori_id" data-live-search="true">
                                    <option value="{{ old('kategori_id')}}" selected disabled>Pilih Kategori Laporan Anda</option>
                                    @foreach ($kategori as $item)
                                    <option value="{{$item->id}}" @if (empty($laporan)) @else @if ($laporan->kategori_id == $item->id) selected @endif @endif>{{$item->nama_kategori}}</option>
                                    @endforeach
                                </select>
                                @error('kategori_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="foto">Upload Foto Bukti</label>
                                <input class="form-control @error('foto') is-invalid @enderror " id="foto" name="foto" type="file" value="{{ !empty($petugas) ? $petugas->foto : '' }}"/>
                                @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <input class="form-check-input" type="checkbox" id="anonim" value="anonim">Anonim
                            <button class="btn btn-success" type="submit"><i class="fas fa-save mr-2"></i>Simpan</button>
                        </form>
                    </div>
                </div> --}}

            {{-- </div> --}}
        {{-- </div> --}}
        <a class="text-danger text-decoration-none float-right mr-2" href="/admin/laporan" role="button"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
    </div>
</main>
@push('js')
<script>
    $(document).ready(function() {
        $('.selectpicker').selectpicker({
            style: 'btn-transparent',
        });

        $(".datepicker").datepicker({
            todayBtn: "linked",
            clearBtn: true,
            autoclose: true,
            todayHighlight: true,
        });
    });
</script>
@endpush
