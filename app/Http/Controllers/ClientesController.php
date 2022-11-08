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

    public function create()
    {
        return view('templates/clientes/create');
        
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=> ['required'],
            'correo'=> ['required'],
            'telefono'=> ['required'],
            'direccion'=> ['required']
        ]);
        // se crea instancia del modelo clientes.
        $cli= new Clientes();
        $cli->nombre = $request->nombre;
        $cli->correo = $request->correo;
        $cli->telefono = $request->telefono;
        $cli->direccion = $request->direccion;
        $cli->save();
        // creacion de mensaje flash para indicar que se creo exitosamente el registro
        session()->flash('status','Cliente creado exitosamente');

        return to_route('clientes.index');
    }


    public function edit(Clientes $cli)
    {
        return view('templates/clientes/edit',compact('cli'));
    }


     public function update(Request $request,$cli)
     {
        $request->validate([
            'nombre'=> ['required'],
            'correo'=> ['required'],
            'telefono'=> ['required'],
            'direccion'=> ['required']
        ]);

        $cli=  Clientes::find($cli);
        $cli->nombre = $request->nombre;
        $cli->correo = $request->correo;
        $cli->telefono = $request->telefono;
        $cli->direccion = $request->direccion;
        $cli->save();
        session()->flash('status','Cliente actualizado exitosamente');

        return to_route('clientes.index');
        
     }

     public function delete($id)
     {
        Clientes::destroy($id);

        session()->flash('status','Cliente eliminado exitosamente');
        return to_route('clientes.index');
     }


    

    

}
