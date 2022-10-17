<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;


class ClientesController extends Controller
{
    public function index(){   
        $clientes = Clientes::all();
        return view('templates/clientes/index', compact('clientes'));
    }
}
