@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Asistente: {{ $asistente->nombre }}</h2>
    
    <a class="btn btn-primary" href="{{ route('asistentes.index') }}"> Volver</a>
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

    <form action="{{ route('asistentes.update', $asistente->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    {{-- Usa old() para mantener el valor si hay error, sino usa el valor actual del asistente --}}
                    <input type="text" name="nombre" value="{{ old('nombre', $asistente->nombre) }}" class="form-control" placeholder="Nombre">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Correo Electrónico:</strong>
                    {{-- Usa old() para mantener el valor si hay error, sino usa el valor actual del asistente --}}
                    <input type="email" name="correo" value="{{ old('correo', $asistente->correo) }}" class="form-control" placeholder="Correo">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mb-4">
                    <strong>Asignar a Evento:</strong>
                    <select name="event_id" id="event_id" class="form-control">
                        {{-- Opción Nula/Opcional --}}
                        <option value="">-- Selecciona un Evento (Ninguno) --</option>
                        
                        {{-- Iterar sobre todos los eventos --}}
                        @foreach ($events as $event)
                            <option 
                                value="{{ $event->id }}" 
                                {{-- Lógica clave: Verifica si el ID del evento actual es igual al event_id guardado en el asistente, o si se intentó guardar con old() --}}
                                {{ (old('event_id', $asistente->event_id) == $event->id) ? 'selected' : '' }}
                            >
                                {{ $event->titulo }}
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