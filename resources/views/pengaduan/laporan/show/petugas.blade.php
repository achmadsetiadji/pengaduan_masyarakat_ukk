<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fas fa-clipboard-list"></i></div>
                            Detail Laporan Pengaduan
                        </h1>
                        <div class="page-header-subtitle"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container mt-n10">
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        @foreach($laporan->user as $items)
                        <p>Nama Pelapor : {{$items->name}}</p>
                        <p>Email Pelapor : {{$items->email}}</p>
                        <p>NIK Pelapor : {{$items->nik}}</p>
                        <p>Nomor Telepon Pelapor : {{$items->telp}}</p>
                        @endforeach
                    </div>
                    <div class="col">
                        @foreach($laporan->kategori as $items)
                        <p>Kategori Laporan : {{$items->nama_kategori}}</p>
                        @endforeach
                        <p>Tanggal Pelaporan : {{$laporan->tanggal_laporan}}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <p>Judul Laporan : {{$laporan->judul_laporan}}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        {{$laporan->isi_laporan}}
                    </div>
                    @if ($laporan->lampiran == '-')
                    <div class="col">
                        <p>Tidak Ada Lampiran yang Diunggah!</p>
                    </div>
                    @else
                    <div class="col">
                        <img src="{{asset('upload/images/'.$laporan->lampiran)}}" alt="lampiran">
                    </div>
                    @endif
                </div>
                <hr>
                <form action="/{{Auth::user()->role}}/tanggapan/create" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <input type="hidden" name="laporan_id" value="{{$laporan->id}}">
                            <div class="form-group">
                                <label for="nama_lokasi">Tanggapan</label>
                                <textarea class="form-control @error('tanggapan') is-invalid @enderror" id="tanggapan"
                                    name="tanggapan" rows="12"
                                    placeholder="Ketik Isi Tanggapan Anda">{{ old('tanggapan') }}</textarea>
                                @error('tanggapan')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-warning" type="button" data-toggle="collapse"
                                data-target="#collapseExample" aria-expanded="false"
                                aria-controls="collapseExample">Tolak Laporan!</button>
                            <button class="btn btn-primary" type="submit">Tanggapi</button>
                        </div>
                    </div>
                </form>

                <div class="collapse" id="collapseExample">
                    <form action="/{{Auth::user()->role}}/tanggapan/tolak" method="POST">
                        @csrf
                        <div class="row mt-3">
                            <div class="col">
                                <input type="hidden" name="laporan_id" value="{{$laporan->id}}">
                                <div class="form-group">
                                    <label for="nama_lokasi">Alasan Penolakan</label>
                                    <textarea class="form-control @error('tanggapan') is-invalid @enderror"
                                        id="tanggapan" name="tanggapan" rows="12"
                                        placeholder="Ketik Isi Penolakan">{{ old('tanggapan') }}</textarea>
                                    @error('tanggapan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-danger float-right" type="submit">Tolak</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
