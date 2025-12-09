<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Organizer; 
use App\Models\Venue;
use Illuminate\Http\Request;
use App\Models\Asistente;

class EventController extends Controller
{
    /**
     * READ: Muestra una lista de todos los eventos (Index)
     */
    public function index()
    {
        $eventos = Event::with('organizer')->orderBy('fecha', 'desc')->paginate(10);
        
        return view('events.index', compact('eventos'));
    }

    /**
     * CREATE: Muestra el formulario para crear un nuevo evento
     */
    public function create()
    {
        $organizadores = Organizer::orderBy('nombre')->get();
        $venues = Venue::orderBy('nombre')->get();
        return view('events.create', compact('organizadores', 'venues'));
    }

    /**
     * STORE: Almacena un evento recién creado en la DB
     */
    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'nullable',
            'fecha' => 'required|date',
            'organizer_id' => 'required|exists:organizers,id',
        ]);

        Event::create($request->all());

        return redirect()->route('events.index')
             ->with('success', '¡Evento creado!');
    }

    /**
     * READ: Muestra un evento específico (Show)
     */
    public function show(Event $event) 
    {
        return view('events.show', compact('event'));
    }

    /**
     * EDIT: Muestra el formulario para editar un evento
     */
    public function edit(Event $event)
    {
       $organizadores = Organizer::orderBy('nombre')->get();
        $venues = Venue::orderBy('nombre')->get();

    return view('events.edit', compact('event', 'organizadores', 'venues'));
    }

    /**
     * UPDATE: Actualiza el recurso en la DB
     */
    public function update(Request $request, Event $event)
    {
        // Validación
        $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'nullable',
            'fecha' => 'required|date',
            'organizer_id' => 'required|exists:organizers,id', 
        ]);

        $event->update($request->all());

        return redirect()->route('events.index')
            ->with('success', '¡Evento actualizado *full*!');
    }

    /**
     * DELETE: Elimina el recurso de la DB
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')
            ->with('success', 'Evento eliminado. Adiós.');
    }

}