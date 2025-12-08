<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    /**
     * READ: Muestra una lista de todos los organizadores (Index)
     */
    public function index()
    {
        $organizadores = Organizer::orderBy('nombre')->paginate(10);
        return view('organizadores.index', compact('organizadores'));
    }

    /**
     * CREATE: Muestra el formulario para crear un nuevo organizador
     */
    public function create()
    {
        return view('organizadores.create');
    }

    /**
     * STORE: Almacena un organizador recién creado en la DB
     */
    public function store(Request $request)
    {
        // Validación básica
        $request->validate([
            'nombre' => 'required|max:100',
            'correo' => 'required|email|unique:organizers,correo',
        ]);

        Organizer::create($request->all());

        return redirect()->route('organizadores.index')
            ->with('success', '¡Organizador creado full!');
    }

    /**
     * READ: Muestra un organizador específico (Show)
     */
    public function show(Organizer $organizadore) 
    {
        return view('organizadores.show', compact('organizadore'));
    }

    /**
     * EDIT: Muestra el formulario para editar un organizador
     */
    public function edit(Organizer $organizadore)
    {
        return view('organizadores.edit', compact('organizadore'));
    }

    /**
     * UPDATE: Actualiza el recurso en la DB
     */
    public function update(Request $request, Organizer $organizadore)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            // unique excluyendo el propio correo
            'correo' => 'required|email|unique:organizers,correo,' . $organizadore->id, 
        ]);

        $organizadore->update($request->all());

        return redirect()->route('organizadores.index')
            ->with('success', '¡Organizador actualizado de locos!');
    }

    /**
     * DELETE: Elimina el recurso de la DB
     */
    public function destroy(Organizer $organizadore)
    {
        $organizadore->delete();

        return redirect()->route('organizadores.index')
            ->with('success', 'Organizador eliminado. RIP.');
    }
}