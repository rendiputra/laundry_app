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
                        <i class="fas fa-fire"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{ Route::is('getPelanggan', 'createPelanggan', 'updatePelanggan') ? 'active' : '' }}">
                    <a href="{{ route('getPelanggan') }}">
                        <i class="fas fa-users"></i>
                        <span>Pelanggan</span>
                    </a>
                </li>
                <li class="{{ Route::is('getOutlet', 'createOutlet', 'updateOutlet') ? 'active' : '' }}">
                    <a href="{{ route('getOutlet') }}">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Outlet</span>
                    </a>
                </li>
                <li class="{{ Route::is('profile') ? 'active' : '' }}">
                    <a href="{{ route('profile') }}">
                        <i class="fas fa-user"></i>
                        <span>Profile</span>
                    </a>
                </li>
            </ul>
        </aside>
    </div>
</div>