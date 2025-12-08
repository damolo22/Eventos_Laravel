@extends('layouts.app') 

@section('content')
    <div class="container">
        <h2>Editar Evento: **{{ $event->titulo }}**</h2>
        
        <a href="{{ route('events.index') }}" class="btn btn-secondary mb-3">
            Volver a la Lista
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

        <form action="{{ route('events.update', $event) }}" method="POST">
            @csrf
            @method('PUT') 

            <div class="form-group mb-3">
                <label for="titulo">Título del Evento:</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="titulo" 
                    name="titulo" 
                    required 
                    value="{{ old('titulo', $event->titulo) }}"
                >
            </div>
            
            <div class="form-group mb-3">
                <label for="descripcion">Descripción:</label>
                <textarea 
                    class="form-control" 
                    id="descripcion" 
                    name="descripcion" 
                    rows="3"
                >{{ old('descripcion', $event->descripcion) }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label for="fecha">Fecha y Hora:</label>
                @php
                    $fecha_formateada = $event->fecha ? \Carbon\Carbon::parse($event->fecha)->format('Y-m-d\TH:i') : null;
                @endphp
                <input 
                    type="datetime-local" 
                    class="form-control" 
                    id="fecha" 
                    name="fecha" 
                    required 
                    value="{{ old('fecha', $fecha_formateada) }}"
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
                        @php
                            $selected = (old('organizer_id') == $organizador->id) || ($event->organizer_id == $organizador->id);
                        @endphp
                        <option 
                            value="{{ $organizador->id }}"
                            {{ $selected ? 'selected' : '' }}
                        >
                            {{ $organizador->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success mt-3">
                Guardar Cambios
            </button>
        </form>
    </div>
@endsection