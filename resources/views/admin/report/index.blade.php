<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Pengaduan Masyarakat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 text-center">Laporan Pengaduan</h1>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0" border="1">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">Nama Pelapor</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Kategori Laporan</th>
                                <th class="text-center">Status Laporan</th>
                                <th class="text-center">Tanggal Laporan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporan as $item)
                            <tr>
                                @foreach($item->user as $items)
                                <td class="text-center">{{$items->name}}</td>
                                <td class="text-center">{{$items->email}}</td>
                                @endforeach
                                @foreach($item->kategori as $items)
                                <td class="text-center">{{$items->nama_kategori}}</td>
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
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</body>

</html>
