@extends('layouts.app') 

@section('content')
    <div class="container py-4">
        
        <h2>Crear Nuevo Organizador</h2>
        
        <a href="{{ route('organizadores.index') }}" class="btn btn-secondary mb-3">
            Volver a la Lista de Organizadores
        </a>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Error!</strong> Hay problemas con los datos que quieres registrar:<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('organizadores.store') }}" method="POST">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="nombre">Nombre del Organizador:</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="nombre" 
                            name="nombre" 
                            required 
                            placeholder="Ej: David Moreno"
                            value="{{ old('nombre') }}"
                        >
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="correo">Correo Electrónico:</label>
                        <input 
                            type="email" 
                            class="form-control" 
                            id="correo" 
                            name="correo" 
                            required
                            placeholder="Ej: contacto@organizadora.com"
                            value="{{ old('correo') }}"
                        >
                    </div>

                    <button type="submit" class="btn btn-success mt-3">
                        <i class="fas fa-save me-1"></i> Guardar Organizador
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection