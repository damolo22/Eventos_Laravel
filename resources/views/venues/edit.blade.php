@extends('layouts.app') 

@section('content')
    <div class="container py-4">
        <h2>Editar Sede: {{ $venue->nombre }}</h2>
        
        <a href="{{ route('venues.index') }}" class="btn btn-secondary mb-3">
            Volver a la Lista de Sedes
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

        <form action="{{ route('venues.update', $venue) }}" method="POST">
            @csrf
            @method('PUT') <div class="form-group mb-3">
                <label for="nombre">Nombre de la Sede:</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="nombre" 
                    name="nombre" 
                    required 
                    value="{{ old('nombre', $venue->nombre) }}"
                >
            </div>
            
            <div class="form-group mb-3">
                <label for="direccion">Dirección Completa:</label>
                <textarea 
                    class="form-control" 
                    id="direccion" 
                    name="direccion" 
                    rows="2"
                    required
                >{{ old('direccion', $venue->direccion) }}</textarea>
            </div>

            <div class="form-group mb-4">
                <label for="capacidad">Capacidad (Máx. personas):</label>
                <input 
                    type="number" 
                    class="form-control" 
                    id="capacidad" 
                    name="capacidad" 
                    min="1"
                    value="{{ old('capacidad', $venue->capacidad) }}"
                >
                <small class="form-text text-muted">Este campo es opcional.</small>
            </div>

            <button type="submit" class="btn btn-primary mt-3">
                Actualizar Sede
            </button>
        </form>
    </div>
@endsection