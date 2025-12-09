@extends('layouts.app')

@section('content')
    <div class="container py-4">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Detalles de la Sede: **{{ $venue->nombre }}**</h1>
            <a href="{{ route('venues.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i> Volver a la Lista
            </a>
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <div class="row">
                    
                    {{-- Columna 1: Datos Físicos --}}
                    <div class="col-md-6 border-end">
                        <h4 class="text-primary mb-3">Ubicación y Capacidad</h4>
                        
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-map-marker-alt me-3 text-muted"></i>
                            <div>
                                <small class="text-muted d-block">Dirección</small>
                                <p class="mb-0 fs-5">{{ $venue->direccion }}</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <i class="fas fa-users me-3 text-muted"></i>
                            <div>
                                <small class="text-muted d-block">Capacidad Máxima</small>
                                <p class="mb-0 text-secondary fs-5">{{ number_format($venue->capacidad, 0, ',', '.') }} personas</p>
                            </div>
                        </div>
                    </div>

                    {{-- Columna 2: Metadatos --}}
                    <div class="col-md-6">
                        <h4 class="text-primary mb-3">Metadatos</h4>
                        
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-fingerprint me-3 text-muted"></i>
                            <div>
                                <small class="text-muted d-block">ID Interno</small>
                                <p class="mb-0 text-secondary">{{ $venue->id }}</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-calendar-plus me-3 text-muted"></i>
                            <div>
                                <small class="text-muted d-block">Creado</small>
                                <p class="mb-0">{{ $venue->created_at->format('d/m/Y') }}</p>
                                <small class="text-muted">{{ $venue->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center">
                            <i class="fas fa-history me-3 text-muted"></i>
                            <div>
                                <small class="text-muted d-block">Última Actualización</small>
                                <p class="mb-0">{{ $venue->updated_at->format('d/m/Y') }}</p>
                                <small class="text-muted">{{ $venue->updated_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-5">
            <a href="{{ route('venues.edit', $venue) }}" class="btn btn-warning me-md-2">
                <i class="fas fa-pencil-alt me-1"></i> Editar Sede
            </a>
            
            <form action="{{ route('venues.destroy', $venue) }}" method="POST" onsubmit="return confirm('¿De verdad quieres eliminar esta sede?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash-alt me-1"></i> Eliminar
                </button>
            </form>
        </div>
        
        <div class="card mt-5">
            <div class="card-header bg-light">
                <h3 class="mb-0 text-dark">Eventos Realizados en esta Sede</h3>
            </div>
            <div class="card-body p-0">
                
                {{-- Verificamos si la sede tiene eventos relacionados --}}
                @if($venue->events->count() > 0)
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th style="width: 5%;">ID</th>
                                <th style="width: 50%;">Título del Evento</th>
                                <th style="width: 25%;">Fecha</th>
                                <th style="width: 20%;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Recorremos la relación hasMany (Un Venue tiene muchos Events) --}}
                            @foreach ($venue->events as $event)
                                <tr>
                                    <td class="align-middle">{{ $event->id }}</td>
                                    <td class="align-middle">{{ $event->titulo }}</td>
                                    <td class="align-middle">{{ $event->fecha->format('d/m/Y') }}</td>
                                    <td class="align-middle">
                                        <a href="{{ route('events.show', $event) }}" class="btn btn-info btn-sm">Mostrar Evento</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="p-3 text-muted mb-0">
                        Aún no hay eventos registrados para realizarse en esta sede.
                    </p>
                @endif

            </div>
        </div>

    </div>
@endsection