<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="mt-3 sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ route('admin.dashboard') }}" class="d-flex">
                        <img src="{{ asset('assets/images/logo/prm-hmtif-unpas.png') }}" alt="PRM HMTIF-UNPAS"
                            width="30" height="30" class="object-fit-contain">
                        <h5 class="mb-0 text-success">PRM HMTIF-UNPAS</h5>
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
                <li class="sidebar-item">
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

                {{-- <li class="sidebar-title text-success">Unduh Laporan</li>
                <li class="sidebar-item">
                    <a href="{{ route('admin.votes.export.excel') }}" class="sidebar-link">
                        <i class="fas fa-file-excel"></i>
                        <span>Excel</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('admin.votes.export.pdf') }}" class="sidebar-link">
                        <i class="fas fa-file-pdf"></i>
                        <span>PDF</span>
                    </a>
                </li> --}}
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>