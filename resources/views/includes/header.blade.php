
<style>
    @media print {
        .header {
            display: none;
        }
    }
    .nav-header-link:hover {
        background-color: #e5e5e5;
    }
</style>
<div id="navbar" class="navbar navbar-expand-lg navbar-fixed">
    <div class="container">
        <a href="/" class="d-sm-block">
            <img class="img-fluid" width="40" height="32" src="{{ asset('/logo.svg') }}" alt="Gimnaziul Semeni Logo">
        </a>
        <a href="/" class="navbar-brand d-none d-lg-block">
            Gimnaziul Semeni
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{route('achizition') }}">Achiziții publice</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('about') }}">Contacte</a></li>
                @if(!Auth::user())
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link link-body-emphasis text-decoration-none" >Intrare</a></li>
                @else
                    <li class="nav-item"><a class="nav-link link-body-emphasis text-decoration-none" href=""  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Ieșire
                        </a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endif
            </ul>
        </div>
    </div>
</div>
