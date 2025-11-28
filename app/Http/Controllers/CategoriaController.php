<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriaRequest;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(CategoriaRequest $request)
    {
        $validated = $request->validated();

        Categoria::create($validated);

        return redirect()->route('categorias.index')->with('success', 'Categoria criada com sucesso!');
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(CategoriaRequest $request, Categoria $categoria)
    {
        $validated = $request->validated();

        $categoria->update($validated);

        return redirect()->route('categorias.index')->with('success', 'Categoria atualizada com sucesso!');
    
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoria deletada com sucesso!');
    }
}
