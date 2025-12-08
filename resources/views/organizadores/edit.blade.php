@extends('layouts.app') 

@section('content')
    <div class="container">
        <h2>Editar Organizador: {{ $organizadore->nombre }}</h2>
        
        <a href="{{ route('organizadores.index') }}" class="btn btn-secondary mb-3">
            Volver
        </a>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('organizadores.update', $organizadore) }}" method="POST">
            @csrf
            @method('PUT') 

            <div class="form-group mb-3">
                <label for="nombre">Nombre:</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="nombre" 
                    name="nombre" 
                    required 
                    value="{{ old('nombre', $organizadore->nombre) }}"
                >
            </div>

            <div class="form-group mb-3">
                <label for="correo">Correo Electrónico:</label>
                <input 
                    type="email" 
                    class="form-control" 
                    id="correo" 
                    name="correo" 
                    required 
                    value="{{ old('correo', $organizadore->correo) }}"
                >
            </div>

            <button type="submit" class="btn btn-success mt-3">
                Guardar Cambios
            </button>
        </form>
    </div>
@endsection