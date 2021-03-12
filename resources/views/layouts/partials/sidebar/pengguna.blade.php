<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">
                <!-- Sidenav Menu Heading (Account)-->
                <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                <div class="sidenav-menu-heading d-sm-none">Account</div>
                <!-- Sidenav Link (Alerts)-->
                <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                <a class="nav-link d-sm-none" href="#!">
                    <div class="nav-link-icon"><i class="fas fa-bell"></i></div>
                    Alerts
                    <span class="badge badge-warning-soft text-warning ml-auto">4 New!</span>
                </a>
                <!-- Sidenav Link (Messages)-->
                <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                <a class="nav-link d-sm-none" href="#!">
                    <div class="nav-link-icon"><i class="fas fa-envelope"></i></div>
                    Messages
                    <span class="badge badge-success-soft text-success ml-auto">2 New!</span>
                </a>
                <!-- Sidenav Menu Heading (Dashboard)-->
                <div class="sidenav-menu-heading">Dashboard</div>
                <!-- Sidenav Accordion (Dashboard)-->
                <a class="nav-link collapsed {{ (request()->is('pengguna.index')) ? 'active' : '' }}" href="{{ route('pengguna.index') }}">
                    <div class="nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <div class="sidenav-menu-heading">Pengaduan</div>
                <!-- Sidenav Accordion (Dashboard)-->
                <a class="nav-link collapsed {{ (request()->is('laporan*')) ? 'active' : '' }}" href="/pengguna/laporan">
                    <div class="nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                    Laporan Pengaduan
                </a>

                <!-- Sidenav Accordion (Dashboard)-->
                {{-- <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse"
                    data-target="#dataPengguna" aria-expanded="false" aria-controls="dataPengguna">
                    <div class="nav-link-icon"><i data-feather="users"></i></div>
                    Data Pengguna
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="dataPengguna" data-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                        <a class="nav-link" href="dashboard-2.html"><i data-feather="user" class="mr-2"></i>Data Petugas</a>
                        <a class="nav-link" href="dashboard-3.html"><i data-feather="user" class="mr-2"></i>Data User</a>
                    </nav>
                </div> --}}
            </div>
        </div>
        <!-- Sidenav Footer-->
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Logged in as:</div>
                <div class="sidenav-footer-title">{{Auth::user()->name}}</div>
            </div>
        </div>
    </nav>
</div>
