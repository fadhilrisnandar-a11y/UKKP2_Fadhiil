
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Sistem Pengaduan</title>

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
            background: white;
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

      

        .content {
            padding: 35px;
        }

        .welcome {
            margin-bottom: 30px;
        }

        .welcome h1 {
            font-size: 27px;
            color: #111827;
        }

        .welcome p {
            margin-top: 7px;
            color: #6b7280;
            font-size: 14px;
        }

     

        .cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .card {
            background: white;

            border: 1px solid #e5e7eb;
            border-radius: 12px;

            padding: 22px;

            box-shadow: 0 3px 12px rgba(0, 0, 0, .04);
        }

        .card-title {
            color: #6b7280;
            font-size: 13px;
        }

        .card-number {
            margin-top: 10px;

            font-size: 30px;
            font-weight: bold;

            color: #111827;
        }

        .card-info {
            margin-top: 7px;

            font-size: 12px;
            color: #9ca3af;
        }

       
     

        .section {
            margin-top: 30px;
        }

        .section h3 {
            font-size: 18px;
            margin-bottom: 15px;
            color: #111827;
        }

        .quick-menu {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .quick {
            background: white;

            border: 1px solid #e5e7eb;
            border-radius: 12px;

            padding: 25px;

            text-decoration: none;
            color: #111827;

            transition: 0.2s;
        }

        .quick:hover {
            border-color: #2563eb;
            transform: translateY(-2px);
        }

        .quick h4 {
            font-size: 16px;
        }

        .quick p {
            margin-top: 7px;

            font-size: 13px;
            color: #6b7280;
        }


        @media (max-width: 1100px) {

            .cards {
                grid-template-columns: repeat(2, 1fr);
            }

        }

        @media (max-width: 900px) {

            .content {
                padding: 25px;
            }

        }

        @media (max-width: 650px) {

            .content {
                padding: 20px;
            }

            .navbar {
                padding: 0 20px;
            }

            .navbar h2 {
                font-size: 18px;
            }

            .profile-info {
                display: none;
            }

            .cards,
            .quick-menu {
                grid-template-columns: 1fr;
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
                    Dashboard
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
            <div class="content">

                {{-- WELCOME --}}
                <div class="welcome">

                    <h1>
                        Selamat Datang, {{ Auth::user()->name }}!
                    </h1>

                    <p>
                        Kelola sistem pengaduan dengan mudah melalui dashboard.
                    </p>

                </div>


                {{-- STATISTICS --}}
                <div class="cards">

                  


                    {{-- TOTAL PENGADUAN --}}
                    <div class="card">

                        <div class="card-title">
                            Total Pengaduan
                        </div>

                        <div class="card-number">
                            {{ $totalPengaduan }}
                        </div>

                        <div class="card-info">
                            Semua pengaduan
                        </div>

                    </div>


                    {{-- MENUNGGU --}}
                    <div class="card">

                        <div class="card-title">
                            Menunggu
                        </div>

                        <div class="card-number">
                            {{ $menunggu }}
                        </div>

                        <div class="card-info">
                            Belum diproses
                        </div>

                    </div>


                    {{-- SELESAI --}}
                    <div class="card">

                        <div class="card-title">
                            Selesai
                        </div>

                        <div class="card-number">
                            {{ $selesai }}
                        </div>

                        <div class="card-info">
                            Pengaduan selesai
                        </div>

                    </div>

                </div>


                {{-- QUICK MENU --}}
                <div class="section">

                    <h3>
                        Akses Cepat
                    </h3>

                    <div class="quick-menu">

                        {{-- DATA USER --}}
                        @if (Auth::user()->role === 'admin' || Auth::user()->role === 'petugas')

                            <a href="{{ route('users.index') }}" class="quick">

                                <h4>
                                    Data User
                                </h4>

                                <p>
                                    Kelola data pengguna sistem.
                                </p>

                            </a>

                        @endif


                        {{-- DATA PENGADUAN --}}
                        <a href="{{ route('pengaduan.index') }}" class="quick">

                            <h4>
                                Data Pengaduan
                            </h4>

                            <p>
                                Lihat dan kelola pengaduan pelanggan.
                            </p>

                        </a>

                    </div>

                </div>

            </div>

        </main>

    </div>

</body>

</html>