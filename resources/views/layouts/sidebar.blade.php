<div class="iconsidebar-menu">
    <div class="sidebar">
      <ul class="iconMenu-bar custom-scrollbar">
        @if (Auth::user()->roles == 0)
        <li><a class="bar-icons" href="{{ url('admin') }}">
            <!--img(src='../assets/images/menu/home.png' alt='')--><i class="pe-7s-home"></i><span>Beranda    </span></a>
        </li>
        @endif

        @if (Auth::user()->roles == 1)

        <li><a class="bar-icons" href="{{ url('customer') }}">
            <!--img(src='../assets/images/menu/home.png' alt='')--><i class="pe-7s-home"></i><span>Beranda    </span></a>
        </li>
        @endif
        @if (Auth::user()->roles == 2)

        <li><a class="bar-icons" href="{{ url('kasir') }}">
            <!--img(src='../assets/images/menu/home.png' alt='')--><i class="pe-7s-home"></i><span>Beranda    </span></a>
        </li>
        @endif


        @if (Auth::user()->roles !=  2)
        <li><a class="bar-icons" href="javascript:void(0)"><i class="pe-7s-portfolio"></i><span>Master Data</span></a>
          <ul class="iconbar-mainmenu custom-scrollbar">
            <li class="iconbar-header">Master Data</li>
            @if (Auth::user()->roles == 0)
                <li>
                    <a class="nav-link" href="{{ url('admin/customer') }}">Master Customer</a>
                </li>
            @endif
            @if (Auth::user()->roles == 1)
                <li>
                    <a class="nav-link" href="{{ url('customer/toko') }}">Master Toko</a>
                </li>
                <li>
                    <a class="nav-link" href="{{ url('customer/kategori') }}">Master Kategori</a>
                </li>
                <li>
                    <a class="nav-link" href="{{ url('customer/produk') }}">Master Produk</a>
                </li>
                <li>
                    <a class="nav-link" href="{{ url('customer/kasir') }}">Master Kasir</a>
                </li>
            @endif
        </ul>
        @endif


        <li><a class="bar-icons" href="javascript:void(0)"><i class="pe-7s-portfolio"></i><span>Transaksi</span></a>
            <ul class="iconbar-mainmenu custom-scrollbar">
              <li class="iconbar-header">Transaksi</li>
              @if (Auth::user()->roles == 0)
                  <li>
                      <a class="nav-link" href="{{ url('admin/customer') }}">Master Customer</a>
                  </li>
              @endif
              @if (Auth::user()->roles == 1)
                  <li>
                      <a class="nav-link" href="{{ url('customer/pemasukan') }}">Transaksi Pemasukan</a>
                  </li>
                  <li>
                      <a class="nav-link" href="{{ url('customer/pengeluaran') }}">Transaksi Pengeluaran</a>
                  </li>
              @endif
              @if (Auth::user()->roles == 2)
                  <li>
                      <a class="nav-link" href="{{ url('kasir/transaksi') }}">Transaksi Kasir</a>
                      <a class="nav-link" href="{{ url('kasir/riwayat_transaksi') }}">Riwayat Transaksi</a>
                  </li>
              @endif
          </ul>
        </li>

    </li>
    @if (Auth::user()->roles == 1)
    <li><a class="bar-icons" href="{{ url('user/profil') }}"><i class="pe-7s-note2"></i><span>Profil</span></a>
    @endif

        <li><a class="bar-icons" href="{{ url('logout') }}"><i class="pe-7s-note2"></i><span>Logout</span></a>
        </li>

      </ul>
    </div>
</div>
