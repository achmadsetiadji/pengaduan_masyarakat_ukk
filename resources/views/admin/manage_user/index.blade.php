<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fas fa-users"></i></div>
                            Data User
                        </h1>
                        <div class="page-header-subtitle">Daftar Data User</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container mt-n10">
        <div class="card mb-4">
            <div class="card-body">
                <div class="datatable">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">Nama User</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">NIK</th>
                                <th class="text-center">Nomor Telepon</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengguna as $item)
                                <tr>
                                    <td class="text-center">{{$item->name}}</td>
                                    <td class="text-center">{{$item->email}}</td>
                                    <td class="text-center">{{$item->nik}}</td>
                                    <td class="text-center">{{$item->telp}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
