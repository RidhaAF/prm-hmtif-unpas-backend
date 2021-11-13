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
                    <i class="bi bi-person-fill me-3"></i> {{ Auth::user()->name }}
                </button>
                <div class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item" type="submit" onclick="event.preventDefault();
                        this.closest('form').submit();"><i class="bi bi-box-arrow-right me-3"></i> Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>