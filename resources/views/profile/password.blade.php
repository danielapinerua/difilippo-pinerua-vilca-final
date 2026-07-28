<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('storage/logos/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('storage/logos/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('storage/logos/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('storage/logos/site.webmanifest') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Contraseña - E-commerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login/login.css') }}">
</head>
<body>
    <div class="d-flex align-items-center justify-content-center min-vh-100 login-bg px-3">
        <div class="login-container col-12 col-sm-8 col-md-6 col-lg-4">
            <h2 class="text-center mb-4">Cambiar Contraseña</h2>

            <form method="POST" action="{{ route('profile.password.update') }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <input type="password" name="current_password" class="form-control" placeholder="Contraseña Actual" required>
                </div>
                @error('current_password')
                    <p class="error-msg">{{ $message }}</p>
                @enderror

                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Nueva Contraseña" required>
                </div>
                @error('password')
                    <p class="error-msg">{{ $message }}</p>
                @enderror

                <div class="mb-3">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar Nueva Contraseña" required>
                </div>

                <button type="submit" class="btn w-100 login-btn mb-2">Actualizar Contraseña</button>
                <a href="{{ route('profile.index') }}" class="btn w-100 cancel-btn">Volver al Perfil</a>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

