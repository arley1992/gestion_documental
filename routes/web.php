<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\TipoDocumentoController;

Route::get('/', function () {
    return view('auth/login');
});

Route::middleware('auth')->get('/empleados',[EmpleadosController::class,'index'])->name('empleados.index');

Route::middleware('auth')->get('/clientes', [ClientesController::class,'index'] )->name('clientes.index');

Route::middleware('auth')->get('/departamento', [DepartamentoController::class,'index'])->name('departamento.index');

Route::middleware('auth')->get('/documento', [DocumentoController::class,'index'])->name('documento.index');

Route::middleware('auth')->get('/documento/registrar', [DocumentoController::class,'create'])->name('documento.create');

Route::middleware('auth')->get('/tipo_documento', [TipoDocumentoController::class,'index'])->name('tipoDocumento.index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


