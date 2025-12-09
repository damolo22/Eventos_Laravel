@extends('layouts.app') 

@section('content')
    <div class="container py-4">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Detalles del Asistente: **{{ $asistente->nombre }}**</h1>
            <a href="{{ route('asistentes.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i> Volver a la Lista
            </a>
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <div class="row">
                    
                    {{-- Columna 1: Datos de Contacto --}}
                    <div class="col-md-6 border-end">
                        <h4 class="text-primary mb-3">Datos de Contacto</h4>
                        
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-envelope me-3 text-muted"></i>
                            <div>
                                <small class="text-muted d-block">Correo Electrónico</small>
                                <p class="mb-0 fs-5">{{ $asistente->correo }}</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <i class="fas fa-fingerprint me-3 text-muted"></i>
                            <div>
                                <small class="text-muted d-block">ID Interno</small>
                                <p class="mb-0 text-secondary fs-5">{{ $asistente->id }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Columna 2: Metadatos --}}
                    <div class="col-md-6">
                        <h4 class="text-primary mb-3">Metadatos</h4>
                        
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-calendar-plus me-3 text-muted"></i>
                            <div>
                                <small class="text-muted d-block">Creado</small>
                                <p class="mb-0">{{ $asistente->created_at->format('d/m/Y') }}</p>
                                <small class="text-muted">{{ $asistente->created_at->diffForHumans() }}</small>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <i class="fas fa-history me-3 text-muted"></i>
                            <div>
                                <small class="text-muted d-block">Última Actualización</small>
                                <p class="mb-0">{{ $asistente->updated_at->format('d/m/Y') }}</p>
                                <small class="text-muted">{{ $asistente->updated_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-5">
            <a href="{{ route('asistentes.edit', $asistente) }}" class="btn btn-warning me-md-2">
                <i class="fas fa-pencil-alt me-1"></i> Editar Asistente
            </a>
            
            <form action="{{ route('asistentes.destroy', $asistente) }}" method="POST" onsubmit="return confirm('¿De verdad quieres eliminar a {{ $asistente->nombre }}?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash-alt me-1"></i> Eliminar
                </button>
            </form>
        </div>
        

        <div class="card mt-5">
            <div class="card-header bg-light">
                <h3 class="mb-0 text-dark">Asignación de Evento</h3>
            </div>
            <div class="card-body">
                
                {{-- Usamos $asistente->event para acceder al evento relacionado --}}
                @if($asistente->event)
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="fs-4 mb-0 text-success">
                                <i class="fas fa-calendar-check me-2"></i> {{ $asistente->event->titulo }}
                            </p>
                            <small class="text-muted">
                                Fecha: {{ $asistente->event->fecha->format('d/m/Y H:i') }}
                            </small>
                        </div>
                        <a href="{{ route('events.show', $asistente->event) }}" class="btn btn-info">Ver Detalles del Evento</a>
                    </div>
                @else
                    <p class="text-muted mb-0">
                        Este asistente no está asignado a ningún evento actualmente.
                    </p>
                @endif

            </div>
        </div>


    </div>
@endsection