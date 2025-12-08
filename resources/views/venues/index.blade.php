@extends('layouts.app') 

@section('content')
    <div class="container py-4">
        
        <h1 class="mb-4 text-primary">Gestor de Sedes (Venues)</h1>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Lista de Sedes</h4>
                <a href="{{ route('venues.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i> Crear Nueva Sede
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
                            <th style="width: 30%;">Nombre</th>
                            <th style="width: 40%;">Dirección</th>
                            <th style="width: 10%;">Capacidad</th>
                            <th style="width: 15%;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($venues as $venue)
                        <tr>
                            <td class="align-middle">{{ $venue->id }}</td>
                            <td class="align-middle">{{ $venue->nombre }}</td>
                            <td class="align-middle">{{ $venue->direccion }}</td>
                            <td class="align-middle">{{ $venue->capacidad ?? 'N/A' }}</td>
                            <td class="align-middle">
                                <a href="{{ route('venues.show', $venue) }}" class="btn btn-info btn-sm text-white me-1">Mostrar</a>
                                
                                </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-3">No hay sedes para mostrar. ¡Crea la primera! 🏟️</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer bg-white border-0">
                <div class="d-flex justify-content-center">
                    {{ $venues->links() }} 
                </div>
            </div>
        </div>
    </div>
@endsection