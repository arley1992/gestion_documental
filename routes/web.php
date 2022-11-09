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
Route::middleware('auth')->get('/empleados/create',[EmpleadosController::class,'create'])->name('empleados.create');
Route::middleware('auth')->post('/empleados',[EmpleadosController::class,'store'])->name('empleados.store');
Route::middleware('auth')->get('/empleados{emp}/edit',[EmpleadosController::class,'edit'])->name('empleados.edit');
Route::middleware('auth')->get('/empleados{id}/delete',[EmpleadosController::class,'delete'])->name('empleados.delete');
Route::middleware('auth')->patch('/empleados{emp}',[EmpleadosController::class,'update'])->name('empleados.update');

// modulo clientes
Route::middleware('auth')->get('/clientes', [ClientesController::class,'index'] )->name('clientes.index');
Route::middleware('auth')->get('/clientes/create', [ClientesController::class,'create'] )->name('clientes.create');
Route::middleware('auth')->post('/clientes', [ClientesController::class,'store'])->name('clientes.store');
Route::middleware('auth')->get('/clientes/{cli}/edit', [ClientesController::class,'edit'])->name('clientes.edit');
Route::middleware('auth')->get('/clientes/{id}/delete', [ClientesController::class,'delete'])->name('clientes.delete');
Route::middleware('auth')->patch('/clientes/{cli}', [ClientesController::class,'update'])->name('clientes.update');
// modulo departamento
Route::middleware('auth')->get('/departamento', [DepartamentoController::class,'index'])->name('departamento.index');
Route::middleware('auth')->get('/departamento/create', [DepartamentoController::class,'create'])->name('departamento.create');
Route::middleware('auth')->post('/departamento', [DepartamentoController::class,'store'])->name('departamento.store');
Route::middleware('auth')->get('/departamento/{dep}/edit', [DepartamentoController::class,'edit'])->name('departamento.edit');
Route::middleware('auth')->get('/departamento/{id}/delete', [DepartamentoController::class,'delete'])->name('departamento.delete');
Route::middleware('auth')->patch('/departamento/{dep}', [DepartamentoController::class,'update'])->name('departamento.update');

// modulo de documento
Route::middleware('auth')->get('/documento', [DocumentoController::class,'index'])->name('documento.index');
Route::middleware('auth')->get('/documento/registrar', [DocumentoController::class,'create'])->name('documento.create');

// modulo tipo documento
Route::middleware('auth')->get('/tipo_documento', [TipoDocumentoController::class,'index'])->name('tipoDocumento.index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
