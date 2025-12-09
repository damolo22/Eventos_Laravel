@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Nuevo Asistente</h2>
    
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

    <form action="{{ route('asistentes.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre del asistente" value="{{ old('nombre') }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Correo Electrónico:</strong>
                    <input type="email" name="correo" class="form-control" placeholder="Correo del asistente" value="{{ old('correo') }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mb-4">
                    <strong>Asignar a Evento:</strong>
                    <select name="event_id" id="event_id" class="form-control">
                        <option value="">-- Selecciona un Evento (Ninguno/Opcional) --</option>
                        {{-- Asegúrate de que tu controlador pasa la variable $events --}}
                        @foreach ($events as $event)
                            <option value="{{ $event->id }}" {{ old('event_id') == $event->id ? 'selected' : '' }}>
                                {{ $event->titulo }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Crear Asistente</button>
            </div>
        </div>
    </form>
</div>
@endsection