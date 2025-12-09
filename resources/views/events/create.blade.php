@extends('layouts.app') 

@section('content')
    <div class="container">
        <h2>Crear Nuevo Evento</h2>
        
        <a href="{{ route('events.index') }}" class="btn btn-secondary mb-3">
            Volver a la Lista de Eventos
        </a>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('events.store') }}" method="POST">
            @csrf

            <div class="form-group mb-3">
                <label for="titulo">Título del Evento:</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="titulo" 
                    name="titulo" 
                    required 
                    value="{{ old('titulo') }}"
                >
            </div>
            
            <div class="form-group mb-3">
                <label for="descripcion">Descripción:</label>
                <textarea 
                    class="form-control" 
                    id="descripcion" 
                    name="descripcion" 
                    rows="3"
                >{{ old('descripcion') }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label for="fecha">Fecha y Hora:</label>
                <input 
                    type="datetime-local" 
                    class="form-control" 
                    id="fecha" 
                    name="fecha" 
                    required 
                    value="{{ old('fecha') }}"
                >
            </div>

            <div class="form-group mb-4">
                <label for="organizer_id">Organizador:</label>
                <select 
                    class="form-control" 
                    id="organizer_id" 
                    name="organizer_id" 
                    required
                >
                    <option value="">-- Selecciona un Organizador --</option>
                    @foreach ($organizadores as $organizador)
                        <option 
                            value="{{ $organizador->id }}"
                            {{ old('organizer_id') == $organizador->id ? 'selected' : '' }}
                        >
                            {{ $organizador->nombre }}
                        </option>
                    @endforeach
                </select>
                @if (empty($organizadores) || $organizadores->isEmpty())
                    <small class="text-danger mt-2 d-block">¡Warning! No hay organizadores creados. Crea uno primero.</small>
                @endif
            </div>
            
            <div class="form-group mb-4">
                <label for="venue_id">Sede / Lugar:</label>
                <select 
                    class="form-control" 
                    id="venue_id" 
                    name="venue_id" 
                    required
                >
                    <option value="">-- Selecciona una Sede --</option>
                    @foreach ($venues as $venue)
                        <option 
                            value="{{ $venue->id }}"
                            {{ old('venue_id') == $venue->id ? 'selected' : '' }}
                        >
                            {{ $venue->nombre }} (Capacidad: {{ $venue->capacidad ?? 'N/A' }})
                        </option>
                    @endforeach
                </select>
                @if (empty($venues) || $venues->isEmpty())
                    <small class="text-danger mt-2 d-block">¡Warning! No hay sedes creadas. ¡Crea una primero!</small>
                @endif
            </div>

            
            <button type="submit" class="btn btn-primary mt-3">
                Crear Evento
            </button>
        </form>
    </div>
@endsection