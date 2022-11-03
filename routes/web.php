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
// modulo empleados 
Route::middleware('auth')->get('/empleados',[EmpleadosController::class,'index'])->name('empleados.index');

// modulo clientes
Route::middleware('auth')->get('/clientes', [ClientesController::class,'index'] )->name('clientes.index');

// modulo departamento
Route::middleware('auth')->get('/departamento', [DepartamentoController::class,'index'])->name('departamento.index');

// modulo de documento
Route::middleware('auth')->get('/documento', [DocumentoController::class,'index'])->name('documento.index');
Route::middleware('auth')->get('/documento/registrar', [DocumentoController::class,'create'])->name('documento.create');

// modulo tipo documento
Route::middleware('auth')->get('/tipo_documento', [TipoDocumentoController::class,'index'])->name('tipoDocumento.index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
