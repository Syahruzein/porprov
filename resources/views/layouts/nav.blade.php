<nav class="navbar navbar-expand-md bg-dark sticky-top border-bottom " data-bs-theme="dark" style=" border-top: 5px solid #E7BF3A">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="img/Capture.png" alt="Logo" width="130rem" class="d-inline-block align-text-top">
        </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav flex-grow-1 justify-content-between">
            <li class="nav-item"><a class="nav-link" href="#">
                <svg class="bi" width="24" height="24"></svg>
            </a></li>
            <li class="nav-item"><a class="nav-link font-semibold"  href="{{ route('homeWelcome')}}">Beranda</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle font-semibold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Kategori</a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link dropdown-item font-semibold" href="{{ route('jadwalWelcome')}}">Jadwal</a></li>
                    {{-- <li><a class="nav-link dropdown-item font-semibold" href="{{ route('tempatWelcome')}}">Venue</a></li> --}}
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="nav-link dropdown-item font-semibold" href="{{ route('hasilWelcome')}}">Hasil</a></li>
                </ul>
            </li>
            <li class="nav-item"><a class="nav-link font-semibold" href="{{ route('medaliWelcome')}}">Medali</a></li>
            @if (Route::has('login'))
                @auth
                        <li><a href="{{ url('/dashboard') }}" class="nav-link font-semibold ">Dashboard</a></li>
                    @else
                        <li><a href="{{ route('login') }}" class="nav-link font-semibold ">Masuk</a></li>
                    {{--  @if (Route::has('register'))
                        <li><a href="{{ route('register') }}" class="nav-link font-semibold ">Daftar</a></li>
                    @endif  --}}
                @endauth
            @endif
            <li class="nav-item"><a class="nav-link font-semibold" href="#">
                <svg class="bi" width="24" height="24"></svg>
            </a></li>
            </ul>
        </div>
    </div>
  </nav>