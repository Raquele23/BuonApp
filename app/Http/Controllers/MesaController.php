<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use Illuminate\Http\Request;
use App\Http\Requests\MesaRequest;

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

    public function store(MesaRequest $request)
    {
        $validated = $request->validated();

        Mesa::create($validated);

        return redirect()->route('mesas.index')->with('success', 'Mesa ' .$request->numero. ' cadastrada com sucesso!');
    }

    public function edit(Mesa $mesa)
    {
        return view('mesas.edit', compact('mesa'));
    }

    public function update(MesaRequest $request, Mesa $mesa)
    {
        $validated = $request->validate();

        $mesa->update($validated);

        return redirect()->route('mesas.index')->with('success', 'Mesa ' .$mesa->numero. ' atualizada com sucesso!');
    }

    public function destroy(Mesa $mesa)
    {
        $mesa->delete();

        return redirect()->route('mesas.index')->with('success', 'Mesa ' .$mesa->numero.' deletada com sucesso!');
    }
}
