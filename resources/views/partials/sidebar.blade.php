<div class="d-flex flex-column flex-shrink-0 p-3 bg-light">
  <aside class="sidenav" id="sidenav-main">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <img src="{{ asset('img/cow.png') }}" alt="logo" width="30" height="30">&nbsp;
      <span class="fs-4"><b>BBIB Singosari</b></span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="/dashboard/dash" class="nav-link link-dark  {{ ($tittle === "Dashboard")? 'active': '' }}" aria-current="page">
          <i class="fa-solid fa-home"></i>&nbsp;
          Home
        </a>
      </li>
      <li>
          <a href="/target" class="nav-link link-dark  {{ ($tittle === 'Master Data')? 'active': '' }}" aria-current="page">
            <i class="fa-solid fa-chart-simple"></i>&nbsp;
            Master Data
          </a>
      </li>
      <li>
          <a href="/upload" class="nav-link link-dark  {{ ($tittle === 'Tambah Data')? 'active': '' }}" aria-current="page">
            <i class="fa-solid fa-database"></i>&nbsp;
            Tambah Data
          </a>
      </li>
      <li>
        <a href="/ppmgt" class="nav-link link-dark {{ ($tittle === 'Pemeliharaan')? 'active': '' }}">
          <i class="fa-solid fa-hospital"></i>&nbsp;
          Pemeliharaan
        </a>
      </li>
      <li>
        <a href="/bmn" class="nav-link link-dark {{ ($tittle === 'Stock Barang')? 'active': '' }}">
          <i class="fa-solid fa-boxes-stacked"></i>&nbsp;
          Stock Barang
        </a>
      </li>
      <li>
        <a href="/distribusi" class="nav-link link-dark {{ ($tittle === 'Distribusi')? 'active': '' }}">
          <i class="fa-solid fa-cart-shopping"></i>&nbsp;
          Distribusi
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="{{ asset('img/user.png') }}" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>mdo</strong>
      </a>
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="/profile">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
    </div>
  </aside>
</div>


{{-- <div class="d-flex flex-column flex-shrink-0 bg-light" style="width: 4.5rem;">
  <a href="/" class="d-block p-3 link-dark text-decoration-none" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
    <svg class="bi" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
    <span class="visually-hidden">Icon-only</span>
  </a>
  <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
    <li class="nav-item">
      <a href="#" class="nav-link active py-3 border-bottom" aria-current="page" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
        <svg class="bi" width="24" height="24" role="img" aria-label="Home"><use xlink:href="#home"></use></svg>
      </a>
    </li>
    <li>
      <a href="#" class="nav-link py-3 border-bottom" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Dashboard">
        <svg class="bi" width="24" height="24" role="img" aria-label="Dashboard"><use xlink:href="#"></use></svg>
      </a>
    </li>
    <li>
      <a href="#" class="nav-link py-3 border-bottom" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Orders">
        <svg class="bi" width="24" height="24" role="img" aria-label="Orders"><use xlink:href="#"></use></svg>
      </a>
    </li>
    <li>
      <a href="#" class="nav-link py-3 border-bottom" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Products">
        <svg class="bi" width="24" height="24" role="img" aria-label="Products"><use xlink:href="#"></use></svg>
      </a>
    </li>
    <li>
      <a href="#" class="nav-link py-3 border-bottom" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Customers">
        <svg class="bi" width="24" height="24" role="img" aria-label="Customers"><use xlink:href="#"></use></svg>
      </a>
    </li>
  </ul>
  <div class="dropdown border-top">
    <a href="#" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
      <img src="https://github.com/mdo.png" alt="mdo" width="24" height="24" class="rounded-circle">
    </a>
    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
      <li><a class="dropdown-item" href="#">New project...</a></li>
      <li><a class="dropdown-item" href="#">Settings</a></li>
      <li><a class="dropdown-item" href="#">Profile</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="#">Sign out</a></li>
    </ul>
  </div>
</div> --}}


{{-- <div class="wrapper">
    <aside id="sidebar">
        <div class="d-flex">
            <button id="toggle-btn" type="button">
                <i class="fa-solid fa-bars-staggered"></i>
            </button>
            <div class="sidebar-logo">
                <a href="/upload"><b>BBIB Singosari</b></a>
            </div>
        </div>
        <ul id="sidebar-nav">
            <li id="sidebar-item">
                <a href="/upload" class="sidebar-link {{ ($tittle === "Produksi")? 'active': '' }}">
                    <i class="fa-solid fa-house"></i>&nbsp;
                    <span>Dashboard</span>
                </a>
            </li>

            <li id="sidebar-item">
                <a href="#" class="sidebar-link sidebar-dropdown list-unstyled collapsed" data-bs-toggle="collapse" 
                    data-bs-target="#produksi" aria-expanded="false" aria-controls="produksi">
                    <i class="fa-solid fa-upload"></i> &nbsp;
                    <span>Tambah Data Produksi</span>
                </a>
                <ul id="produksi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/add-data">Tambah Data Manual</a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/import">Import File Produksi</a>
                    </li>
                </ul>
            </li>
            
            <li id="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="fa-solid fa-hospital"></i>&nbsp;
                    <span>Pemeliharaan</span>
                </a>
            </li>
            
            <li id="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="fa-solid fa-cart-plus"></i>&nbsp;
                    <span>Update Penjualan</span>
                </a>
            </li>
            <li id="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="fa-solid fa-warehouse"></i>&nbsp;
                    <span>Kelola Stock Barang</span>
                </a>
            </li>
            <li id="sidebar-item">
                <a href="profile" class="sidebar-link">
                    <i class="fa-solid fa-user"></i>&nbsp;
                    <span>Profile</span>
                </a>
            </li>
            <li id="sidebar-item">
                <a href="{{ route('logout') }}" class="sidebar-link">
                    <i class="fa-solid fa-right-from-bracket"></i>&nbsp;
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </aside>
</div> --}}