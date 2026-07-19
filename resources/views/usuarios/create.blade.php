@extends('welcome')

@section('title', 'Crear Usuario')

@section('content')

<div class="container py-5">
  <h2>Crear Usuario</h2>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('usuarios.store') }}" method="POST">
    @csrf

    <div class="mb-3">
      <label>Nombre</label>
      <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
    </div>

    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control" value="{{ old('email') }}">
    </div>

    <div class="mb-3">
      <label>Password</label>
      <input type="password" name="password" class="form-control">
    </div>

    <div class="mb-3">
  <label>
    <input type="checkbox" name="es_admin">
    Es admin
  </label>
</div>

    <button class="btn btn-primary">Guardar</button>
  </form>

</div>

@endsection