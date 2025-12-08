@extends('layouts.app') 

@section('content')
    <div class="container py-4">
        
        <h1 class="mb-5 text-primary">Gestor de Eventos</h1>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Lista de Eventos</h4>
                <a href="{{ route('events.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i> Crear Nuevo Evento
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
                            <th style="width: 30%;">Título</th>
                            <th style="width: 20%;">Fecha</th>
                            <th style="width: 20%;">Organizador</th> 
                            <th style="width: 25%;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($eventos as $evento)
                        <tr>
                            <td class="align-middle">{{ $evento->id }}</td>
                            <td class="align-middle">{{ $evento->titulo }}</td>
                            <td class="align-middle">{{ $evento->fecha ? \Carbon\Carbon::parse($evento->fecha)->format('d/m/Y H:i') : 'N/A' }}</td>
                            
                            <td class="align-middle">
                                @if ($evento->organizer)
                                    <a href="{{ route('organizadores.show', $evento->organizer) }}">
                                        {{ $evento->organizer->nombre }}
                                    </a>
                                @else
                                    <span class="text-danger">Organizador Eliminado</span>
                                @endif
                            </td>
                            
                            <td class="align-middle">
                                <a href="{{ route('events.show', $evento) }}" class="btn btn-info btn-sm text-white me-1">Mostrar</a>
                                <a href="{{ route('events.edit', $evento) }}" class="btn btn-warning btn-sm me-1">Editar</a>
                                
                                <form action="{{ route('events.destroy', $evento) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que quieres borrar el evento «{{ $evento->titulo }}»?');">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">No hay eventos para mostrar. ¡Crea el primero desde aquí! 🚀</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer bg-white border-0">
                <div class="d-flex justify-content-center">
                    {{ $eventos->links() }} 
                </div>
            </div>
        </div>
    </div>
@endsection