<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Mesa;

class DashboardController extends Controller
{
    public function index()
    {
        $pedidosHoje = Pedido::whereDate('created_at', now())->count();

        $mesasOcupadas = Mesa::where('status', 'ocupada')->count();

        $lucroHoje = Pedido::whereDate('created_at', now())->sum('total');

        return view('dashboard', compact('pedidosHoje', 'mesasOcupadas', 'lucroHoje'));
    }
}