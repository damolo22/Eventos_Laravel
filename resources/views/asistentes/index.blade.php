@extends('layouts.app') 

@section('content')
    <div class="container py-4">
        
        <h1 class="mb-4 text-primary">Lista de Asistentes</h1>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Asistentes Registrados</h4>
                <a href="{{ route('asistentes.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i> Crear Nuevo Asistente
                </a>
            </div>
            
            <div class="card-body p-0">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success m-3">{{ $message }}</div>
                @endif
                
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th style="width: 5%;">ID</th>
                            <th style="width: 35%;">Nombre</th>
                            <th style="width: 35%;">Correo Electrónico</th>
                            <th style="width: 25%;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($asistentes as $asistente)
                        <tr>
                            <td class="align-middle">{{ $asistente->id }}</td>
                            <td class="align-middle">{{ $asistente->nombre }}</td>
                            <td class="align-middle">{{ $asistente->correo }}</td>
                            <td class="align-middle">
                                <form action="{{ route('asistentes.destroy', $asistente) }}" method="POST" style="display:inline;">
                                    <a href="{{ route('asistentes.show', $asistente) }}" class="btn btn-success btn-sm text-white me-1">Mostrar</a>
                                    <a href="{{ route('asistentes.edit', $asistente) }}" class="btn btn-warning btn-sm me-1">Editar</a>
                                    
                                    @csrf
                                    @method('DELETE')
                                    
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que quieres eliminar a este asistente?');">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-3">No hay asistentes para mostrar.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{-- <div class="card-footer bg-white border-0">
                <div class="d-flex justify-content-center">
                    {{ $asistentes->links() }} 
                </div>
            </div> --}}
        </div>
    </div>
@endsection