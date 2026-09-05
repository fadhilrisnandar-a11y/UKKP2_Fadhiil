<!DOCTYPE html>

<html lang="id">

<head>


<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login - Sistem Pengaduan</title>

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

    .login-container {
        width: 100%;
        max-width: 420px;
        padding: 20px;
    }

    /* HEADER */

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

    /* LOGIN CARD */

    .login-card {
        background: white;

        border: 1px solid #e5e7eb;
        border-radius: 14px;

        padding: 30px;

        box-shadow: 0 5px 20px rgba(0, 0, 0, .05);
    }

    .login-card h2 {
        font-size: 20px;
        color: #111827;

        margin-bottom: 6px;
    }

    .login-card .subtitle {
        font-size: 13px;
        color: #6b7280;

        margin-bottom: 25px;
    }

    /* FORM */

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

    /* REMEMBER */

    .remember {
        display: flex;
        align-items: center;
        gap: 8px;

        margin-bottom: 20px;

        font-size: 13px;
        color: #6b7280;
    }

    .remember input {
        width: 15px;
        height: 15px;

        accent-color: #2563eb;
    }

    /* LOGIN BUTTON */

    .btn-login {
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

    .btn-login:hover {
        background: #1d4ed8;
    }

    /* ALERT */

    .alert {
        background: #fee2e2;
        color: #b91c1c;

        border: 1px solid #fecaca;

        border-radius: 8px;

        padding: 11px 13px;

        margin-bottom: 20px;

        font-size: 13px;
    }

    .error {
        color: #dc2626;

        font-size: 12px;

        margin-top: 5px;
    }

    /* REGISTER */

    .register-section {
        text-align: center;

        margin-top: 20px;
        padding-top: 20px;

        border-top: 1px solid #e5e7eb;
    }

    .register-text {
        font-size: 13px;
        color: #6b7280;

        margin-bottom: 8px;
    }

    .register-link {
        color: #2563eb;

        font-size: 13px;

        font-weight: 600;

        text-decoration: none;
    }

    .register-link:hover {
        color: #1d4ed8;
        text-decoration: underline;
    }

    /* FOOTER */

    .footer {
        text-align: center;

        margin-top: 20px;

        font-size: 12px;

        color: #9ca3af;
    }

    /* RESPONSIVE */

    @media (max-width: 480px) {

        .login-container {
            padding: 15px;
        }

        .login-card {
            padding: 25px 20px;
        }

        .header h1 {
            font-size: 22px;
        }

    }

</style>


</head>

<body>

<div class="login-container">

    {{-- HEADER --}}

    <div class="header">

        <h1>
            Sistem Pengaduan
        </h1>

        <p>
            Layanan pengaduan pelanggan
        </p>

    </div>


    {{-- LOGIN CARD --}}

    <div class="login-card">

        <h2>
            Login
        </h2>

        <p class="subtitle">
            Silakan masuk untuk melanjutkan
        </p>


        {{-- ERROR LOGIN --}}

        @if ($errors->any())

            <div class="alert">

                Email atau password yang Anda masukkan salah.

            </div>

        @endif


        {{-- SESSION MESSAGE --}}

        @if (session('status'))

            <div
                class="alert"
                style="
                    background:#dcfce7;
                    color:#166534;
                    border-color:#bbf7d0;
                "
            >

                {{ session('status') }}

            </div>

        @endif


        {{-- FORM LOGIN --}}

        <form method="POST" action="{{ route('login') }}">

            @csrf


            {{-- EMAIL --}}

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
                    autofocus
                    autocomplete="username"
                >

                @error('email')

                    <div class="error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- PASSWORD --}}

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
                    autocomplete="current-password"
                >

                @error('password')

                    <div class="error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- REMEMBER --}}

            <label class="remember">

                <input
                    type="checkbox"
                    name="remember"
                >

                Ingat saya

            </label>


            {{-- LOGIN BUTTON --}}

            <button
                type="submit"
                class="btn-login"
            >

                Masuk

            </button>

        </form>


        {{-- REGISTER --}}

        <div class="register-section">

            <p class="register-text">
                Belum punya akun?
            </p>

            <a
                href="{{ route('register') }}"
                class="register-link"
            >

                Daftar sekarang

            </a>

        </div>

    </div>


    {{-- FOOTER --}}

    <div class="footer">

        &copy; {{ date('Y') }} Sistem Pengaduan

    </div>

</div>


</body>

</html>
