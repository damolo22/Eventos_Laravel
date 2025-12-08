@extends('layouts.app') 

@section('content')
    <div class="container py-4">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Detalles del Evento</h1>
            <a href="{{ route('events.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i> Volver a Eventos
            </a>
        </div>
        
        <h2 class="mb-4 text-primary">{{ $event->titulo }}</h2>

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 border-end mb-3 mb-md-0">
                        <h4 class="text-secondary mb-3">Detalles del Evento</h4>
                        
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-clock me-3 text-muted"></i>
                            <div>
                                <small class="text-muted d-block">Fecha y Hora</small>
                                <p class="mb-0 fs-5">{{ \Carbon\Carbon::parse($event->fecha)->format('d/m/Y H:i') }}</p>
                                <small class="text-muted">({{ \Carbon\Carbon::parse($event->fecha)->diffForHumans() }})</small>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <i class="fas fa-fingerprint me-3 text-muted"></i>
                            <div>
                                <small class="text-muted d-block">ID Interno</small>
                                <p class="mb-0 text-secondary">{{ $event->id }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h4 class="text-secondary mb-3">Organizador</h4>
                        
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-user-tie me-3 text-muted"></i>
                            <div>
                                <small class="text-muted d-block">Organizado por</small>
                                @if ($event->organizer)
                                    <a href="{{ route('organizadores.show', $event->organizer) }}" class="fs-5 text-success">
                                        **{{ $event->organizer->nombre }}**
                                    </a>
                                @else
                                    <p class="fs-5 text-danger mb-0">Organizador no encontrado/eliminado</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-light">
                <h4 class="mb-0">Descripción</h4>
            </div>
            <div class="card-body">
                <p class="card-text">{{ $event->descripcion }}</p>
            </div>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
            
            <a href="{{ route('events.edit', $event) }}" class="btn btn-warning me-md-2">
                <i class="fas fa-pencil-alt me-1"></i> Editar Evento
            </a>
            
            <form action="{{ route('events.destroy', $event) }}" method="POST" onsubmit="return confirm('¿De verdad quieres eliminar el evento «{{ $event->titulo }}»?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash-alt me-1"></i> Eliminar
                </button>
            </form>
        </div>
        
    </div>
@endsection