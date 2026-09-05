<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Buat Pengaduan - Sistem Pengaduan</title>

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

    .layout {
        display: flex;
        min-height: 100vh;
    }

    .main {
        flex: 1;
        min-width: 0;
    }

    .sidebar {
        width: 250px;
        min-height: 100vh;
        background: #111827;
        color: white;
        padding: 25px 18px;
        flex-shrink: 0;
    }

    .logo {
        padding: 0 12px 25px;
        border-bottom: 1px solid #374151;
    }

    .logo h1 {
        font-size: 20px;
        color: white;
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

    .navbar {
        height: 70px;
        background: #ffffff;
        border-bottom: 1px solid #e5e7eb;

        display: flex;
        align-items: center;
        justify-content: space-between;

        padding: 0 35px;
    }

    .navbar h2 {
        font-size: 20px;
        color: #111827;
    }

    .profile {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .profile-info {
        text-align: right;
    }

    .profile-name {
        font-size: 14px;
        font-weight: 600;
        color: #111827;
    }

    .profile-role {
        font-size: 12px;
        color: #6b7280;
        margin-top: 3px;
    }

    .avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;

        background: #dbeafe;
        color: #2563eb;

        display: flex;
        align-items: center;
        justify-content: center;

        font-weight: bold;
    }

    .container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 40px 35px;
    }

    .page-header {
        margin-bottom: 25px;
    }

    .page-header h2 {
        font-size: 27px;
        color: #111827;
        margin-bottom: 7px;
    }

    .page-header p {
        color: #6b7280;
        font-size: 14px;
    }

    .card {
        background: white;
        border-radius: 12px;
        border: 1px solid #e5e7eb;

        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.04);

        padding: 30px;
    }

    .form-group {
        margin-bottom: 22px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;

        font-size: 14px;
        font-weight: 600;
        color: #374151;
    }

    .form-control {
        width: 100%;

        padding: 12px 14px;

        border: 1px solid #d1d5db;
        border-radius: 8px;

        font-size: 14px;
        font-family: Arial, Helvetica, sans-serif;

        outline: none;
        transition: 0.2s;
    }

    .form-control:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    textarea.form-control {
        min-height: 160px;
        resize: vertical;
    }

    select.form-control {
        background: white;
        cursor: pointer;
    }

    .error {
        margin-top: 6px;
        font-size: 13px;
        color: #dc2626;
    }

    .buttons {
        display: flex;
        gap: 10px;
        margin-top: 30px;
    }

    .btn {
        display: inline-block;

        padding: 11px 18px;

        border: none;
        border-radius: 8px;

        font-size: 14px;
        font-weight: 600;

        text-decoration: none;
        cursor: pointer;
    }

    .btn-primary {
        background: #2563eb;
        color: white;
    }

    .btn-primary:hover {
        background: #1d4ed8;
    }

    .btn-secondary {
        background: #6b7280;
        color: white;
    }

    .btn-secondary:hover {
        background: #4b5563;
    }

    .required {
        color: #dc2626;
    }

    @media (max-width: 650px) {

        .sidebar {
            display: none;
        }

        .navbar {
            padding: 0 20px;
        }

        .container {
            padding: 25px 15px;
        }

        .profile-info {
            display: none;
        }

        .card {
            padding: 20px;
        }
    }
</style>


</head>

<body>

<div class="layout">

{{-- SIDEBAR --}}
<x-sidebar />

{{-- MAIN --}}
<main class="main">

    {{-- NAVBAR --}}
    <nav class="navbar">

        <h2>
            Buat Pengaduan
        </h2>

        <div class="profile">

            <div class="profile-info">

                <div class="profile-name">
                    {{ Auth::user()->name }}
                </div>

                <div class="profile-role">
                    {{ ucfirst(Auth::user()->role) }}
                </div>

            </div>

            <div class="avatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>

        </div>

    </nav>

    {{-- CONTENT --}}
    <main class="container">

        <div class="page-header">

            <h2>
                Buat Pengaduan
            </h2>

            <p>
                Silakan isi formulir berikut untuk menyampaikan pengaduan.
            </p>

        </div>

        <div class="card">

            <form action="{{ route('pengaduan.store') }}" method="POST">

                @csrf

                {{-- JUDUL --}}
                <div class="form-group">

                    <label for="judul">
                        Judul Pengaduan <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        id="judul"
                        name="judul"
                        class="form-control"
                        value="{{ old('judul') }}"
                        placeholder="Contoh: Pelayanan kurang baik"
                        required
                    >

                    @error('judul')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- KATEGORI --}}
                <div class="form-group">

                    <label for="kategori">
                        Kategori <span class="required">*</span>
                    </label>

                    <select
                        id="kategori"
                        name="kategori"
                        class="form-control"
                        required
                    >

                        <option value="">
                            -- Pilih Kategori --
                        </option>

                        <option value="Pelayanan"
                            {{ old('kategori') == 'Pelayanan' ? 'selected' : '' }}>
                            Pelayanan
                        </option>

                        <option value="Produk"
                            {{ old('kategori') == 'Produk' ? 'selected' : '' }}>
                            Produk
                        </option>

                        <option value="Fasilitas"
                            {{ old('kategori') == 'Fasilitas' ? 'selected' : '' }}>
                            Fasilitas
                        </option>

                        <option value="Lainnya"
                            {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>
                            Lainnya
                        </option>

                    </select>

                    @error('kategori')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- ISI PENGADUAN --}}
                <div class="form-group">

                    <label for="isi_pengaduan">
                        Isi Pengaduan <span class="required">*</span>
                    </label>

                    <textarea
                        id="isi_pengaduan"
                        name="isi_pengaduan"
                        class="form-control"
                        placeholder="Tuliskan pengaduan kamu secara jelas..."
                        required
                    >{{ old('isi_pengaduan') }}</textarea>

                    @error('isi_pengaduan')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- BUTTON --}}
                <div class="buttons">

                    <a
                        href="{{ route('pengaduan.index') }}"
                        class="btn btn-secondary"
                    >
                        Kembali
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Kirim Pengaduan
                    </button>

                </div>

            </form>

        </div>

    </main>

</main>


</div>

</body>

</html>
