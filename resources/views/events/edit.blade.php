@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Evento: {{ $event->titulo }}</h2>
    
    <a class="btn btn-primary" href="{{ route('events.index') }}"> Volver</a>
    <br><br>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> Hay problemas con la info que subiste.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('events.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                <div class="form-group">
                    <strong>Título del Evento:</strong>
                    <input type="text" name="titulo" value="{{ old('titulo', $event->titulo) }}" class="form-control" placeholder="Título">
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                <div class="form-group">
                    <strong>Descripción:</strong>
                    <textarea class="form-control" style="height:150px" name="descripcion" placeholder="Descripción">{{ old('descripcion', $event->descripcion) }}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 mb-3">
                <div class="form-group">
                    <strong>Fecha y Hora:</strong>
                    @php
                        $datetimeValue = old('fecha', $event->fecha ? $event->fecha->format('Y-m-d\TH:i') : '');
                    @endphp
                    <input type="datetime-local" name="fecha" value="{{ $datetimeValue }}" class="form-control">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 mb-3">
                <div class="form-group">
                    <strong>Organizador:</strong>
                    <select name="organizer_id" class="form-control">
                        <option value="">-- Selecciona un Organizador --</option>
                        @foreach ($organizadores as $organizador)
                            <option value="{{ $organizador->id }}" 
                                {{ (old('organizer_id', $event->organizer_id) == $organizador->id) ? 'selected' : '' }}>
                                {{ $organizador->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 mb-4">
                <div class="form-group">
                    <strong>Sede (Venue):</strong>
                    <select name="venue_id" class="form-control">
                        <option value="">-- Selecciona una Sede --</option>
                        @foreach ($venues as $venue)
                            <option value="{{ $venue->id }}" 
                                {{ (old('venue_id', $event->venue_id) == $venue->id) ? 'selected' : '' }}>
                                {{ $venue->nombre }} (Capacidad: {{ number_format($venue->capacidad, 0, ',', '.') }})
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Guardar Cambios</button>
            </div>
        </div>
    </form>
</div>
@endsection