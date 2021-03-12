<?php
    $laporanCount = App\Laporan::where('status_laporan', 'Menunggu')->count();
?>
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
                <a class="nav-link collapsed {{ (request()->is('admin.index')) ? 'active' : '' }}" href="{{ route('admin.index') }}">
                    <div class="nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <div class="sidenav-menu-heading">Data Pengguna</div>
                <!-- Sidenav Accordion (Dashboard)-->
                <a class="nav-link collapsed {{ (request()->is('manage_petugas*')) ? 'active' : '' }}" href="/admin/manage_petugas">
                    <div class="nav-link-icon"><i class="fas fa-user-tie"></i></div>
                    Data Petugas
                </a>
                <!-- Sidenav Accordion (Dashboard)-->
                <a class="nav-link collapsed {{ (request()->is('manage_user*')) ? 'active' : '' }}" href="/admin/manage_user">
                    <div class="nav-link-icon"><i class="fas fa-users"></i></div>
                    Data User
                </a>

                <div class="sidenav-menu-heading">Pengaduan</div>
                <!-- Sidenav Accordion (Dashboard)-->
                <a class="nav-link collapsed {{ (request()->is('laporan*')) ? 'active' : '' }}" href="/admin/laporan">
                    <div class="nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                    Laporan Pengaduan <span class="badge badge-primary ml-1">{{$laporanCount}}</span>
                </a>

                <div class="sidenav-menu-heading">Data Master</div>
                <!-- Sidenav Accordion (Dashboard)-->
                <a class="nav-link collapsed {{ (request()->is('manage_kategori_laporan*')) ? 'active' : '' }}" href="/admin/manage_kategori_laporan">
                    <div class="nav-link-icon"><i class="fas fa-database"></i></div>
                    Data Kategori Laporan
                </a>
                <!-- Sidenav Accordion (Dashboard)-->
                <a class="nav-link collapsed {{ (request()->is('manage_lokasi*')) ? 'active' : '' }}" href="/admin/manage_lokasi">
                    <div class="nav-link-icon"><i class="fas fa-map-marked-alt"></i></div>
                    Data Lokasi
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
