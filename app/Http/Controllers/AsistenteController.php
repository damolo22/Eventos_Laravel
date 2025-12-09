<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asistente;
use App\Models\Event;

class AsistenteController extends Controller
{
/** Muestra una lista de todos los asistentes. */
    public function index()
    {
        $asistentes = Asistente::orderBy('nombre')->get();
        return view('asistentes.index', compact('asistentes'));
    }

    /** Muestra el formulario para crear un nuevo asistente. */
    public function create()
    {
        $events = Event::orderBy('titulo')->get(); 
        return view('asistentes.create', compact('events')); 
    }

    /** Almacena un asistente recién creado en la DB. */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'correo' => 'required|email|unique:asistentes,correo',
            'event_id' => 'nullable|exists:events,id', 
        ]);

        Asistente::create($request->all());

        return redirect()->route('asistentes.index')
        ->with('success', '¡Asistente añadido!');
    }

    /** Muestra los detalles del asistente especificado. */
    public function show(Asistente $asistente)
    {
        return view('asistentes.show', compact('asistente'));
    }

    /** Muestra el formulario para editar el asistente especificado. */
    public function edit(Asistente $asistente)
    {

        $events = Event::orderBy('titulo')->get();

        return view('asistentes.edit', compact('asistente' , 'events'));
    }

    /** Actualiza el asistente especificado en la DB. */
    public function update(Request $request, Asistente $asistente)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'correo' => 'required|email|unique:asistentes,correo,' . $asistente->id,
            'event_id' => 'nullable|exists:events,id', 
        ]);

        $asistente->update($request->all());

        return redirect()->route('asistentes.index')
            ->with('success', 'Asistente actualizado.');
    }

    /** Elimina el asistente de la DB. */
    public function destroy(Asistente $asistente)
    {
        $asistente->delete();

        return redirect()->route('asistentes.index')
            ->with('success', 'Asistente eliminado.');
    }
}
