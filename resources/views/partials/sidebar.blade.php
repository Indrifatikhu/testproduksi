<div class="wrapper">
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
</div>