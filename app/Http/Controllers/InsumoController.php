<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Insumo;

class InsumoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function showInsumoForm()
    {
        $usuario = Auth::user();
        return view('insumos.create', compact("usuario"));
    }

    public function index()
    {
        $insumos = Insumo::all();
        $usuario = Auth::user();
        return view ('insumos.index', compact("insumos", "usuario"));
    }

    public function create(Request $request)
    {

        $ins = new Insumo();
        $ins->descricao = $request->descricao;
        $ins->eh_processo_produtivo = TRUE ? $request->gnpp == 'sim' : FALSE;
        if($request->gnpp == 'sim')
        {
            $ins->eh_organico = TRUE ? $request->organico == 'sim' : FALSE;
        }
        $ins->user_id = Auth::user()->id;

        $ins->save();


        return redirect('/insumos');
//        "_token" => "0kYuUraOnhiRJz8N6x7XOUEm3oqceDY91azGw4zP"
//  "descricao" => "Papel"
//  "gnpp" => "sim"
//  "organico" => "sim"
    }
}
