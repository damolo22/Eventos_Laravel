@extends('layouts.app')

@section('title', 'Lista de Organizadores')

@section('content')
    <h2>Lista de Organizadores</h2>

    <a href="{{ route('organizadores.create') }}" class="btn btn-success">Crear Nuevo Organizador</a>

    @if ($message = Session::get('success'))
        <div class="alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th width="280px">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($organizadores as $organizadore)
            <tr>
                <td>{{ $organizadore->id }}</td>
                <td>{{ $organizadore->nombre }}</td>
                <td>{{ $organizadore->correo }}</td>
                <td>
                    <form action="{{ route('organizadores.destroy', $organizadore->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('organizadores.show', $organizadore->id) }}">Mostrar</a>
                        <a class="btn btn-warning" href="{{ route('organizadores.edit', $organizadore->id) }}">Editar</a>

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $organizadores->links() }} 

@endsection