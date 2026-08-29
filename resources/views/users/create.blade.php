<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Tambah User - Sistem Pengaduan</title>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
        background: #f4f6f9;
        color: #1f2937;
    }

    .navbar {
        height: 70px;
        background: #fff;
        border-bottom: 1px solid #e5e7eb;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 50px;
    }

    .brand h1 {
        font-size: 21px;
        color: #111827;
    }

    .brand p {
        margin-top: 4px;
        font-size: 13px;
        color: #6b7280;
    }

    .nav-right {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .dashboard-link {
        color: #4b5563;
        text-decoration: none;
        font-size: 14px;
    }

    .dashboard-link:hover {
        color: #2563eb;
    }

    .user-info {
        text-align: right;
    }

    .user-name {
        font-size: 14px;
        font-weight: 600;
    }

    .user-role {
        font-size: 12px;
        color: #6b7280;
        margin-top: 3px;
    }

    .logout {
        border: none;
        background: #ef4444;
        color: white;
        padding: 9px 16px;
        border-radius: 7px;
        cursor: pointer;
    }

    .logout:hover {
        background: #dc2626;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 40px 25px;
    }

    .page-header {
        margin-bottom: 25px;
    }

    .page-header h2 {
        font-size: 27px;
        margin-bottom: 7px;
    }

    .page-header p {
        color: #6b7280;
        font-size: 14px;
    }

    .card {
        background: #fff;
        border-radius: 12px;
        border: 1px solid #e5e7eb;
        box-shadow: 0 3px 12px rgba(0, 0, 0, .04);
        padding: 30px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-size: 14px;
        font-weight: 600;
        color: #374151;
        margin-bottom: 8px;
    }

    input,
    select {
        width: 100%;
        padding: 11px 13px;
        border: 1px solid #d1d5db;
        border-radius: 7px;
        outline: none;
        font-size: 14px;
        background: #fff;
    }

    input:focus,
    select:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, .1);
    }

    .error {
        color: #dc2626;
        font-size: 12px;
        margin-top: 5px;
    }

    .buttons {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 30px;
    }

    .btn {
        border: none;
        text-decoration: none;
        padding: 11px 18px;
        border-radius: 7px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
    }

    .btn-back {
        background: #e5e7eb;
        color: #374151;
    }

    .btn-back:hover {
        background: #d1d5db;
    }

    .btn-save {
        background: #2563eb;
        color: white;
    }

    .btn-save:hover {
        background: #1d4ed8;
    }

    @media (max-width: 700px) {
        .navbar {
            padding: 0 20px;
        }

        .dashboard-link {
            display: none;
        }

        .user-info {
            display: none;
        }

        .container {
            padding: 25px 15px;
        }

        .card {
            padding: 20px;
        }
    }
</style>


</head>

<body>


<!-- Navbar -->
<nav class="navbar">

    <div class="brand">
        <h1>Sistem Pengaduan</h1>
        <p>Manajemen Data User</p>
    </div>

    <div class="nav-right">

        <a href="{{ route('dashboard') }}" class="dashboard-link">
            Dashboard
        </a>

        <div class="user-info">
            <div class="user-name">
                {{ Auth::user()->name }}
            </div>

            <div class="user-role">
                {{ ucfirst(Auth::user()->role) }}
            </div>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="logout">
                Logout
            </button>
        </form>

    </div>

</nav>


<!-- Content -->
<main class="container">

    <div class="page-header">
        <h2>Tambah User</h2>

        <p>
            Tambahkan pengguna baru ke dalam sistem.
        </p>
    </div>


    <div class="card">

        <form method="POST" action="{{ route('users.store') }}">

            @csrf

            <!-- Nama -->
            <div class="form-group">

                <label for="name">
                    Nama
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Masukkan nama"
                    required
                >

                @error('name')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <!-- Email -->
            <div class="form-group">

                <label for="email">
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email"
                    required
                >

                @error('email')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <!-- Password -->
            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password"
                    required
                >

                @error('password')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <!-- Role -->
            <div class="form-group">

                <label for="role">
                    Role
                </label>

                <select id="role" name="role" required>

                    @if (Auth::user()->role === 'admin')
                        <option value="admin">Admin</option>
                        <option value="petugas">Petugas</option>
                       
                    
                    @endif

                </select>

                @error('role')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <!-- Buttons -->
            <div class="buttons">

                <a href="{{ route('users.index') }}"
                   class="btn btn-back">
                    Kembali
                </a>

                <button type="submit"
                        class="btn btn-save">
                    Simpan User
                </button>

            </div>

        </form>

    </div>

</main>


</body>
</html>
