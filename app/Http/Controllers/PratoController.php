<?php

namespace App\Http\Controllers;

use App\Models\Prato;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\PratoRequest;

class PratoController extends Controller
{
    public function index()
    {
        $pratos = Prato::all();
        return view('pratos.index', compact('pratos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('pratos.create', compact('categorias'));
    }

    public function store(PratoRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('imagem')) {
            $path = $request->file('imagem')->store('pratos', 'public');
            $validated['imagem'] = $path;
        }

        Prato::create($validated);

        return redirect()->route('pratos.index')->with('success', 'Prato criado com sucesso!');
    }

    public function edit(Prato $prato)
    {
        $categorias = Categoria::all();
        return view('pratos.edit', compact('prato', 'categorias'));
    }

    public function update(PratoRequest $request, Prato $prato)
    {
        $validated = $request->validated();

        if ($request->hasFile('imagem')) {
            if ($prato->imagem && \Storage::disk('public')->exists($prato->imagem)) {
            \Storage::disk('public')->delete($prato->imagem);
        }

            $path = $request->file('imagem')->store('pratos', 'public');
            $validated['imagem'] = $path;
        }

        $prato->update($validated);

        return redirect()->route('pratos.index')->with('success', 'Prato atualizado com sucesso!');
    }

    public function destroy(Prato $prato)
    {
        $prato->delete();

        return redirect()->route('pratos.index')->with('success', 'Prato deletado com sucesso!');
    }
}
