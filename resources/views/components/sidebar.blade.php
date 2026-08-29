<aside class="sidebar">
    <div class="logo">
        <h1>Sistem Pengaduan</h1>
        <p>Panel Manajemen</p>
    </div>

    <div class="menu">
        <div class="menu-title">
            Menu
        </div>

        <a href="{{ route('dashboard') }}"
           class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            Dashboard
        </a>

        @if (Auth::user()->role === 'admin' || Auth::user()->role === 'petugas')
            <a href="{{ route('users.index') }}"
               class="{{ request()->routeIs('users.*') ? 'active' : '' }}">
                Data User
            </a>
        @endif

        <a href="{{ route('pengaduan.index') }}"
           class="{{ request()->routeIs('pengaduan.*') ? 'active' : '' }}">
            Data Pengaduan
        </a>
    </div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button type="submit" class="logout">
            Logout
        </button>
    </form>
</aside>

<style>
.sidebar {
    width: 250px;
    background: #111827;
    color: white;
    padding: 25px 18px;
    min-height: 100vh;
    flex-shrink: 0;
}

.logo {
    padding: 0 12px 25px;
    border-bottom: 1px solid #374151;
}

.logo h1 {
    font-size: 20px;
}

.logo p {
    margin-top: 5px;
    font-size: 12px;
    color: #9ca3af;
}

.menu {
    margin-top: 25px;
}

.menu-title {
    font-size: 11px;
    color: #9ca3af;
    text-transform: uppercase;
    margin: 0 12px 10px;
}

.menu a {
    display: block;
    text-decoration: none;
    color: #d1d5db;
    padding: 12px;
    border-radius: 7px;
    margin-bottom: 5px;
    font-size: 14px;
}

.menu a:hover,
.menu a.active {
    background: #2563eb;
    color: white;
}

.logout {
    margin-top: 30px;
    width: 100%;
    border: none;
    background: #ef4444;
    color: white;
    padding: 11px;
    border-radius: 7px;
    cursor: pointer;
    font-size: 13px;
}

.logout:hover {
    background: #dc2626;
}
</style>