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
            @if (Auth::user()->role == 'admin')
            <div class="card-header">
                <div class="row float-right">
                    <a class="btn btn-success mr-2" href="#" role="button">
                        <i class="fas fa-file-excel mr-2"></i>Cetak XLS
                    </a>
                    <a class="btn btn-danger mr-2" href="{{ url('admin/exportPDF') }}" role="button">
                        <i class="fas fa-file-pdf mr-2"></i>Cetak PDF
                    </a>
                </div>
            </div>
            @endif

            <div class="card-body">
                <div class="datatable">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">Nama Pelapor</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Status Laporan</th>
                                <th class="text-center">Tanggal Laporan</th>
                                @if (Auth::user()->role == 'petugas')
                                    <th class="text-center">Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporan as $item)
                            <tr>
                                @foreach($item->user as $items)
                                <td class="text-center">{{$items->name}}</td>
                                <td class="text-center">{{$items->email}}</td>
                                @endforeach
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
                                @if (Auth::user()->role == 'petugas')
                                    <td>
                                        <a class="btn btn-transparent text-info" href="/{{Auth::user()->role}}/laporan/{{$item->id}}/show">
                                            <i class="fas fa-info text-info"></i>
                                            <span class="ml-2 mt-1">Lihat & Tanggapi</span>
                                        </a>
                                    </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
