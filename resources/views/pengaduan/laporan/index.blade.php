<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fas fa-clipboard-list"></i></div>
                            Data Laporan Pengaduan
                        </h1>
                        <div class="page-header-subtitle">Daftar Data Laporan Pengaduan</div>
                    </div>
                </div>
            </div>
            @include('includes/alert')
        </div>
    </header>
    <!-- Main page content-->
    <div class="container mt-n10">
        <div class="card mb-4">
            <div class="card-header">
                @if (Auth::user()->role == 'pengguna')
                <a class="btn btn-primary mr-2" href="/{{Auth::user()->role}}/laporan/create" role="button">
                    <i class="fas fa-plus mr-2"></i>Tambah Laporan
                </a>
                @else
                <div class="row float-right">
                    <a class="btn btn-success mr-2" href="#" role="button">
                        <i class="fas fa-file-excel mr-2"></i>Cetak XLS
                    </a>
                    <a class="btn btn-danger mr-2" href="#" role="button">
                        <i class="fas fa-file-pdf mr-2"></i>Cetak PDF
                    </a>
                </div>
                @endif
            </div>

            <div class="card-body">
                <div class="datatable">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        @if (Auth::user()->role == 'pengguna')
                        <thead>
                            <tr>
                                <th class="text-center">Kategori Laporan</th>
                                <th class="text-center">Tanggal Laporan</th>
                                <th class="text-center">Status Laporan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporan as $item)
                            <tr>
                                @foreach($item->kategori as $items)
                                <td class="text-center">{{$items->nama_kategori}}</td>
                                @endforeach
                                <td class="text-center">{{$item->tanggal_laporan}}</td>
                                <td class="text-center">
                                    @if ($item->status_laporan == 'Menunggu')
                                        <span class="badge badge-primary">Menunggu</span>
                                    @elseif ($item->status_laporan == 'Selesai')
                                        <span class="badge badge-success">Selesai</span>
                                    @else
                                        <span class="badge badge-danger">Ditolak</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($item->status_laporan == 'Menunggu')
                                    <p>Belum Ada Tanggapan</p>
                                    @elseif ($item->status_laporan == 'Ditolak')
                                    <p>Laporan Anda Ditolak</p>
                                    @else
                                    <a class="btn btn-transparent mr-2 text-info"
                                        href="/{{Auth::user()->role}}/laporan/{{$item->id}}/show" role="button"><i
                                            class="fas fa-info-circle"></i><span class="ml-2">Lihat Tanggapan</span></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        @else
                        <thead>
                            <tr>
                                <th class="text-center">Nama Pelapor</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Status Laporan</th>
                                <th class="text-center">Tanggal Laporan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporan as $item)
                            <tr>
                                @foreach($item->user as $items)
                                <td class="text-center">{{$items->name}}</td>
                                <td class="text-center">{{$items->email}}</td>
                                @endforeach
                                {{-- @foreach($item->kategori as $items)
                                <td class="text-center">{{$items->nama_kategori}}</td>
                                @endforeach --}}
                                <td class="text-center">
                                    @if ($item->status_laporan == 'Menunggu')
                                        <span class="badge badge-primary">Menunggu</span>
                                    @elseif ($item->status_laporan == 'Selesai')
                                        <span class="badge badge-success">Selesai</span>
                                    @else
                                        <span class="badge badge-danger">Ditolak</span>
                                    @endif
                                </td>
                                <td class="text-center">{{$item->tanggal_laporan}}</td>

                                <td>
                                    <a class="btn btn-transparent text-info" href="/{{Auth::user()->role}}/laporan/{{$item->id}}/show">
                                        <i class="fas fa-info text-info"></i>
                                        <span class="ml-2 mt-1">Lihat & Tanggapi</span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
