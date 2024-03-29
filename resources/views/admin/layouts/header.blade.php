<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none link-success">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="row">
    <div class="col">
        <div class="page-heading">
            <h3 class="text-success">{{ $title }}</h3>
        </div>
    </div>
    <div class="col text-end">
        <div class="btn-group mb-1">
            <div class="dropdown">
                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ Auth::user()->profile_photo_url }}" class="img-fluid rounded-circle me-2" width="25"
                        alt="{{ Auth::user()->name }}"> {{ Auth::user()->name }}
                </button>
                <div class="dropdown-menu shadow mt-1" aria-labelledby="dropdownMenuButton">
                    <a href="{{ route('admin.dashboard') }}" class="dropdown-item"><i class="bi bi-grid me-3"></i>
                        Dashboard</a>
                    <a href="{{ route('candidate.index') }}" class="dropdown-item"><i class="bi bi-person me-3"></i>
                        Kandidat</a>
                    <a href="{{ route('voter.index') }}" class="dropdown-item"><i class="bi bi-people me-3"></i>
                        Pemilih</a>
                    <hr class="dropdown-divider">
                    <form method="POST" action="{{ route('logout') }}" class="m-0">
                        @csrf
                        <button class="dropdown-item" type="submit" onclick="event.preventDefault();
                        this.closest('form').submit();"><i class="bi bi-box-arrow-right me-3"></i> Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>