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
        <div class="row">
            <div class="col-xxl-8">
                <!-- Tabbed dashboard card example-->
                <div class="card mb-4">
                    <div class="card-header border-bottom">
                        <!-- Dashboard card navigation-->
                        <ul class="nav nav-tabs card-header-tabs" id="dashboardNav" role="tablist">
                            <li class="nav-item mr-1"><a class="nav-link active" id="overview-pill" href="#overview"
                                    data-toggle="tab" role="tab" aria-controls="overview"
                                    aria-selected="true">Overview</a></li>
                            <li class="nav-item"><a class="nav-link" id="activities-pill" href="#activities"
                                    data-toggle="tab" role="tab" aria-controls="activities"
                                    aria-selected="false">Activities</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="dashboardNavContent">
                            <!-- Dashboard Tab Pane 1-->
                            <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                aria-labelledby="overview-pill">
                                <div class="chart-area mb-4 mb-lg-0" style="height: 20rem"><canvas id="myAreaChart"
                                        width="100%" height="30"></canvas></div>
                            </div>
                            <!-- Dashboard Tab Pane 2-->
                            <div class="tab-pane fade" id="activities" role="tabpanel"
                                aria-labelledby="activities-pill">
                                <div class="datatable table-responsive">
                                    <table class="table table-bordered table-hover" id="dataTableActivity" width="100%"
                                        cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Event</th>
                                                <th>Time</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Date</th>
                                                <th>Event</th>
                                                <th>Time</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr>
                                                <td>01/13/20</td>
                                                <td>
                                                    <i class="mr-2 text-green" data-feather="zap"></i>
                                                    Server online
                                                </td>
                                                <td>1:21 AM</td>
                                            </tr>
                                            <tr>
                                                <td>01/13/20</td>
                                                <td>
                                                    <i class="mr-2 text-red" data-feather="zap-off"></i>
                                                    Server restarted
                                                </td>
                                                <td>1:00 AM</td>
                                            </tr>
                                            <tr>
                                                <td>01/12/20</td>
                                                <td>
                                                    <i class="mr-2 text-purple" data-feather="shopping-cart"></i>
                                                    New order placed! Order #
                                                    <a href="#!">1126550</a>
                                                </td>
                                                <td>5:45 AM</td>
                                            </tr>
                                            <tr>
                                                <td>01/12/20</td>
                                                <td>
                                                    <i class="mr-2 text-blue" data-feather="user"></i>
                                                    Valerie Luna submitted
                                                    <a href="#!">quarter four report</a>
                                                </td>
                                                <td>4:23 PM</td>
                                            </tr>
                                            <tr>
                                                <td>01/12/20</td>
                                                <td>
                                                    <i class="mr-2 text-yellow" data-feather="database"></i>
                                                    Database backup created
                                                </td>
                                                <td>3:51 AM</td>
                                            </tr>
                                            <tr>
                                                <td>01/12/20</td>
                                                <td>
                                                    <i class="mr-2 text-purple" data-feather="shopping-cart"></i>
                                                    New order placed! Order #
                                                    <a href="#!">1126549</a>
                                                </td>
                                                <td>1:22 AM</td>
                                            </tr>
                                            <tr>
                                                <td>01/11/20</td>
                                                <td>
                                                    <i class="mr-2 text-blue" data-feather="user-plus"></i>
                                                    New user created:
                                                    <a href="#!">Sam Malone</a>
                                                </td>
                                                <td>4:18 PM</td>
                                            </tr>
                                            <tr>
                                                <td>01/11/20</td>
                                                <td>
                                                    <i class="mr-2 text-purple" data-feather="shopping-cart"></i>
                                                    New order placed! Order #
                                                    <a href="#!">1126548</a>
                                                </td>
                                                <td>4:02 PM</td>
                                            </tr>
                                            <tr>
                                                <td>01/11/20</td>
                                                <td>
                                                    <i class="mr-2 text-purple" data-feather="shopping-cart"></i>
                                                    New order placed! Order #
                                                    <a href="#!">1126547</a>
                                                </td>
                                                <td>3:47 PM</td>
                                            </tr>
                                            <tr>
                                                <td>01/11/20</td>
                                                <td>
                                                    <i class="mr-2 text-green" data-feather="zap"></i>
                                                    Server online
                                                </td>
                                                <td>1:19 AM</td>
                                            </tr>
                                            <tr>
                                                <td>01/11/20</td>
                                                <td>
                                                    <i class="mr-2 text-red" data-feather="zap-off"></i>
                                                    Server restarted
                                                </td>
                                                <td>1:00 AM</td>
                                            </tr>
                                            <tr>
                                                <td>01/10/20</td>
                                                <td>
                                                    <i class="mr-2 text-purple" data-feather="shopping-cart"></i>
                                                    New order placed! Order #
                                                    <a href="#!">1126547</a>
                                                </td>
                                                <td>5:31 PM</td>
                                            </tr>
                                            <tr>
                                                <td>01/10/20</td>
                                                <td>
                                                    <i class="mr-2 text-purple" data-feather="shopping-cart"></i>
                                                    New order placed! Order #
                                                    <a href="#!">1126546</a>
                                                </td>
                                                <td>12:13 PM</td>
                                            </tr>
                                            <tr>
                                                <td>01/10/20</td>
                                                <td>
                                                    <i class="mr-2 text-blue" data-feather="user"></i>
                                                    Diane Chambers submitted
                                                    <a href="#!">quarter four report</a>
                                                </td>
                                                <td>10:56 AM</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
