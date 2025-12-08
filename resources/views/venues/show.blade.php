@extends('layouts.app') 

@section('content')
    <div class="container py-4">
        
        <a href="{{ route('venues.index') }}" class="btn btn-secondary mb-4">
            Volver a la Lista de Sedes
        </a>

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h1 class="h3 mb-0">Sede: {{ $venue->nombre }}</h1>
            </div>
            <div class="card-body">
                
                <p class="card-text">
                    <strong>ID Interno:</strong> {{ $venue->id }}
                </p>
                <hr>
                
                <h4 class="card-title text-info">Dirección</h4>
                <p class="card-text mb-3">{{ $venue->direccion }}</p>

                <h4 class="card-title text-info">Capacidad Máxima</h4>
                <p class="card-text mb-3">
                    @if ($venue->capacidad)
                        {{ number_format($venue->capacidad, 0, ',', '.') }} personas
                    @else
                        N/A (Sin especificar)
                    @endif
                </p>
                
                <hr>

                <p class="text-muted small">
                    **Creado:** {{ $venue->created_at->format('d/m/Y H:i') }} |
                    **Última Act.:** {{ $venue->updated_at->diffForHumans() }}
                </p>

            </div>

            <div class="card-footer d-flex justify-content-end gap-2">
                <a href="{{ route('venues.edit', $venue) }}" class="btn btn-warning">
                    <i class="fas fa-edit me-1"></i> Editar
                </a>
                
                <form action="{{ route('venues.destroy', $venue) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás 100% seguro de que quieres eliminar esta sede? 😬');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash-alt me-1"></i> Eliminar
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection