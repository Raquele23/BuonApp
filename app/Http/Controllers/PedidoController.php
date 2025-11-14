<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Mesa;
use App\Models\Prato;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'mesa_id' => 'required|exists:mesas,id',
            'pratos' => 'required|array',
            'pratos.*' => 'exists:pratos,id',
            'quantidades' => 'required|array',
        ]);

        $pedido = Pedido::create([
            'mesa_id' => $request->mesa_id,
            'status' => 'em andamento',
            'total' => 0,
        ]);

        $total = 0;
        foreach ($request->pratos as $pratoId) {
            $quantidade = $request->quantidades[$pratoId];
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

    public function update(Request $request, Pedido $pedido)
    {
        $validated = $request->validate([
            'mesa_id' => 'required|exists:mesas,id',
            'pratos' => 'required|array',
            'pratos.*' => 'exists:pratos,id',
            'quantidades' => 'required|array',
            'status' => 'required|string',
        ]);

        $pedido->update([
            'mesa_id' => $request->mesa_id,
            'status' => $request->status,
        ]);

        $pedido->pratos()->detach();

        $total = 0;
        foreach ($request->pratos as $pratoId) {
            $quantidade = $request->quantidades[$pratoId];
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