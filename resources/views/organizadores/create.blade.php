@extends('layouts.app')

@section('title', 'Crear Organizador')

@section('content')
    <h2>Crear Nuevo Organizador</h2>

    <a href="{{ route('organizadores.index') }}" class="btn btn-primary">Volver a la Lista</a>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 20px;">
            <strong>ERROR!</strong> Hay problemas con tu input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('organizadores.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre de la entidad" required>
        </div>

        <div class="form-group">
            <label for="correo">Correo Electrónico:</label>
            <input type="email" name="correo" id="correo" placeholder="correo@ejemplo.com" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
@endsection