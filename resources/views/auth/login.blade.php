<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Masjid An Nahl</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }
        
        .login-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
            max-width: 900px;
            width: 100%;
        }
        
        .login-left {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 3rem;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            min-height: 500px;
        }
        
        .login-right {
            padding: 3rem;
        }
        
        .logo-circle {
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 2rem;
        }
        
        .logo-circle img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 50%;
        }
        
        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 12px;
            font-weight: 600;
            color: white;
            border-radius: 8px;
            transition: transform 0.2s;
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.4);
        }
        
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        
        .back-home {
            color: white;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 2rem;
            transition: transform 0.2s;
        }
        
        .back-home:hover {
            color: white;
            transform: translateX(-5px);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-card row g-0">
            <!-- Left Side -->
            <div class="col-lg-5 d-none d-lg-block">
                <div class="login-left">
                    <div class="logo-circle">
                        <img src="https://i.ibb.co/3mzvYQXH/Desain-tanpa-judul-removebg-preview.png" alt="Logo">
                    </div>
                    <h2 class="fw-bold mb-3">Selamat Datang!</h2>
                    <p class="mb-4">Silakan login untuk mengakses dashboard admin Masjid An Nahl</p>
                    
                    <div class="mt-auto">
                        <i class="bi bi-mosque fs-1 opacity-50"></i>
                        <p class="mt-3 opacity-75">Masjid An Nahl<br>Al Mubarokah</p>
                    </div>
                    
                    <a href="{{ route('home') }}" class="back-home">
                        <i class="bi bi-arrow-left"></i>
                        Kembali ke Website
                    </a>
                </div>
            </div>
            
            <!-- Right Side - Login Form -->
            <div class="col-lg-7">
                <div class="login-right">
                    <div class="text-center mb-4 d-lg-none">
                        <img src="https://i.ibb.co/3mzvYQXH/Desain-tanpa-judul-removebg-preview.png" 
                             alt="Logo" 
                             style="width: 60px; height: 60px; border-radius: 50%;">
                    </div>
                    
                    <h3 class="fw-bold mb-2">Login Admin</h3>
                    <p class="text-muted mb-4">Masukkan email dan password Anda</p>
                    
                    <!-- Session Status -->
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    
                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       id="email" 
                                       name="email" 
                                       value="{{ old('email') }}" 
                                       placeholder="admin@masjid.com"
                                       required 
                                       autofocus>
                            </div>
                            @error('email')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input type="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       id="password" 
                                       name="password" 
                                       placeholder="Masukkan password"
                                       required>
                            </div>
                            @error('password')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Remember Me -->
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">
                                Ingat saya
                            </label>
                        </div>
                        
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-login w-100 mb-3">
                            <i class="bi bi-box-arrow-in-right me-2"></i>
                            Login
                        </button>
                        
                        <!-- Forgot Password -->
                        @if (Route::has('password.request'))
                            <div class="text-center">
                                <a href="{{ route('password.request') }}" class="text-decoration-none">
                                    Lupa password?
                                </a>
                            </div>
                        @endif
                    </form>
                    
                    <!-- Demo Credentials Info -->
                    <div class="alert alert-info mt-4 mb-0">
                        <small>
                            <strong>Demo Login:</strong><br>
                            Email: <code>admin@masjid.com</code><br>
                            Password: <code>password123</code>
                        </small>
                    </div>
                    
                    <!-- Back to Home (Mobile) -->
                    <div class="text-center mt-3 d-lg-none">
                        <a href="{{ route('home') }}" class="text-decoration-none">
                            <i class="bi bi-arrow-left"></i> Kembali ke Website
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>