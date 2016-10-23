<?php

namespace App\Http\Controllers;

use App\Insumo;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Ordem;
use App\User;
use Illuminate\Support\Facades\Auth;

class NegociacaoController extends Controller
{
    public function index()
    {
        $ordens = Ordem::where('statuses_id', '=', 2)->get();
        $usuario = new User();
        $usuario->name = "Usuário anônimo";
        $usuario->email = "banana@onetwothree.com";

        return view('negociacoes.index', compact("ordens", "usuario"));

    }

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'getOrder']]);

    }

    public function myorders()
    {
        $usuario = Auth::user();
        $ordens = Ordem::whereIn('insumo_id', Insumo::where('user_id', '=', $usuario->id)->get()->pluck('id'))->
        where('statuses_id', '=', 2)->get();
        return view('negociacoes.myorders', compact("usuario", "ordens"));
    }

    public function getOrder($orderid)
    {

    }
}
