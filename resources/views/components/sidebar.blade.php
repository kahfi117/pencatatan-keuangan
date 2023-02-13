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
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('dashboard') }}"><i class="fa-solid fa-shop"></i><span>Dashboard</span></a>
            </li>
            <li class="{{ Request::is('modal*') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('modal.index') }}"><i class="fa fa-usd"></i><span>Modal</span></a>
            </li>

            <li class="menu-header">Pemasukan Penjualan</li>

            <li class="{{ Request::is('penjualan*') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('penjualan.index') }}"><i class="fa-solid fa-cart-shopping"></i> <span>Penjualan</span></a>
            </li>
            <li class="{{ Request::is('non-tunai') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('non-tunai.index') }}"><i class="fa fa-credit-card-alt"></i> <span>Non Tunai</span></a>
            </li>

            {{-- <li class="{{ Request::is('blank-page') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('blank-page') }}"><i class="far fa-square"></i> <span>History Transaksi</span></a>
            </li> --}}

            <li class="menu-header">Barang</li>
            <li class="{{ Request::is('barang-masuk*') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('bm.index') }}"><i class="fa-solid fa-file-import"></i> <span>Data Barang Masuk</span></a>
            </li>
            <li class="{{ Request::is('barang-kredit*') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('bmk.index') }}"><i class="far fa-plug"></i> <span>Barang Kredit/Utang</span></a>
            </li>

            <li class="menu-header">Lainnya</li>
            <li class="{{ Request::is('gaji-pegawai*') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('gaji-pegawai.index') }}"><i class="fa fa-address-card">
                    </i> <span>Gaji Karyawan</span>
                </a>
            </li>
            <li class="{{ Request::is('operasional*') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('operasional.index') }}"><i class="fa-solid fa-users-gear">
                    </i> <span>Operasional</span>
                </a>
            </li>
            <li class="{{ Request::is('sewa-tenant*') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('sewa-tenant.index') }}"><i class="fa-solid fa-shop">
                    </i> <span>Sewa Tenant</span>
                </a>
            </li>
            <li class="{{ Request::is('listing-fee*') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('listing-fee.index') }}"><i class="fa-solid fa-file-invoice">
                    </i> <span>Listing Fee</span>
                </a>
            </li>
            {{-- <li class="{{ Request::is('features-tickets') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('features-tickets') }}"><i class="fas fa-pencil-ruler">
                    </i> <span>Modal</span>
                </a>
            </li> --}}

            {{-- <li class="menu-header">Master Data</li>
            <li class="{{Request::is('sumber-pemasukan') ? 'active' : ''}}">
                <a class="nav-link"
                    href="{{ url('sumber-pemasukan') }}"><i class="fas fa-pencil-ruler">
                    </i> <span>Sumber Pemasukan</span>
                </a>
            </li> --}}
        </ul>

    </aside>
</div>
