<nav class="navbar bg-light fixed-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        @guest
            
        @else
        <ul class="navbar-brand">
            <li class="navbar nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->username }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                </ul>
            </li>
        </ul>
        @endguest
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">SetNasBdg</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <hr />
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/anggota">Anggota</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" data-bs-toggle="modal" data-bs-target="#come" href="">Barang Inventaris</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/perkara">Perkara Ditangani</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/rencana">Rencana Kegiatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/lampiran">Lampiran Kegiatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" data-bs-toggle="modal" data-bs-target="#come" href="">Barang Bukti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" data-bs-toggle="modal" data-bs-target="#come" href="">Referensi</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" data-bs-toggle="modal" data-bs-target="#come" href="">Rekap Ungkap</a>
                    </li> -->
                </ul>
            </div>
        </div>
    </div>
</nav>