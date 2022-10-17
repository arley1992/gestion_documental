<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documento;

class DocumentoController extends Controller
{
    public function index()
    {
        $documento = Documento::all();
        return view('templates/documento/index', compact('documento'));
    }

    public function create(){
        return view('templates/documento/create');
    }

}

