
<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register - Sistem Pengaduan</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f9;
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #1f2937;
        }

        .register-container {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
        }

        .header h1 {
            font-size: 25px;
            color: #111827;
        }

        .header p {
            margin-top: 7px;
            color: #6b7280;
            font-size: 14px;
        }

        .register-card {
            background: white;

            border: 1px solid #e5e7eb;
            border-radius: 14px;

            padding: 30px;

            box-shadow: 0 5px 20px rgba(0, 0, 0, .05);
        }

        .register-card h2 {
            font-size: 20px;
            color: #111827;

            margin-bottom: 6px;
        }

        .register-card .subtitle {
            font-size: 13px;
            color: #6b7280;

            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;

            font-size: 13px;
            font-weight: 600;

            color: #374151;

            margin-bottom: 7px;
        }

        .form-group input {
            width: 100%;

            padding: 12px 13px;

            border: 1px solid #d1d5db;
            border-radius: 8px;

            font-size: 14px;

            outline: none;

            transition: .2s;
        }

        .form-group input:focus {
            border-color: #2563eb;

            box-shadow: 0 0 0 3px rgba(37, 99, 235, .1);
        }

        .form-group input::placeholder {
            color: #9ca3af;
        }

        .error {
            color: #dc2626;

            font-size: 12px;

            margin-top: 5px;
        }

        .btn-register {
            width: 100%;

            border: none;

            background: #2563eb;
            color: white;

            padding: 12px;

            border-radius: 8px;

            font-size: 14px;
            font-weight: 600;

            cursor: pointer;

            transition: .2s;
        }

        .btn-register:hover {
            background: #1d4ed8;
        }

        .login-link {
            text-align: center;

            margin-top: 20px;

            font-size: 13px;

            color: #6b7280;
        }

        .login-link a {
            color: #2563eb;

            text-decoration: none;

            font-weight: 600;
        }

        .login-link a:hover {
            color: #1d4ed8;
        }

        .footer {
            text-align: center;

            margin-top: 20px;

            font-size: 12px;

            color: #9ca3af;
        }

        @media (max-width: 480px) {

            .register-container {
                padding: 15px;
            }

            .register-card {
                padding: 25px 20px;
            }

            .header h1 {
                font-size: 22px;
            }

        }

    </style>

</head>

<body>

    <div class="register-container">

        <div class="header">

            <h1>
                Sistem Pengaduan
            </h1>

            <p>
                Layanan pengaduan pelanggan
            </p>

        </div>


        <div class="register-card">

            <h2>
                Daftar Akun
            </h2>

            <p class="subtitle">
                Buat akun untuk menggunakan sistem pengaduan
            </p>


            <form method="POST" action="{{ route('register') }}">

                @csrf


                <div class="form-group">

                    <label for="name">
                        Nama
                    </label>

                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Masukkan nama"
                        required
                        autofocus
                        autocomplete="name"
                    >

                    @error('name')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <div class="form-group">

                    <label for="email">
                        Email
                    </label>

                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Masukkan email"
                        required
                        autocomplete="username"
                    >

                    @error('email')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <input
                        id="password"
                        type="password"
                        name="password"
                        placeholder="Masukkan password"
                        required
                        autocomplete="new-password"
                    >

                    @error('password')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <div class="form-group">

                    <label for="password_confirmation">
                        Konfirmasi Password
                    </label>

                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        placeholder="Ulangi password"
                        required
                        autocomplete="new-password"
                    >

                    @error('password_confirmation')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <button
                    type="submit"
                    class="btn-register"
                >
                    Daftar
                </button>

            </form>


            <div class="login-link">

                Sudah punya akun?

                <a href="{{ route('login') }}">
                    Login
                </a>

            </div>

        </div>


        <div class="footer">

            &copy; {{ date('Y') }} Sistem Pengaduan

        </div>

    </div>

</body>

</html>

