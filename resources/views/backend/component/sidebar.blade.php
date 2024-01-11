<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-left justify-content-left" href="#">
        <div class="sidebar-brand-text">{{App\Setting::where('slug','nama-toko')->get()->first()->description}}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Menu Utama
    </div>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{active('dashboard')}}">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#car" aria-expanded="true" aria-controls="car">
        {{-- <a class="nav-link {{is_active('car.index') ? '':is_active('manufacture.index') ? '':'collapsed'}}" href="#" data-toggle="collapse" data-target="#car" aria-expanded="true" aria-controls="car"> --}}
            <i class="fas fa-fw fa-car"></i>
            <span>Data Mobil</span>
        </a>
        <div id="car" class="collapse {{is_active('kendaraan.index') || is_active('manufacture.index')  ? 'show':''}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{active('kendaraan.index')}}" href="{{route('kendaraan.index')}}">Mobil</a>
            {{-- <a class="collapse-item {{active('manufacture.index')}}" href="{{route('manufacture.index')}}">Merk</a> --}}
            </div>
        </div>
    </li>
    {{-- <li class="nav-item {{active('car.index')}}">
        <a class="nav-link" href="{{route('car.index')}}">
            <i class="fas fa-fw fa-car"></i>
            <span>Mobil</span>
        </a>
    </li>
    <li class="nav-item {{active('manufacture.index')}}">
        <a class="nav-link" href="{{route('manufacture.index')}}">
            <i class="fas fa-fw fa-car"></i>
            <span>Merk</span>
        </a>
    </li> --}}
    {{-- <li class="nav-item {{active('customer.index')}}">
        <a class="nav-link" href="{{route('customer.index')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>Customer</span>
        </a>
    </li> --}}
    {{-- <li class="nav-item {{active('faktur.index')}}">
        <a class="nav-link" href="{{route('faktur.index')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>Faktur</span>
        </a>
    </li> --}}
    <li class="nav-item {{active('pelanggan.index')}}">
        <a class="nav-link" href="{{route('pelanggan.index')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>Pelanggan</span>
        </a>
    </li>
    {{-- <li class="nav-item {{active('pembayaran.index')}}">
        <a class="nav-link" href="{{route('pembayaran.index')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>Pembayaran</span>
        </a>
    </li> --}}
    {{-- <li class="nav-item {{active('pemesanan.index')}}">
        <a class="nav-link" href="{{route('pemesanan.index')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>Pemesanan</span>
        </a>
    </li> --}}
    <li class="nav-item {{active('karyawan.index')}}">
        <a class="nav-link" href="{{route('karyawan.index')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>Karyawan</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{is_active('transaction.*') ? '':'collapsed'}}" href="#" data-toggle="collapse" data-target="#transaksi" aria-expanded="true" aria-controls="transaksi">
            <i class="fas fa-fw fa-book"></i>
            <span>Transaksi</span>
        </a>
        <div id="transaksi" class="collapse {{is_active('transaction.*')  ? 'show':''}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{active('pemesanan.index')}}" href="{{route('pemesanan.index')}}">Pemesanan</a>                
                <a class="collapse-item {{active('pembayaran.index')}}" href="{{route('pembayaran.index')}}">Pembayaran</a>
                <a class="collapse-item {{active('faktur.index')}}" href="{{route('faktur.index')}}">Faktur</a>
            </div>
        </div>
    </li>
    {{-- <li class="nav-item {{active('transaction.create')}}">
        <a class="nav-link" href="{{route('transaction.create')}}">
            <i class="fas fa-fw fa-book"></i>
            <span>Transaksi</span>
        </a>
    </li>
    <li class="nav-item {{active('transaction.index')}}">
        <a class="nav-link" href="{{route('transaction.index')}}">
            <i class="fas fa-fw fa-book"></i>
            <span>List Transaksi</span>
        </a>
    </li>
    <li class="nav-item {{active('transaction.history')}}">
        <a class="nav-link" href="{{route('transaction.history')}}">
            <i class="fas fa-fw fa-book"></i>
            <span>Riwayat Transaksi</span>
        </a>
    </li> --}}
    <li class="nav-item {{active('setting.index')}}">
        <a class="nav-link" href="{{route('setting.index')}}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Setting</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{is_active('user.index') || is_active('role.index') ? '':'collapsed'}}" href="#" data-toggle="collapse" data-target="#user" aria-expanded="true" aria-controls="user">
            <i class="fas fa-fw fa-user"></i>
            <span>Manajemen Pengguna</span>
        </a>
        <div id="user" class="collapse {{is_active('user.index') || is_active('role.index')  ? 'show':''}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{active('user.index')}}" href="{{route('user.index')}}">Pengguna</a>
            <a class="collapse-item {{active('role.index')}}" href="{{route('role.index')}}">Hak Akses</a>
            </div>
        </div>
    </li>

</ul>
<!-- End of Sidebar -->
