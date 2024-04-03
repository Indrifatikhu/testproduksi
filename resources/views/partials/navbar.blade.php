<nav class="navbar navbar-expand-lg bg-success navbar-dark" style="background-color: #6A994E"> 
    <div class="container">
        <a class="navbar-brand" href="/upload"><b>BBIB Singosari</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ ($tittle === "Produksi")? 'active': '' }}" href="/upload"><b>Produksi</b></a> 
                </li>
                
                <li class="nav-item">
                    <a class="nav-link {{ ($tittle === "Database")? 'active': '' }}" href="/database"><b>Database</b></a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link {{ ($tittle === "Display")? 'active': '' }}" href="/display">Display</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($tittle === "Category")? 'active': '' }}" href="/category">Category</a>
                </li> --}}
            </ul>
        </div>
    </div>
</nav>