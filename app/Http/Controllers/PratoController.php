<?php

namespace App\Http\Controllers;

use App\Models\Prato;
use Illuminate\Http\Request;

class PratoController extends Controller
{
    public function index()
    {
        $pratos = Prato::all();
        return view('pratos.index', compact('pratos'));
    }

    public function create()
    {
        return view('pratos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric',
            'imagem' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('imagem')) {
            $path = $request->file('imagem')->store('pratos', 'public');
            $validated['imagem'] = $path;
        }

        Prato::create($validated);

        return redirect()->route('pratos.index')->with('success', 'Prato criado com sucesso!');
    }

    public function edit(Prato $prato)
    {
        return view('pratos.edit', compact('prato'));
    }

    public function update(Request $request, Prato $prato)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric',
            'imagem' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

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
