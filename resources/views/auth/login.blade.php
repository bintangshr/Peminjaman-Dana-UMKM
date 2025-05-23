
    <style>
        :root {
            --primary: #2E7D32;
            --primary-light: #4CAF50;
            --secondary: #8BC34A;
            --light: #F1F8E9;
            --dark: #1B5E20;
            --text-dark: #333333;
            --text-light: #FFFFFF;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
            --border-radius: 8px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, var(--light), #e8f5e9);
            color: var(--text-dark);
            line-height: 1.6;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            padding: 2.5rem;
            width: 100%;
            max-width: 400px;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h2 {
            color: var(--primary);
            text-align: center;
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
        }

        .logo {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .logo-icon {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .logo-text {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary);
        }

        .input-group {
            margin-bottom: 1.2rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--text-dark);
        }

        input {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            font-size: 1rem;
            transition: var(--transition);
        }

        input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(46, 125, 50, 0.2);
        }

        .error-message {
            color: #d32f2f;
            font-size: 0.85rem;
            display: block;
            margin-top: 0.3rem;
        }

        .btn {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 0.9rem;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-size: 1rem;
            font-weight: 500;
            transition: var(--transition);
            width: 100%;
        }

        .btn:hover {
            background-color: var(--dark);
            transform: translateY(-2px);
        }

        p {
            text-align: center;
            margin-top: 1.5rem;
            color: #666;
        }

        a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }

        a:hover {
            color: var(--dark);
            text-decoration: underline;
        }

        .forgot-password {
            text-align: right;
            margin: -0.5rem 0 1.5rem;
            font-size: 0.9rem;
        }

        .login-divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
        }

        .login-divider span {
            flex: 1;
            height: 1px;
            background-color: #ddd;
        }

        .login-divider p {
            padding: 0 10px;
            color: #777;
            font-size: 0.9rem;
            margin: 0;
        }

        .home-link {
            position: absolute;
            top: 20px;
            left: 20px;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 5px;
            font-weight: 500;
        }

        .home-link:hover {
            color: var(--dark);
        }

        @media (max-width: 480px) {
            .container { padding: 1.5rem; margin: 0 1rem; }
            h2 { font-size: 1.5rem; }
        }
    </style>

    <a href="/" class="home-link">← Kembali ke Beranda</a>

    <div class="container">
        <div class="logo">
            <div class="logo-icon">🌾</div>
            <div class="logo-text">DANA UMKM DESA</div>
        </div>

     <h2>Login Pengguna</h2>

<!-- GLOBAL ERROR -->
@if ($errors->any())
    <div class="error-message" style="text-align: center; margin-bottom: 1rem;">
        {{ $errors->first() }}
    </div>
@endif

<!-- Session Status -->
@if (session('status'))
    <div class="error-message" style="color: green; text-align:center; margin-bottom: 10px;">
        {{ session('status') }}
    </div>
@endif

<form method="POST" action="{{ route('login') }}">

    @csrf

    <div class="input-group">
        <label for="email">Email:</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
        @error('email')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>

    <div class="input-group">
        <label for="password">Password:</label>
        <input id="password" type="password" name="password" required>
        @error('password')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>

    <div class="forgot-password">
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">Lupa password?</a>
        @endif
    </div>

    <button type="submit" class="btn">Login</button>
</form>

        <div class="login-divider">
            <span></span>
            <p>atau</p>
            <span></span>   
        </div>

        <p>Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
    </div>

