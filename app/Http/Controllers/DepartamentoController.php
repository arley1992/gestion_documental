<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;

class DepartamentoController extends Controller
{
    public function index()
    {
        $dep = Departamento::all(); // consulta sql
        return view('templates/departamento/index', compact('dep'));
    }
}
