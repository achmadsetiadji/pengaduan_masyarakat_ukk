<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"></div>
                            @if (!empty ($laporan))
                            Ajukan Ulang Laporan Pengaduan
                            @else
                            Tambah Laporan Pengaduan
                            @endif
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
                <form class="pt-3 pb-3"
                    action="{{ empty($laporan) ? url(Auth::user()->role.'/laporan/create') : url(Auth::user()->role.'/laporan/edit/'.$laporan->id.'') }}"
                    method="POST">
                    @if (!empty ($laporan))
                    @method('put')
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="judul_laporan">Judul Pengaduan</label>
                        <input class="form-control @error('judul_laporan') is-invalid @enderror " id="judul_laporan"
                            name="judul_laporan" type="text" placeholder="Ketik Judul Laporan Anda"
                            value="{{ !empty($laporan) ? $laporan->judul_laporan : old('judul_laporan') }}" />
                        @error('judul_laporan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="isi_laporan">Isi Pengaduan</label>
                        <textarea class="form-control @error('isi_laporan') is-invalid @enderror" id="isi_laporan"
                            name="isi_laporan" rows="12"
                            placeholder="Ketik Isi Laporan Anda">{{ !empty($laporan) ? $laporan->isi_laporan : old('isi_laporan') }}</textarea>
                        @error('isi_laporan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group date">
                        <label for="tanggal_kejadian">Tanggal Kejadian</label>
                        <input type="text" class="form-control @error('tanggal_kejadian') is-invalid @enderror"
                            id="tanggal_kejadian" name="tanggal_kejadian" type="text"
                            placeholder="Pilih Tanggal Kejadian" value="{{ !empty($laporan) ? $laporan->tanggal_kejadian : old('tanggal_kejadian') }}"><span
                            class="input-group-addon"></span>
                        @error('tanggal_kejadian')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- <div class="form-group">
                        <label for="lokasi_id">Lokasi Kejadian</label>
                        <select
                            class="custom-form border form-control @error('lokasi_id') is-invalid @enderror selectpicker"
                            id="lokasi_id" name="lokasi_id" data-live-search="true">
                            <option value="{{ old('lokasi_id')}}" selected disabled>Pilih Lokasi Kejadian</option>
                            @foreach ($lokasi as $item)
                            <option value="{{$item->id}}" @if (empty($laporan)) @else @if ($laporan->lokasi_id ==
                                $item->id) selected @endif @endif>{{$item->nama_lokasi}}</option>
                            @endforeach
                        </select>
                        @error('lokasi_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div> --}}

                    <div class="form-group">
                        <label for="kabupaten_id">Kabupaten</label>
                        <select
                            class="custom-form border form-control @error('kabupaten_id') is-invalid @enderror selectpicker"
                            id="kabupaten_id" name="kabupaten_id" data-live-search="true">
                            <option value="{{ old('kabupaten_id')}}" selected disabled>Pilih Kabupaten</option>
                            @foreach ($kabupaten as $item)
                            <option value="{{$item->id}}">{{$item->nama}}</option>
                            @endforeach
                        </select>
                        @error('kabupaten_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="kecamatan_id">Kecamatan</label>
                        <select
                            class="custom-form border form-control @error('kecamatan_id') is-invalid @enderror selectpicker"
                            id="kecamatan_id" name="kecamatan_id" data-live-search="true">
                            <option value="{{ old('kecamatan_id')}}" selected disabled>Pilih Kecamatan</option>
                            @foreach ($kecamatan as $item)
                            <option value="{{$item->id}}">{{$item->nama}}</option>
                            @endforeach
                        </select>
                        @error('kecamatan_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="kelurahan_id">Kelurahan</label>
                        <select
                            class="custom-form border form-control @error('kelurahan_id') is-invalid @enderror selectpicker"
                            id="kelurahan_id" name="kelurahan_id" data-live-search="true">
                            <option value="{{ old('kelurahan_id')}}" selected disabled>Pilih Kelurahan</option>
                            @foreach ($kelurahan as $item)
                            <option value="{{$item->id}}">{{$item->nama}}</option>
                            @endforeach
                        </select>
                        @error('kelurahan_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="kategori_id">Kategori Pengaduan</label>
                        <select
                            class="custom-form border form-control @error('kategori_id') is-invalid @enderror selectpicker"
                            id="kategori_id" name="kategori_id" data-live-search="true">
                            <option value="{{ old('kategori_id')}}" selected disabled>Pilih Kategori Laporan Anda
                            </option>
                            @foreach ($kategori as $item)
                            <option value="{{$item->id}}" @if (empty($laporan)) @else @if ($laporan->kategori_id ==
                                $item->id) selected @endif @endif>{{$item->nama_kategori}}</option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="lampiran">Upload Lampiran Bukti</label>
                        <input class="form-control @error('lampiran') is-invalid @enderror " id="lampiran"
                            name="lampiran" type="file" />
                        @error('lampiran')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    @if (!empty ($laporan))
                        <button class="btn btn-success float-right" type="submit"><i
                        class="fas fa-save mr-2"></i>Ajukan Kembali</button>
                    @else
                        <button class="btn btn-success float-right" type="submit"><i
                            class="fas fa-save mr-2"></i>Simpan</button>
                    @endif
                </form>
            </div>
        </div>
        <a class="text-danger text-decoration-none float-right mr-2" href="/admin/laporan" role="button"><i
                class="fas fa-arrow-left mr-2"></i>Kembali</a>
    </div>
</main>
@push('js')
<script>
    $(document).ready(function () {
        $('.selectpicker').selectpicker({
            style: 'btn-transparent',
        });

        $('.date').datepicker({
            todayBtn: "linked",
            clearBtn: true,
            autoclose: true,
            todayHighlight: true,
        });
    });

</script>
@endpush
