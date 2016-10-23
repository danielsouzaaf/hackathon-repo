<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Ordem;
use App\Insumo;

use App\Http\Requests;

class OrdemController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ShowOrdemForm()
    {
        $usuario = Auth::user();
        $insumos = Insumo::where('user_id', '=', $usuario->id)->get();
        $statuses = Status::all();
        return view('ordens.create', compact("usuario", "insumos", "statuses"));
    }

    public function index()
    {
        $usuario = Auth::user();
        $ordens = Ordem::whereIn('insumo_id', Insumo::where('user_id', '=', $usuario->id)->get()->pluck('id'))->get();
        return view('ordens.index', compact('ordens', 'usuario'));

    }

    public function updateOrder(Request $request, $idorder)
    {
        $order = Ordem::findOrFail($idorder);
        $order->quantidade = $request->quantidade;
        $order->statuses_id = $request->status;
        $order->save();

        return redirect('ordens');
    }

    public function getOrder($idorder)
    {
        $usuario = Auth::user();
        $order = Ordem::findOrFail($idorder);
//        $table->binary('eh_processo_produtivo');
//        $table->binary('eh_organico')->nullable();
        // 2 false = statuses 1, 5, 6
        // 1 true 1 false = statuses 2, 4, 6
        // 2 true = statuses 2, 3, 6
        $ids = [];
        $idsff = [1, 5, 6];
        $idstf = [2, 4, 6];
        $idstt = [2, 3, 6];
        if ($order->insumo->eh_processo_produtivo && $order->insumo->eh_organico) $ids = [2, 3, 6];
        else if($order->insumo->eh_processo_produtivo && !$order->insumo->eh_organico) $ids = [2, 4, 6];
        else $ids = [1, 5, 6];

        $statuses = Status::whereIn('id', $ids)->get();
        return view('ordens.detail', compact('order', 'usuario', 'statuses'));
    }

    public function create(Request $request)
    {
        $ordem = new Ordem();
        $ordem->insumo_id = $request->insumos;
        $ordem->quantidade = $request->quantidade;
        $ordem->statuses_id = 6;
        $ordem->save();

        return redirect('/ordens');
    }
}
