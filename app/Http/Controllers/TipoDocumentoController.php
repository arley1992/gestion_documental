<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoDocumentos;


class TipoDocumentoController extends Controller
{
    public function index()
    {
        $tipodocumento = TipoDocumentos::all();
        return view('templates.tipoDocumento.index', compact('tipodocumento'));
    }
}
