<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use Illuminate\Http\Request;

class MesaController extends Controller
{
    public function index()
    {
        $mesas = Mesa::all();
        return view('mesas.index', compact('mesas'));
    }

    public function create()
    {
        return view('mesas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'numero' => 'required|integer|unique:mesas,numero',
            'capacidade' => 'required|integer',
            'status' => 'required|string|max:255',
        ], [
            'numero.unique' => 'Já existe uma mesa com esse número.',
        ]);

        Mesa::create($validated);

        return redirect()->route('mesas.index')->with('success', 'Mesa ' .$request->numero. ' cadastrada com sucesso!');
    }

    public function edit(Mesa $mesa)
    {
        return view('mesas.edit', compact('mesa'));
    }

    public function update(Request $request, Mesa $mesa)
    {
        $validated = $request->validate([
            'numero' => 'required|integer|unique:mesas,numero,' . $mesa->id,
            'capacidade' => 'required|integer',
            'status' => 'required|string|max:255',
        ], [
            'numero.unique' => 'Já existe uma mesa com esse número.',
        ]);

        $mesa->update($validated);

        return redirect()->route('mesas.index')->with('success', 'Mesa ' .$mesa->numero. ' atualizada com sucesso!');
    }

    public function destroy(Mesa $mesa)
    {
        $mesa->delete();

        return redirect()->route('mesas.index')->with('success', 'Mesa ' .$mesa->numero.' deletada com sucesso!');
    }
}
