<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleados;

class EmpleadosController extends Controller
{
    public function index()
    {
        $empleados = Empleados::all(); 
        return view('templates/empleados/index', compact('empleados'));
    }

    public function create()
    {

        return view('templates/empleados/create');
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'=> ['required'],
            'documento_de_identidad'=> ['required'],
            'telefono'=> ['required'],
            'direccion'=> ['required']
        ]);
        // se crea instancia del modelo Empleados.
        $emp= new Empleados();
        $emp->nombre = $request->nombre;
        $emp->documento_de_identidad = $request->documento_de_identidad;
        $emp->telefono = $request->telefono;
        $emp->direccion = $request->direccion;
        $emp->save();
        // creacion de mensaje flash para indicar que se creo exitosamente el registro
        session()->flash('status','Empleado creado exitosamente');

        return to_route('Empleados.index');
    }


    public function edit(Empleados $emp)
    {
        return view('templates/Empleados/edit',compact('emp'));
    }


     public function update(Request $request,$emp)
     {
        $request->validate([
            'nombre'=> ['required'],
            'documento_de_identidad'=> ['required'],
            'telefono'=> ['required'],
            'direccion'=> ['required']
        ]);

        $emp=  Empleados::find($emp);
        $emp->nombre = $request->nombre;
        $emp->documento_de_identidad = $request->documento_de_identidad;
        $emp->telefono = $request->telefono;
        $emp->direccion = $request->direccion;
        $emp->save();
        session()->flash('status','Empleado actualizado exitosamente');

        return to_route('Empleados.index');
        
     }

     public function delete($id)
     {
        Empleados::destroy($id);

        session()->flash('status','Empleado eliminado exitosamente');
        return to_route('Empleados.index');
     }

}
