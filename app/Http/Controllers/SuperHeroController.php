<?php

namespace App\Http\Controllers;

use App\Models\Superhero;
use App\Models\Gender;
use App\Models\Universe;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SuperheroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $superheroes = Superhero::all();
        return view('superheroes.index', compact('superheroes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genders = Gender::select('id', 'name')->get();
        $universes = Universe::select('id', 'name')->get();
        return view('superheroes.create', compact('genders', 'universes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'gender_id' => 'required|exists:genders,id',
            'real_name' => 'required|string|max:255',
            'universe_id' => 'required|exists:universes,id',
            'name' => 'required|string|max:255',
            'picture' => 'nullable|string|max:255',
        ]);

        Superhero::create([
            'gender_id' => $request->gender_id,
            'real_name' => $request->real_name,
            'universe_id' => $request->universe_id,
            'name' => $request->name,
            'picture' => $request->picture,
        ]);

        return to_route('superheroes.index')->with('success', 'Superhéroe creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $superhero = Superhero::findOrFail($id);
        return view('superheroes.show', compact('superhero'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $superhero = Superhero::findOrFail($id);
        $genders = Gender::select('id', 'name')->get();
        $universes = Universe::select('id', 'name')->get();
        return view('superheroes.edit', compact('superhero', 'genders', 'universes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'gender_id' => 'required|exists:genders,id',
            'real_name' => 'required|string|max:255',
            'universe_id' => 'required|exists:universes,id',
            'name' => 'required|string|max:255',
            'picture' => 'nullable|string|max:255',
        ]);

        $superhero = Superhero::findOrFail($id);
        $superhero->update([
            'gender_id' => $request->gender_id,
            'real_name' => $request->real_name,
            'universe_id' => $request->universe_id,
            'name' => $request->name,
            'picture' => $request->picture,
        ]);

        return to_route('superheroes.index')->with('success', 'Superhéroe actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $superhero = Superhero::findOrFail($id);
        $superhero->delete();
        return to_route('superheroes.index')->with('success', 'Superhéroe eliminado correctamente.');
    }
}
