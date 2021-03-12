<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fas fa-user-tie"></i></div>
                            Data Petugas
                        </h1>
                        <div class="page-header-subtitle">Daftar Data Petugas</div>
                    </div>
                </div>
            </div>
            @include('includes/alert')
        </div>
    </header>
    <!-- Main page content-->
    <div class="container mt-n10">
        <div class="card mb-4">
            <div class="card-header"><a class="btn btn-primary mr-2" href="/admin/manage_petugas/create" role="button"><i class="fas fa-plus mr-2"></i>Tambah Petugas</a></div>
            <div class="card-body">
                <div class="datatable">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Petugas</th>
                                <th>Email</th>
                                <th>NIK</th>
                                <th>Nomor Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($petugas as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->nik}}</td>
                                    <td>{{$item->telp}}</td>
                                    <td>
                                        <a class="btn btn-datatable btn-icon btn-transparent-dark mr-2" href="/admin/manage_petugas/{{$item->id}}/edit" role="button"><i class="fas fa-edit text-warning"></i></a>
                                        <form action="/admin/manage_petugas/delete/{{$item->id}}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-datatable btn-icon btn-transparent-dark mr-2">
                                                <i class="fas fa-trash text-danger"></i>
                                            </button>
                                        </form>
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
