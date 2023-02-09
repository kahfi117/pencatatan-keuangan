<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html"><img src="{{asset('img/maccar-mart.png')}}" alt="" width="25%"></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html"><img src="{{asset('img/maccar-mart.png')}}" alt="" width="50%"></a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('dashboard-general-dashboard') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('dashboard-general-dashboard') }}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>

            <li class="menu-header">Pemasukan Penjualan</li>
            

            <li class="{{ Request::is('buku-kas') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('buku-kas') }}"><i class="fas fa-wallet"></i> <span>Buku Kas</span></a>
            </li>

            <li class="{{ Request::is('blank-page') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('blank-page') }}"><i class="far fa-square"></i> <span>History Transaksi</span></a>
            </li>

            <li class="menu-header">Barang</li>
            <li class="{{ Request::is('barang-masuk*') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('bm.index') }}"><i class="far fa-plug"></i> <span>Data Barang Masuk</span></a>
            </li>
            <li class="{{ Request::is('barang-kredit*') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('bmk.index') }}"><i class="far fa-plug"></i> <span>Barang Kredit/Utang</span></a>
            </li>

            <li class="menu-header">Lainnya</li>
            <li class="{{ Request::is('gaji-pegawai*') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('gaji-pegawai.index') }}"><i class="fas fa-pencil-ruler">
                    </i> <span>Gaji Karyawan</span>
                </a>
            </li>
            <li class="{{ Request::is('operasional*') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('operasional.index') }}"><i class="fas fa-pencil-ruler">
                    </i> <span>Operasional</span>
                </a>
            </li>
            <li class="{{ Request::is('sewa-tenant*') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('sewa-tenant.index') }}"><i class="fas fa-pencil-ruler">
                    </i> <span>Sewa Tenant</span>
                </a>
            </li>
            <li class="{{ Request::is('listing-fee*') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('listing-fee.index') }}"><i class="fas fa-pencil-ruler">
                    </i> <span>Listing Fee</span>
                </a>
            </li>
            <li class="{{ Request::is('features-tickets') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('features-tickets') }}"><i class="fas fa-pencil-ruler">
                    </i> <span>Modal</span>
                </a>
            </li>

            <li class="menu-header">Master Data</li>
            <li class="{{Request::is('sumber-pemasukan') ? 'active' : ''}}">
                <a class="nav-link"
                    href="{{ url('sumber-pemasukan') }}"><i class="fas fa-pencil-ruler">
                    </i> <span>Sumber Pemasukan</span>
                </a>
            </li>
        </ul>

    </aside>
</div>
