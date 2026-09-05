<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Detail Pengaduan - Sistem Pengaduan</title>

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
        overflow: hidden;
    }

    .card-header {
        padding: 22px 25px;
        border-bottom: 1px solid #e5e7eb;
    }

    .card-header h3 {
        font-size: 18px;
        color: #111827;
    }

    .card-body {
        padding: 25px;
    }

    .detail-row {
        display: grid;
        grid-template-columns: 180px 1fr;
        gap: 20px;

        padding: 16px 0;

        border-bottom: 1px solid #f1f5f9;
    }

    .detail-row:last-child {
        border-bottom: none;
    }

    .detail-label {
        font-size: 14px;
        font-weight: 700;
        color: #6b7280;
    }

    .detail-value {
        font-size: 14px;
        color: #111827;
        line-height: 1.7;
    }

    .isi {
        white-space: pre-line;
    }

    .badge {
        display: inline-block;

        padding: 6px 11px;
        border-radius: 20px;

        font-size: 12px;
        font-weight: 700;
    }

    .badge-menunggu {
        background: #fef3c7;
        color: #b45309;
    }

    .badge-diproses {
        background: #dbeafe;
        color: #2563eb;
    }

    .badge-selesai {
        background: #dcfce7;
        color: #16a34a;
    }

    .badge-ditolak {
        background: #fee2e2;
        color: #dc2626;
    }

    /* BALASAN */

    .reply-section {
        margin-top: 30px;
        padding-top: 25px;
        border-top: 1px solid #e5e7eb;
    }

    .reply-title {
        font-size: 18px;
        color: #111827;
        margin-bottom: 18px;
    }

    .reply-item {
        background: #f8fafc;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 18px;
        margin-bottom: 12px;
    }

    .reply-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .reply-name {
        font-size: 14px;
        font-weight: 700;
        color: #111827;
    }

    .reply-role {
        display: inline-block;
        margin-left: 8px;
        padding: 4px 8px;
        border-radius: 15px;
        background: #dbeafe;
        color: #2563eb;
        font-size: 11px;
        font-weight: 700;
    }

    .reply-date {
        font-size: 12px;
        color: #6b7280;
    }

    .reply-text {
        font-size: 14px;
        color: #374151;
        line-height: 1.7;
        white-space: pre-line;
    }

    .empty-reply {
        padding: 20px;
        background: #f9fafb;
        border: 1px dashed #d1d5db;
        border-radius: 10px;
        text-align: center;
        color: #9ca3af;
        font-size: 14px;
    }

    /* FORM BALASAN */

    .reply-form {
        margin-top: 25px;
        padding: 20px;
        background: #f8fafc;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        font-size: 14px;
        font-weight: 600;
        color: #374151;
    }

    textarea,
    select {
        width: 100%;
        padding: 12px;

        border: 1px solid #d1d5db;
        border-radius: 8px;

        background: white;

        font-family: Arial, Helvetica, sans-serif;
        font-size: 14px;

        outline: none;
    }

    textarea {
        min-height: 130px;
        resize: vertical;
    }

    textarea:focus,
    select:focus {
        border-color: #2563eb;
    }

    .error {
        margin-top: 5px;
        color: #dc2626;
        font-size: 13px;
    }

    .btn-send {
        background: #2563eb;
        color: white;

        border: none;
        padding: 11px 18px;

        border-radius: 8px;

        font-size: 14px;
        font-weight: 600;

        cursor: pointer;
    }

    .btn-send:hover {
        background: #1d4ed8;
    }

    .buttons {
        display: flex;
        gap: 10px;
        margin-top: 25px;
    }

    .btn {
        display: inline-block;

        padding: 10px 16px;

        border: none;
        border-radius: 8px;

        font-size: 13px;
        font-weight: 600;

        text-decoration: none;
        cursor: pointer;
    }

    .btn-secondary {
        background: #6b7280;
        color: white;
    }

    .btn-secondary:hover {
        background: #4b5563;
    }

    @media (max-width: 650px) {

        .navbar {
            padding: 0 20px;
        }

        .container {
            padding: 25px 15px;
        }

        .profile-info {
            display: none;
        }

        .detail-row {
            grid-template-columns: 1fr;
            gap: 6px;
        }

        .card-body {
            padding: 20px;
        }

        .reply-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 5px;
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
            Detail Pengaduan
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
                Detail Pengaduan
            </h2>

            <p>
                Informasi lengkap mengenai pengaduan pelanggan.
            </p>

        </div>


        {{-- SUCCESS --}}
        @if (session('success'))

            <div style="
                background: #dcfce7;
                color: #166534;
                border: 1px solid #bbf7d0;
                padding: 13px 16px;
                border-radius: 8px;
                margin-bottom: 20px;
                font-size: 14px;
            ">
                {{ session('success') }}
            </div>

        @endif


        {{-- DATA PENGADUAN --}}
        <div class="card">

            <div class="card-header">

                <h3>
                    {{ $pengaduan->judul }}
                </h3>

            </div>


            <div class="card-body">

                {{-- CUSTOMER --}}
                @if (Auth::user()->role !== 'customer')

                    <div class="detail-row">

                        <div class="detail-label">
                            Customer
                        </div>

                        <div class="detail-value">
                            {{ $pengaduan->user->name }}
                        </div>

                    </div>

                @endif


                {{-- JUDUL --}}
                <div class="detail-row">

                    <div class="detail-label">
                        Judul Pengaduan
                    </div>

                    <div class="detail-value">
                        {{ $pengaduan->judul }}
                    </div>

                </div>


                {{-- KATEGORI --}}
                <div class="detail-row">

                    <div class="detail-label">
                        Kategori
                    </div>

                    <div class="detail-value">
                        {{ $pengaduan->kategori }}
                    </div>

                </div>


                {{-- ISI --}}
                <div class="detail-row">

                    <div class="detail-label">
                        Isi Pengaduan
                    </div>

                    <div class="detail-value isi">
                        {{ $pengaduan->isi_pengaduan }}
                    </div>

                </div>


                {{-- STATUS --}}
                <div class="detail-row">

                    <div class="detail-label">
                        Status
                    </div>

                    <div class="detail-value">

                        @if ($pengaduan->status === 'menunggu')

                            <span class="badge badge-menunggu">
                                Menunggu
                            </span>

                        @elseif ($pengaduan->status === 'diproses')

                            <span class="badge badge-diproses">
                                Diproses
                            </span>

                        @elseif ($pengaduan->status === 'selesai')

                            <span class="badge badge-selesai">
                                Selesai
                            </span>

                        @else

                            <span class="badge badge-ditolak">
                                Ditolak
                            </span>

                        @endif

                    </div>

                </div>


                {{-- TANGGAL --}}
                <div class="detail-row">

                    <div class="detail-label">
                        Tanggal Pengaduan
                    </div>

                    <div class="detail-value">
                        {{ $pengaduan->created_at->format('d F Y, H:i') }}
                    </div>

                </div>


                {{-- ========================= --}}
                {{-- RIWAYAT BALASAN --}}
                {{-- ========================= --}}

                <div class="reply-section">

                    <h3 class="reply-title">
                        Riwayat Balasan
                    </h3>


                    @forelse ($pengaduan->balasan as $balasan)

                        <div class="reply-item">

                            <div class="reply-header">

                                <div>

                                    <span class="reply-name">
                                        {{ $balasan->user->name }}
                                    </span>

                                    <span class="reply-role">
                                        {{ ucfirst($balasan->user->role) }}
                                    </span>

                                </div>

                                <span class="reply-date">
                                    {{ $balasan->created_at->format('d/m/Y H:i') }}
                                </span>

                            </div>


                            <div class="reply-text">
                                {{ $balasan->balasan }}
                            </div>

                        </div>

                    @empty

                        <div class="empty-reply">
                            Belum ada balasan dari petugas.
                        </div>

                    @endforelse


                    {{-- ========================= --}}
                    {{-- FORM BALASAN PETUGAS --}}
                    {{-- ========================= --}}

                    @if (in_array(Auth::user()->role, ['admin', 'petugas']))

                        <div class="reply-form">

                            <h3 class="reply-title">
                                Balas Pengaduan
                            </h3>


                            <form
                                action="{{ route('pengaduan.balas', $pengaduan) }}"
                                method="POST"
                            >

                                @csrf


                                {{-- BALASAN --}}
                                <div class="form-group">

                                    <label class="form-label">
                                        Balasan
                                    </label>

                                    <textarea
                                        name="balasan"
                                        required
                                        placeholder="Tuliskan balasan kepada customer..."
                                    ></textarea>

                                    @error('balasan')

                                        <div class="error">
                                            {{ $message }}
                                        </div>

                                    @enderror

                                </div>


                                {{-- STATUS --}}
                                <div class="form-group">

                                    <label class="form-label">
                                        Status Pengaduan
                                    </label>

                                    <select
                                        name="status"
                                        required
                                    >

                                        <option value="diproses">
                                            Diproses
                                        </option>

                                        <option value="selesai">
                                            Selesai
                                        </option>

                                        <option value="ditolak">
                                            Ditolak
                                        </option>

                                    </select>

                                    @error('status')

                                        <div class="error">
                                            {{ $message }}
                                        </div>

                                    @enderror

                                </div>


                                <button
                                    type="submit"
                                    class="btn-send"
                                >
                                    Kirim Balasan
                                </button>

                            </form>

                        </div>

                    @endif

                </div>


                {{-- BUTTON KEMBALI --}}
                <div class="buttons">

                    <a
                        href="{{ route('pengaduan.index') }}"
                        class="btn btn-secondary"
                    >
                        ← Kembali
                    </a>

                </div>

            </div>

        </div>

    </main>

</main>


</div>

</body>

</html>
