@extends('layouts.layout')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/login/login.css') }}">
@endpush

@section('title', 'Cambiar Contraseña - E-commerce')

@section('content')

<div class="d-flex align-items-center justify-content-center min-vh-100 login-bg px-3">

    <div class="login-container col-12 col-sm-8 col-md-6 col-lg-4">

        <h2 class="text-center mb-4">Cambiar Contraseña</h2>

        <form method="POST" action="{{ route('profile.password.update') }}">
            @csrf
            @method('PUT')


            <div class="mb-3">
                <input 
                    type="password" 
                    name="current_password" 
                    class="form-control" 
                    placeholder="Contraseña Actual" 
                    required>
            </div>

            @error('current_password')
                <p class="error-msg">{{ $message }}</p>
            @enderror


            <div class="mb-3">
                <input 
                    type="password" 
                    name="password" 
                    class="form-control" 
                    placeholder="Nueva Contraseña" 
                    required>
            </div>

            @error('password')
                <p class="error-msg">{{ $message }}</p>
            @enderror


            <div class="mb-3">
                <input 
                    type="password" 
                    name="password_confirmation" 
                    class="form-control" 
                    placeholder="Confirmar Nueva Contraseña" 
                    required>
            </div>


            <button type="submit" class="btn w-100 login-btn mb-2">
                Actualizar Contraseña
            </button>

            <a href="{{ route('profile.index') }}" class="btn w-100 cancel-btn">
                Volver al Perfil
            </a>

        </form>

    </div>

</div>

@endsection

