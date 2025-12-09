@extends('layouts.app') 

@section('content')
    <div class="container py-4">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Detalles de : **{{ $organizadore->nombre }}**</h1>
            <a href="{{ route('organizadores.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i> Volver a la Lista
            </a>
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 border-end">
                        <h4 class="text-primary mb-3">Datos de Contacto</h4>
                        
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-envelope me-3 text-muted"></i>
                            <div>
                                <small class="text-muted d-block">Correo Electrónico</small>
                                <p class="mb-0 fs-5">{{ $organizadore->correo }}</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <i class="fas fa-fingerprint me-3 text-muted"></i>
                            <div>
                                <small class="text-muted d-block">ID Interno</small>
                                <p class="mb-0 text-secondary">{{ $organizadore->id }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h4 class="text-primary mb-3">Metadatos</h4>
                        
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-calendar-plus me-3 text-muted"></i>
                            <div>
                                <small class="text-muted d-block">Creado</small>
                                <p class="mb-0">{{ $organizadore->created_at->format('d/m/Y') }}</p>
                                <small class="text-muted">{{ $organizadore->created_at->diffForHumans() }}</small>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <i class="fas fa-history me-3 text-muted"></i>
                            <div>
                                <small class="text-muted d-block">Última Actualización</small>
                                <p class="mb-0">{{ $organizadore->updated_at->format('d/m/Y') }}</p>
                                <small class="text-muted">{{ $organizadore->updated_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            
            <a href="{{ route('organizadores.edit', $organizadore) }}" class="btn btn-warning me-md-2">
                <i class="fas fa-pencil-alt me-1"></i> Editar Organizador
            </a>
            
            <form action="{{ route('organizadores.destroy', $organizadore) }}" method="POST" onsubmit="return confirm('¿De verdad quieres eliminar a {{ $organizadore->nombre }}? Esta acción es irreversible.');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash-alt me-1"></i> Eliminar
                </button>
            </form>
        </div>

        <div class="card mt-5">
            <div class="card-header bg-light">
                <h3 class="mb-0 text-dark">Eventos Organizados</h3>
            </div>
            <div class="card-body p-0">
                
                @if($organizadore->events->count() > 0)
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th style="width: 5%;">ID</th>
                                <th style="width: 50%;">Título</th>
                                <th style="width: 25%;">Fecha</th>
                                <th style="width: 20%;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Bucle para recorrer la relación hasMany --}}
                            @foreach ($organizadore->events as $event)
                                <tr>
                                    <td class="align-middle">{{ $event->id }}</td>
                                    <td class="align-middle">{{ $event->titulo }}</td>
                                    {{-- Usamos format() en la fecha, ya que está casteada a datetime en el modelo --}}
                                    <td class="align-middle">{{ $event->fecha->format('d/m/Y') }}</td>
                                    <td class="align-middle">
                                        <a href="{{ route('events.show', $event) }}" class="btn btn-success btn-sm">Mostrar Evento</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="p-3 text-muted mb-0">
                        Este organizador aún no tiene eventos asignados. ¡Crea uno desde <a href="{{ route('events.create') }}">aquí</a>!
                    </p>
                @endif

            </div>
        </div>

    </div>
@endsection