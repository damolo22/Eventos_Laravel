@extends('layouts.app') 

@section('content')
    <div class="container text-center py-5">
        <h1 class="display-4 mb-4">
            Bienvenido al Gestor de Eventos 
        </h1>
        <p class="lead">
            Aquí tienes un resumen rápido de lo que puedes gestionar:
        </p>

        <div class="row justify-content-center mt-5">
            <div class="col-md-3 mb-3">
                <a href="{{ route('events.index') }}" class="card text-decoration-none shadow-sm p-4 h-100">
                    <h3><i class="fas fa-calendar-alt text-success"></i> Eventos</h3>
                    <p class="text-muted">Gestiona todos los eventos programados.</p>
                </a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="{{ route('asistentes.index') }}" class="card text-decoration-none shadow-sm p-4 h-100">
                    <h3><i class="fas fa-users text-primary"></i> Asistentes</h3>
                    <p class="text-muted">Crea y gestiona a las personas registradas.</p>
                </a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="{{ route('organizadores.index') }}" class="card text-decoration-none shadow-sm p-4 h-100">
                    <h3><i class="fas fa-user-tie text-warning"></i> Organizadores</h3>
                    <p class="text-muted">Administra quién organiza cada evento.</p>
                </a>
            </div>
        </div>
    </div>
@endsection