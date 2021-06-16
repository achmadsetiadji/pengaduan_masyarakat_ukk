<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            Dashboard
                        </h1>
                        <div class="page-header-subtitle">Example dashboard overview and content summary</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container mt-n10">
        <div class="row mt-5">
            <div class="col-xl-4 col-md-6 mb-4">
                <!-- Dashboard info widget 1-->
                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-gray-600 h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="small font-weight-bold text-gray-600 mb-1">Admin</div>
                                <div class="h5">{{$adminCount}}</div>
                            </div>
                            <div class="ml-2"><i class="fas fa-user-cog fa-2x text-gray-600"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <!-- Dashboard info widget 2-->
                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-gray-600 h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="small font-weight-bold text-gray-600 mb-1">Petugas</div>
                                <div class="h5">{{$petugasCount}}</div>
                            </div>
                            <div class="ml-2"><i class="fas fa-user-tie fa-2x text-gray-600"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <!-- Dashboard info widget 3-->
                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-gray-600 h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="small font-weight-bold text-gray-600 mb-1">User</div>
                                <div class="h5">{{$userCount}}</div>
                            </div>
                            <div class="ml-2"><i class="fas fa-users fa-2x text-gray-600"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-md-6 mb-4">
                <!-- Dashboard info widget 1-->
                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-warning h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="small font-weight-bold text-warning mb-1">Laporan Menunggu</div>
                                <div class="h5">{{$laporanMenungguCount}}</div>
                            </div>
                            <div class="ml-2"><i class="fas fa-clipboard-list fa-2x text-warning"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <!-- Dashboard info widget 2-->
                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-success h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="small font-weight-bold text-success mb-1">Laporan Selesai</div>
                                <div class="h5">{{$laporanSelesaiCount}}</div>
                            </div>
                            <div class="ml-2"><i class="fas fa-clipboard-check fa-2x text-success"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <!-- Dashboard info widget 3-->
                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-danger h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="small font-weight-bold text-danger mb-1">Laporan Ditolak</div>
                                <div class="h5">{{$laporanDitolakCount}}</div>
                            </div>
                            <div class="ml-2"><i class="fas fa-times-circle fa-2x text-danger"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-xxl-8">
                <!-- Tabbed dashboard card example-->
                <div class="card mb-4">
                    <div class="card-body" id="mymap">

                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</main>

@section('script')
<script type="text/javascript">
        // var lokasis = < ? php print_r(json_encode($lokasis)) ? > ;

        var mymap = new GMaps({
            el: '#mymap',
            lat: -0.789275,
            lng: 113.921327,
            zoom: 5
        });


        // $.each(lokasis, function (index, value) {
        //     mymap.addMarker({
        //         lat: value.lat,
        //         lng: value.long,
        //         title: value.nama_lokasi,
        //         click: function (e) {
        //             alert('This is ' + value.nama_lokasi + ', gujarat from India.');
        //         }
        //     });
        // });

    </script>
@endsection
