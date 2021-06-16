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
                <div class="timeline timeline-xs">
                    @foreach ($tanggapan as $item)
                        <!-- Timeline Item 1-->
                        <div class="timeline-item">
                            <div class="timeline-item-marker">
                                <div class="timeline-item-marker-text">{{$item->created_at->diffForHumans()}}</div>
                                @if ($item->status_tanggapan == "Selesai")
                                    <div class="timeline-item-marker-indicator bg-green"></div>
                                @else
                                    <div class="timeline-item-marker-indicator bg-danger"></div>
                                @endif
                            </div>
                            <div class="timeline-item-content">
                                @foreach ($item->user as $items){{$items->name}}@endforeach : {{$item->tanggapan}} <br>
                                @if ($item->status_tanggapan == "Selesai")
                                    <a class="font-weight-bold text-dark" href="#">{{$item->tanggal_tanggapan}}</a><br>
                                @else
                                    <a class="font-weight-bold text-dark" href="/pengguna/laporan/{{$item->laporan_id}}/edit">{{$item->tanggal_tanggapan}}</a><br>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</main>
