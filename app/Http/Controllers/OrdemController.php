<?php

namespace App\Http\Controllers;

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
        return view('ordens.create', compact("usuario"));
    }

    public function index()
    {
        $usuario = Auth::user();
        $ordens = Ordem::whereIn('insumo_id', Insumo::where('user_id', '=', $usuario->id)->get->pluck('id'))->get();

        return view('ordens.index', compact('ordens', 'usuario'));

    }

    public function create(Request $request)
    {
        dd($request);
        $usuario = Auth::user();
        $ordem = new Ordem();
        //$ordem->insumo_id =
    }
}
