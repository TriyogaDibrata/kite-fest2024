<nav class="main-sidebar ps-menu">
    {{-- <div class="sidebar-toggle action-toggle">
        <a href="#">
            <i class="fas fa-bars"></i>
        </a>
    </div>
    <div class="sidebar-opener action-toggle">
        <a href="#">
            <i class="ti-angle-right"></i>
        </a>
    </div>  --}}
    <div class="sidebar-header">
        <div class="text">KF</div>
        <div class="close-sidebar action-toggle">
            <i class="ti-close"></i>
        </div>
    </div>
    <div class="sidebar-content">
        <ul>
            <li class="{{ activeMenu('dashboard')}}">
                <a href="{{ route('dashboard')}}" class="link">
                    <i class="ti-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            {{-- <li class="menu-category">
                <span class="text-uppercase">Konfigurasi</span>
            </li> --}}
            {{-- @can('read-konfigurasi') --}}
            {{-- @endcan --}}
            <li class="{{ activeDropdownMenu('konfigurasi') }}">
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-settings"></i>
                    <span>Konfigurasi</span>
                </a>
                <ul class="sub-menu {{ activeSubMenu('konfigurasi') }}">
                    <li class="{{ activeMenu('roles')}}"><a href="{{ route('roles.index') }}" class="link"><span>Roles</span></a></li>
                    <li class="{{ activeMenu('users')}}"><a href="{{ route('users.index') }}" class="link"><span>Users</span></a></li>
                </ul>
            </li>
            <li class="{{ activeDropdownMenu('masterdata') }}">
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-server"></i>
                    <span>Master Data</span>
                </a>
                <ul class="sub-menu {{ activeSubMenu('masterdata') }}">
                    <li class="{{ activeMenu('category') }}"><a href="#" class="link"><span>Kategori Layangan</span></a></li>
                    <li class="{{ activeMenu('series') }}"><a href="#" class="link"><span>Serie Terbang</span></a></li>
                </ul>
            </li>
            <li class="{{ activeMenu('participant')}}">
                <a href="#" class="link">
                    <i class="ti-user"></i>
                    <span>Peserta Lomba</span>
                </a>
            </li>
            <li class="{{ activeDropdownMenu('judging') }}">
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-cup"></i>
                    <span>Penjurian</span>
                </a>
                <ul class="sub-menu {{ activeSubMenu('judging') }}">
                    <li class="{{ activeMenu('scores')}}"><a href="#" class="link"><span>Input Nilai</span></a></li>
                    <li class="{{ activeMenu('photos')}}"><a href="#" class="link"><span>Input Photo</span></a></li>
                    <li class="{{ activeMenu('recaps')}}"><a href="#" class="link"><span>Rekapitulasi Penjurian</span></a></li>
                </ul>
            </li>
            
        </ul>
    </div>
</nav>        