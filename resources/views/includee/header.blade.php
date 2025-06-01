
<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
  @auth
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/dashboard') }}">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/error404') }}">Error-404</a>
    </li>
    @if(in_array(auth()->user()->level, ['superadmin']))
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/settings') }}">Pengaturan App</a>
      </li>
    @endif
    @if(in_array(auth()->user()->level, ['admin', 'superadmin']))
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="tabelDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Tabel
        </a>
        <ul class="dropdown-menu" aria-labelledby="tabelDropdown">
          <li><a class="dropdown-item" href="{{ url('/users') }}">Tabel User</a></li>
          <li><a class="dropdown-item" href="{{ url('/marga') }}">Tabel Marga</a></li>
          <li><a class="dropdown-item" href="{{ url('/pasangan') }}">Tabel Pasangan</a></li>
          <li><a class="dropdown-item" href="{{ url('/logactivity') }}">Activity Log</a></li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/familytree') }}">Pohon keluarga</a>
      </li>
    @elseif(in_array(auth()->user()->level, ['kp']))
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/marga') }}">Tabel Marga</a>
      </li>
    @endif
    <li class="nav-item">
      <form action="{{ route('logout') }}" method="POST" class="d-flex ms-3">
        @csrf
        <button type="submit" class="btn btn-danger btn-sm">Logout</button>
      </form>
    </li>
  @endauth
  @guest
    <li class="nav-item">
      <a class="nav-link" href="{{ route('login') }}">Login</a>
    </li>
  @endguest
</ul>