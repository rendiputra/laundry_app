<div>
    <!-- Sidebar outter -->
    <div class="main-sidebar sidebar-style-2">
        <!-- sidebar wrapper -->
        <aside id="sidebar-wrapper">
            <!-- sidebar brand -->
            <div class="sidebar-brand">
                <a href="{{ route('welcome') }}">{{ config('app.name', 'Laundry') }}</a>
            </div>
            <!-- sidebar menu -->
            <ul class="sidebar-menu">
                <!-- menu header -->
                <li class="menu-header">MENU</li>
                <!-- menu item -->
                <li class="{{ Route::is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{ Route::is('getTransaksi', 'createTransaksi', 'updateTransaksi') ? 'active' : '' }}">
                    <a href="{{ route('getTransaksi') }}">
                        <i class="fas fa-balance-scale"></i>
                        <span>Transaksi</span>
                    </a>
                </li>
                <li class="{{ Route::is('getPaket', 'createPaket', 'updatePaket') ? 'active' : '' }}">
                    <a href="{{ route('getPaket') }}">
                        <i class="fas fa-tags"></i>
                        <span>Paket Cucian</span>
                    </a>
                </li>
                <li class="menu-header">ADMIN</li>
                <li class="{{ Route::is('getPelanggan', 'createPelanggan', 'updatePelanggan') ? 'active' : '' }}">
                    <a href="{{ route('getPelanggan') }}">
                        <i class="fas fa-users"></i>
                        <span>Pelanggan</span>
                    </a>
                </li>
                <li class="{{ Route::is('getOutlet', 'createOutlet', 'updateOutlet') ? 'active' : '' }}">
                    <a href="{{ route('getOutlet') }}">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Cabang Outlet</span>
                    </a>
                </li>
                <li class="{{ Route::is('getPengguna', 'createPengguna', 'updatePengguna') ? 'active' : '' }}">
                    <a href="{{ route('getPengguna') }}">
                        <i class="far fa-user"></i>
                        <span>Pengguna</span>
                    </a>
                </li>
                {{-- <li class="{{ Route::is('profile') ? 'active' : '' }}">
                    <a href="{{ route('profile') }}">
                        <i class="fas fa-user"></i>
                        <span>Profile</span>
                    </a>
                </li> --}}
            </ul>
        </aside>
    </div>
</div>