<?php

namespace App\Http\Controllers;
use App\Models\Venue;

use Illuminate\Http\Request;

class VenueController extends Controller
{
    /**
     * Muestra la lista de todas las sedes.
     */
    public function index()
    {
        $venues = Venue::orderBy('nombre')->paginate(10); 
        
        return view('venues.index', compact('venues'));
    }

    /**
     * Muestra el formulario para crear una nueva sede.
     */
    public function create()
    {
        return view('venues.create');
    }

    /**
     * Almacena una sede recién creada en la BD.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'    => 'required|max:255',
            'direccion' => 'required',
            'capacidad' => 'nullable|integer|min:1', 
        ]);

        Venue::create($request->all());

        return redirect()->route('venues.index')
        ->with('success', 'Sede creada con éxito.');
    }

    /**
     * Muestra los detalles de una sede específica.
     */
    public function show(Venue $venue)
    {
        return view('venues.show', compact('venue'));
    }

    /**
     * Muestra el formulario para editar una sede.
     */
    public function edit(Venue $venue)
    {
        return view('venues.edit', compact('venue'));
    }

    /**
     * Actualiza la sede en la BD.
     */
    public function update(Request $request, Venue $venue)
    {
        $request->validate([
            'nombre'    => 'required|max:255',
            'direccion' => 'required',
            'capacidad' => 'nullable|integer|min:1', 
        ]);
        
        $venue->update($request->all());

        return redirect()->route('venues.index')
        ->with('success', 'Sede actualizada correctamente. 💾');
    }

    /**
     * Elimina una sede de la BD.
     */
    public function destroy(Venue $venue)
    {
        $venue->delete();

        return redirect()->route('venues.index')
        ->with('success', 'Sede eliminada.');
    }
}
