
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Pengaduan - Sistem Pengaduan</title>

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

        .sidebar .logout {
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

        .sidebar .logout:hover {
            background: #dc2626;
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
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 35px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .page-title h2 {
            font-size: 27px;
            color: #111827;
            margin-bottom: 7px;
        }

        .page-title p {
            color: #6b7280;
            font-size: 14px;
        }

    

        .btn-add {
            display: inline-block;
            text-decoration: none;

            background: #2563eb;
            color: white;

            padding: 11px 18px;
            border-radius: 8px;

            font-size: 14px;
            font-weight: 600;
        }

        .btn-add:hover {
            background: #1d4ed8;
        }

  
        .alert {
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

    

        .card {
            background: white;
            border-radius: 12px;
            border: 1px solid #e5e7eb;

            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.04);

            overflow: hidden;
        }

        .card-header {
            padding: 20px 24px;
            border-bottom: 1px solid #e5e7eb;
        }

        .card-header h3 {
            font-size: 17px;
            color: #111827;
        }

        .card-header p {
            margin-top: 5px;
            font-size: 13px;
            color: #6b7280;
        }

  

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #f8fafc;
        }

        th {
            padding: 15px 20px;
            text-align: left;

            font-size: 13px;
            color: #4b5563;
            font-weight: 700;

            border-bottom: 1px solid #e5e7eb;
        }

        td {
            padding: 16px 20px;

            font-size: 14px;
            color: #374151;

            border-bottom: 1px solid #f1f5f9;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        .number {
            width: 60px;
            color: #6b7280;
        }

        .judul {
            font-weight: 600;
            color: #111827;
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

    

        .actions {
            display: flex;
            gap: 8px;
        }

        .btn {
            border: none;

            padding: 7px 12px;
            border-radius: 6px;

            font-size: 12px;
            font-weight: 600;

            cursor: pointer;
            text-decoration: none;
        }

        .btn-detail {
            background: #dbeafe;
            color: #2563eb;
        }

        .btn-detail:hover {
            background: #bfdbfe;
        }

        .btn-edit {
            background: #fef3c7;
            color: #b45309;
        }

        .btn-edit:hover {
            background: #fde68a;
        }

        .btn-delete {
            background: #fee2e2;
            color: #dc2626;
        }

        .btn-delete:hover {
            background: #fecaca;
        }

        .empty {
            text-align: center;
            padding: 40px;
            color: #9ca3af;
        }

   

        @media (max-width: 900px) {

            .sidebar {
                width: 210px;
            }

            .container {
                padding: 30px 20px;
            }
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

            .page-header {
                align-items: flex-start;
                flex-direction: column;
                gap: 15px;
            }
        }
    </style>
</head>

<body>

<div class="layout">

    {{-- =========================
         SIDEBAR
    ========================== --}}

    <x-sidebar />


    {{-- =========================
         MAIN
    ========================== --}}

    <main class="main">

        {{-- NAVBAR --}}

        <nav class="navbar">

            <h2>
                Data Pengaduan
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

                <div class="page-title">

                    <h2>
                        Data Pengaduan
                    </h2>

                    <p>
                        Kelola data pengaduan pelanggan.
                    </p>

                </div>


                {{-- CUSTOMER BISA MEMBUAT PENGADUAN --}}

                @if (Auth::user()->role === 'customer')

                    <a href="{{ route('pengaduan.create') }}"
                       class="btn-add">

                        + Buat Pengaduan

                    </a>

                @endif

            </div>


            {{-- SUCCESS MESSAGE --}}

            @if (session('success'))

                <div class="alert alert-success">

                    {{ session('success') }}

                </div>

            @endif


            {{-- CARD --}}

            <div class="card">

                <div class="card-header">

                    <h3>
                        Daftar Pengaduan
                    </h3>

                    <p>
                        Total {{ $pengaduans->count() }} pengaduan
                    </p>

                </div>


                {{-- TABLE --}}

                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>

                                <th>
                                    No
                                </th>

                                {{-- Customer hanya terlihat oleh Admin/Petugas --}}

                                @if (Auth::user()->role !== 'customer')

                                    <th>
                                        Customer
                                    </th>

                                @endif

                                <th>
                                    Judul
                                </th>

                                <th>
                                    Kategori
                                </th>

                                <th>
                                    Status
                                </th>

                                <th>
                                    Tanggal
                                </th>

                                <th>
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse ($pengaduans as $pengaduan)

                                <tr>

                                    {{-- NO --}}

                                    <td class="number">

                                        {{ $loop->iteration }}

                                    </td>


                                    {{-- CUSTOMER --}}

                                    @if (Auth::user()->role !== 'customer')

                                        <td>

                                            <strong>

                                                {{ $pengaduan->user->name }}

                                            </strong>

                                        </td>

                                    @endif


                                    {{-- JUDUL --}}

                                    <td class="judul">

                                        {{ $pengaduan->judul }}

                                    </td>


                                    {{-- KATEGORI --}}

                                    <td>

                                        {{ $pengaduan->kategori }}

                                    </td>


                                    {{-- STATUS --}}

                                    <td>

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

                                    </td>


                                    {{-- TANGGAL --}}

                                    <td>

                                        {{ $pengaduan->created_at->format('d/m/Y') }}

                                    </td>


                                    {{-- AKSI --}}

                                    <td>

                                        <div class="actions">

                                            {{-- DETAIL --}}

                                            <a href="{{ route('pengaduan.show', $pengaduan) }}"
                                               class="btn btn-detail">

                                                Detail

                                            </a>


                                            {{-- EDIT UNTUK ADMIN/PETUGAS --}}

                                            @if (Auth::user()->role !== 'customer')

                                                <a href="{{ route('pengaduan.edit', $pengaduan) }}"
                                                   class="btn btn-edit">

                                                    Edit

                                                </a>

                                            @endif


                                            {{-- HAPUS HANYA ADMIN --}}

                                            @if (Auth::user()->role === 'admin')

                                                <form method="POST"
                                                      action="{{ route('pengaduan.destroy', $pengaduan) }}"
                                                      onsubmit="return confirm('Yakin ingin menghapus pengaduan ini?')">

                                                    @csrf

                                                    @method('DELETE')

                                                    <button type="submit"
                                                            class="btn btn-delete">

                                                        Hapus

                                                    </button>

                                                </form>

                                            @endif

                                        </div>

                                    </td>

                                </tr>


                            @empty

                                <tr>

                                    <td colspan="7"
                                        class="empty">

                                        Belum ada pengaduan.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </main>

    </main>

</div>

</body>

</html>

