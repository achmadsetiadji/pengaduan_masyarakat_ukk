<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fas fa-database"></i></div>
                            Data Kategori Laporan
                        </h1>
                        <div class="page-header-subtitle">Daftar Data Kategori Laporan</div>
                    </div>
                </div>
            </div>
            @include('includes/alert')
        </div>
    </header>
    <!-- Main page content-->
    <div class="container mt-n10">
        <div class="card mb-4">
            <div class="card-header"><a class="btn btn-primary mr-2" href="/admin/manage_kategori_laporan/create" role="button"><i class="fas fa-plus mr-2"></i>Tambah Kategori Laporan</a></div>
            <div class="card-body">
                <div class="datatable">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">Nama Kategori Laporan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategoriLaporan as $item)
                                <tr>
                                    <td class="text-center">{{$item->nama_kategori}}</td>
                                    <td class="text-center">
                                        <a class="btn btn-datatable btn-icon btn-transparent-dark mr-2" href="/admin/manage_kategori_laporan/{{$item->id}}/edit" role="button"><i class="fas fa-edit text-warning"></i></a>
                                        <form action="/admin/manage_kategori_laporan/delete/{{$item->id}}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-datatable btn-icon btn-transparent-dark mr-2">
                                                <i class="fas fa-trash text-danger"></i>
                                            </button>
                                        </form>
                                        {{-- <a class="btn btn-datatable btn-icon btn-transparent-dark mr-2" href="#" role="button"><i class="fas fa-trash text-danger"></i></a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
