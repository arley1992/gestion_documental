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
    
    public function create()
    {
        return view('templates/departamento/create');
        
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=> ['required']
        ]);
        // se crea instancia del modelo Departamento.
        $dep= new Departamento();
        $dep->nombre = $request->nombre;
        $dep->save();
        // creacion de mensaje flash para indicar que se creo exitosamente el registro
        session()->flash('status','Departamento creado exitosamente');

        return to_route('departamento.index');
    }

    public function edit(Departamento $dep)
    {
        return view('templates/departamento/edit',compact('dep'));
    }

    public function update(Request $request,$dep)
    {
        $request->validate([
            'nombre'=> ['required']
        ]);
        // con find se busca el departamento por medio del id.
        $dep=  Departamento::find($dep);
        $dep->nombre = $request->nombre;
        $dep->save();
        // creacion de mensaje flash para indicar que se actualizo exitosamente .
        session()->flash('status','Departamento editado exitosamente');

        return to_route('departamento.index');
    }

    public function delete($id)
    {
        Departamento::destroy($id);
         // creacion de mensaje flash para indicar que se elimino exitosamente .
        session()->flash('status','Departamento eliminado exitosamente');
        return to_route('departamento.index');
    }
}
