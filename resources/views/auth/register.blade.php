<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('storage/logos/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('storage/logos/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('storage/logos/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('storage/logos/site.webmanifest') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - E-commerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login/login.css') }}">
</head>
<body>
    <div class="d-flex align-items-center justify-content-center min-vh-100 login-bg px-3">
        <div class="login-container col-12 col-sm-8 col-md-6 col-lg-4">
            <h2 class="text-center mb-4">Registro</h2>

            <form method="POST" action="{{ route('register.post') }}">
                @csrf

                <div class="mb-3">
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="{{ old('nombre') }}" required>
                </div>
                @error('nombre')
                    <p class="error-msg">{{ $message }}</p>
                @enderror

                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                </div>
                @error('email')
                    <p class="error-msg">{{ $message }}</p>
                @enderror

                <div class="mb-3">
                    <input type="text" name="address" class="form-control" placeholder="Dirección" value="{{ old('address') }}" required>
                </div>
                @error('address')
                    <p class="error-msg">{{ $message }}</p>
                @enderror

                <div class="mb-3">
                    <input type="text" name="city" class="form-control" placeholder="Ciudad" value="{{ old('city') }}" required>
                </div>
                @error('city')
                    <p class="error-msg">{{ $message }}</p>
                @enderror

                <div class="mb-3">
                    <input type="text" name="province" class="form-control" placeholder="Provincia" value="{{ old('province') }}" required>
                </div>
                @error('province')
                    <p class="error-msg">{{ $message }}</p>
                @enderror

                <div class="mb-3">
                    <input type="text" name="postal_code" class="form-control" placeholder="Código Postal" value="{{ old('postal_code') }}" required>
                </div>
                @error('postal_code')
                    <p class="error-msg">{{ $message }}</p>
                @enderror

                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                </div>
                @error('password')
                    <p class="error-msg">{{ $message }}</p>
                @enderror

                <div class="mb-3">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar Contraseña" required>
                </div>

                <button type="submit" class="btn w-100 login-btn mb-2">Registrarse</button>

                <a href="{{ route('login') }}" class="btn w-100 cancel-btn mb-2">Ya tengo cuenta</a>

                <a href="{{ route('home') }}" class="btn w-100 cancel-btn">Cancelar</a>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
