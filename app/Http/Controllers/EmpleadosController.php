<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadosController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all();
        return view('templates/empleados/index', compact('empleados'));
    }
}
