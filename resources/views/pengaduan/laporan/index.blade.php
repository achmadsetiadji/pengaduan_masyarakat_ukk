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
                                <th>Kategori Laporan</th>
                                <th>Tanggal Laporan</th>
                                <th>Status Laporan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporan as $item)
                                <tr>
                                    @foreach($item->kategori as $items)
                                        <td>{{$items->nama_kategori}}</td>
                                    @endforeach
                                    <td>{{$item->tanggal_laporan}}</td>
                                    <td>{{$item->status_laporan}}</td>
                                    <td>
                                        @if ($item->status_laporan == 'Menunggu')
                                        <p>Belum Ada Tanggapan</p>
                                        @elseif ($item->status_laporan == 'Ditolak')
                                        <p>Laporan Anda Ditolak</p>
                                        @else
                                        <a class="btn btn-transparent mr-2 text-info" href="/{{Auth::user()->role}}/laporan/{{$item->id}}/show" role="button"><i class="fas fa-info-circle"></i><span class="ml-2">Lihat Tanggapan</span></a>
                                        @endif
                                        {{-- <form action="/admin/manage_petugas/delete/{{$item->id}}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-datatable btn-icon btn-transparent-dark mr-2">
                                                <i class="fas fa-trash text-danger"></i>
                                            </button>
                                        </form> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        @else
                        <thead>
                            <tr>
                                <th>Nama Pelapor</th>
                                <th>Email</th>
                                <th>Kategori Laporan</th>
                                <th>Tanggal Laporan</th>
                                <th>Status Laporan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporan as $item)
                                <tr>
                                    @foreach($item->user as $items)
                                        <td>{{$items->name}}</td>
                                        <td>{{$items->email}}</td>
                                    @endforeach
                                    @foreach($item->kategori as $items)
                                        <td>{{$items->nama_kategori}}</td>
                                    @endforeach
                                    <td>{{$item->tanggal_laporan}}</td>
                                    <td>{{$item->status_laporan}}</td>
                                    <td>
                                        <!-- Fade In Up Animation -->
                                        {{-- <button class="btn btn-datatable btn-transparent-dark btn-icon" id="dropdownMenuButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="text-gray-500" data-feather="more-vertical"></i></button>
                                        <div class="dropdown-menu dropdown-menu-right animated--fade-in-up" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item text-warning" href="#!"><i class="fas fa-edit"></i><span class="text-warning ml-2">Tolak Laporan</span></a>
                                            <a class="dropdown-item" href="#!"><i class="fas fa-info-circle"></i><span class="ml-2">Lihat & Tanggapi</span></a>
                                        </div> --}}

                                        <a class="btn btn-transparent text-info mr-2" href="/{{Auth::user()->role}}/laporan/{{$item->id}}/show" role="button"><i class="fas fa-info text-info"></i><span class="ml-2 mt-1">Lihat & Tanggapi</span></a>
                                        {{-- <a class="btn btn-datatable btn-icon btn-transparent-dark mr-2" href="/{{Auth::user()->role}}/laporan/{{$item->id}}/show" role="button"><i class="fas fa-info text-info"></i></a> --}}
                                        {{-- <form action="/admin/manage_petugas/delete/{{$item->id}}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-datatable btn-icon btn-transparent-dark mr-2">
                                                <i class="fas fa-trash text-danger"></i>
                                            </button>
                                        </form> --}}
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
