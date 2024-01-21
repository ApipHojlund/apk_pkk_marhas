<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="profile-image">
                    <img class="img-xs rounded-circle" src="{{asset('image/user/'.Auth()->User()->foto)}}" alt="profile image">
                    <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                    <p class="profile-name">{{Auth()->User()->nama}}</p>
                    <p class="designation">{{Auth()->User()->level}}</p>
                </div>
                <div class="icon-container">
                    <i class="icon-bubbles"></i>
                    <div class="dot-indicator bg-danger"></div>
                </div>
            </a>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Dashboard</span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/dashboard">
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
            </a>
        </li>
        <li class="nav-item nav-category"><span class="nav-link">UI Elements</span></li>
        <li class="nav-item">
        </li>
        @can('seller')
        <li class="nav-item">
            <a class="nav-link" href="/user">
                <span class="menu-title">User</span>
                <i class="icon-user menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/jenis">
                <span class="menu-title">Jenis Produk</span>
                <i class="icon-layers menu-icon"></i>
            </a>
        </li>
        @endcan
        <li class="nav-item">
            <a class="nav-link" href="/produk">
                <span class="menu-title">Produk</span>
                <i class="icon-bag menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/pesanan">
                <span class="menu-title">Detail Transaksi</span>
                <i class="icon-basket menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/transaksi">
                <span class="menu-title">Transaksi</span>
                <i class="icon-chart menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>