<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header mt-3">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ route('admin.dashboard') }}">
                        <h5 class="text-success">PRM HMTIF-UNPAS</h4>
                    </a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block link-success"><i class="bi bi-x bi-middle"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title text-success">Menu</li>
                <li class="sidebar-item active">
                    <a href="{{ route('admin.dashboard') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('candidate.index') }}" class='sidebar-link'>
                        <i class="bi bi-person-fill"></i>
                        <span>Kandidat</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('voter.index') }}" class='sidebar-link'>
                        <i class="bi bi-people-fill"></i>
                        <span>Pemilih</span>
                    </a>
                </li>

                {{-- <li class="sidebar-title text-success">Laporan</li>
                <li class="sidebar-item has-sub">
                    <a href="{{ route('admin.dashboard') }}" class='sidebar-link'>
                        <i class="bi bi-file-earmark-arrow-down-fill"></i>
                        <span>Unduh Laporan</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="">Laporan Kandidat</a>
                        </li>
                        <li class="submenu-item">
                            <a href="">Laporan Pemilih</a>
                        </li>
                    </ul>
                </li> --}}
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>