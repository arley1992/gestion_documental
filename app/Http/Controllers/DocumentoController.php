<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Documento;
use App\Models\TipoDocumentos;
use App\Models\Clientes;
use App\Models\Departamento;


class DocumentoController extends Controller
{
    public function index()
    {
        $documento = Documento::all();
        return view('templates/documento/index', compact('documento'));
    }

    public function create(){
        $tipos = TipoDocumentos::all();
        $clientes = Clientes::all();
        $departamentos =Departamento::all();
        return view('templates/documento/create', compact('tipos','clientes','departamentos'));

    }

    public function store(Request $request)
    {
        $request->validate([
            "nombre" => ["required"],
            "formato" => ["required"],
            "size" => ["required"],
            "remitente" => ["required"],
            "tipo_id" => ["required"],
            "departamento_id" => ["required"],
            "cliente_id" => ["required"],
        ]);
        

        $doc = new Documento();
        $doc->usuarios_id = Auth::id(); // 1
        $doc->tipo_documento_id = $request->tipo_id; // 1
        $doc->clientes_id = $request->cliente_id;
        $doc->departamento_id = $request->departamento_id;
        $doc->nombre = $request->nombre;
        $doc->formato = $request->formato;
        $doc->size = $request->size;
        $doc->remitente = $request->remitente;
        $doc->save();

        session()->flash("status", "Cliente creado exitosamente");
        // to_route es un helper de laravel para abreviar 
        return to_route("documento.index");
    }

    public function edit(Documento $doc)
    {
        
        $tipos = TipoDocumentos::all();
        $clientes = Clientes::all();
        $docartamentos = Departamento::all();
        return view("templates.documento.edit", compact("doc","tipos","clientes","departamentos"));
    }

    public function update(Request $request, $doc)
    {
        $request->validate([
            "nombre" => ["required"],
            "formato" => ["required"],
            "size" => ["required"],
            "remitente" => ["required"],
            "tipo_id" => ["required"],
            "departamento_id" => ["required"],
            "cliente_id" => ["required"],


        ]);

        $doc = Documento::find($doc);
        $doc->nombre = $request->nombre;
        $doc->formato = $request->formato;
        $doc->size = $request->size;
        $doc->remitente = $request->remitente;
        $doc->tipo_documento_id = $request->tipo_id; // 1
        $doc->clientes_id = $request->cliente_id;
        $doc->departamento_id = $request->departamento_id;
        $doc->save();

        session()->flash("status", "Documento editado exitosamente");

        return to_route("documento.index");
    }

}

