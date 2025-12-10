@extends('layouts.app') 

@section('content')
    <div class="container py-4">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Detalles del Evento: {{ $event->titulo }}</h1>
            <a href="{{ route('events.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i> Volver a Eventos
            </a>
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <div class="row">
                    
                    <div class="col-md-4 border-end">
                        <h4 class="text-primary mb-3">Detalles Clave</h4>
                        
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-calendar-alt me-3 text-muted"></i>
                            <div>
                                <small class="text-muted d-block">Fecha y Hora</small>
                                <p class="mb-0 fs-5">{{ $event->fecha->format('d/m/Y H:i') }}</p>
                                <small class="text-muted">{{ $event->fecha->diffForHumans() }}</small>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <i class="fas fa-fingerprint me-3 text-muted"></i>
                            <div>
                                <small class="text-muted d-block">ID Interno</small>
                                <p class="mb-0 text-secondary fs-5">{{ $event->id }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 border-end">
                        <h4 class="text-primary mb-3">Organizador</h4>
                        
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-user-tie me-3 text-muted"></i>
                            <div>
                                <small class="text-muted d-block">Organizado por</small>
                                <p class="mb-0 fs-5">
                                    <a href="{{ route('organizadores.show', $event->organizer) }}" class="text-decoration-none">
                                        {{ $event->organizer->nombre }}
                                    </a>
                                </p>
                                <small class="text-muted">{{ $event->organizer->correo }}</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <h4 class="text-primary mb-3">Sede / Ubicación</h4>
                        
                        @if($event->venue)
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-map-marker-alt me-3 text-muted"></i>
                                <div>
                                    <small class="text-muted d-block">Nombre de la Sede</small>
                                    <p class="mb-0 fs-5">
                                        <a href="{{ route('venues.show', $event->venue) }}" class="text-decoration-none">
                                            {{ $event->venue->nombre }}
                                        </a>
                                    </p>
                                    <small class="text-muted">Capacidad: {{ number_format($event->venue->capacidad, 0, ',', '.') }}</small>
                                </div>
                            </div>
                        @else
                            <p class="text-muted">Sede no asignada.</p>
                        @endif
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-header bg-light">
                <h4 class="mb-0">Descripción</h4>
            </div>
            <div class="card-body">
                <p class="mb-0">{{ $event->descripcion }}</p>
            </div>
        </div>
        
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-5">
            <a href="{{ route('events.edit', $event) }}" class="btn btn-warning me-md-2">
                <i class="fas fa-pencil-alt me-1"></i> Editar Evento
            </a>
            
            <form action="{{ route('events.destroy', $event) }}" method="POST" onsubmit="return confirm('¿De verdad quieres eliminar este evento?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash-alt me-1"></i> Eliminar
                </button>
            </form>
        </div>
        
        <div class="card mt-5">
            <div class="card-header bg-light">
                <h3 class="mb-0 text-dark">Asistentes Registrados</h3>
            </div>
            <div class="card-body p-0">
                
                @if($event->asistentes->count() > 0)
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th style="width: 10%;">ID</th>
                                <th style="width: 40%;">Nombre del Asistente</th>
                                <th style="width: 30%;">Correo Electrónico</th>
                                <th style="width: 20%;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($event->asistentes as $asistente)
                                <tr>
                                    <td class="align-middle">{{ $asistente->id }}</td>
                                    <td class="align-middle">{{ $asistente->nombre }}</td>
                                    <td class="align-middle">{{ $asistente->correo }}</td>
                                    <td class="align-middle">
                                        <a href="{{ route('asistentes.show', $asistente) }}" class="btn btn-success btn-sm">Mostrar Asistente</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="p-3 text-muted mb-0">
                        ¡Este evento aún no tiene asistentes registrados!
                    </p>
                @endif

            </div>
        </div>

    </div>
@endsection