<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use App\Models\Prato;
use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Http\Requests\PedidoRequest;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::with(['mesa', 'pratos'])->get();
        return view('pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        $mesas = Mesa::all();
        $pratos = Prato::all();
        return view('pedidos.create', compact('mesas', 'pratos'));
    }

    public function store(PedidoRequest $request)
    {
        $validated = $request->validated();

        $pedido = Pedido::create([
            'mesa_id' => $validated['mesa_id'],
            'status' => 'em andamento',
            'total' => 0,
        ]);

        $total = 0;
        foreach ($validated['pratos'] as $pratoId) {
            $quantidade = $validated['quantidades'][$pratoId];
            $prato = Prato::find($pratoId);

            $pedido->pratos()->attach($pratoId, ['quantidade' => $quantidade]);

            $total += $prato->preco * $quantidade;
        }

        $pedido->update(['total' => $total]);

        return redirect()->route('pedidos.index')->with('success', 'Pedido criado com sucesso!');
    }

    public function edit(Pedido $pedido)
    {
        $mesas = Mesa::all();
        $pratos = Prato::all();
        $pedido->load('pratos');
        return view('pedidos.edit', compact('pedido', 'mesas', 'pratos'));
    }

    public function update(PedidoRequest $request, Pedido $pedido)
    {
        $validated = $request->validated();

        $pedido->update([
            'mesa_id' => $validated['mesa_id'],
            'status' => $validated['status'],
        ]);

        $pedido->pratos()->detach();

        $total = 0;
        foreach ($validated['pratos'] as $pratoId) {
            $quantidade = $validated['quantidades'][$pratoId];
            $prato = Prato::find($pratoId);

            $pedido->pratos()->attach($pratoId, ['quantidade' => $quantidade]);
            
            $total += $prato->preco * $quantidade;
        }

        $pedido->update(['total' => $total]);

        return redirect()->route('pedidos.index')->with('success', 'Pedido atualizado com sucesso!');
    }

    public function destroy(Pedido $pedido)
    {
        $pedido->delete();
        return redirect()->route('pedidos.index')->with('success', 'Pedido excluído com sucesso!');
    }
}