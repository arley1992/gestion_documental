@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="fl"><i class="fa-solid fa-people-group"></i></i> Listados de clientes</h3>
                        <button type="button" class="btn btn-primary fr">
                            <i class="fa-solid fa-plus"></i> Nuevo
                        </button>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Direccion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientes as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nombre }}</td>
                                        <td>{{ $item->telefono }}</td>
                                        <td>{{ $item->correo }}</td>
                                        <td>{{ $item->direccion }}</td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                <button type="button" class="btn btn-warning btn-sm"><i
                                                        class="fa-solid fa-pen-to-square"></i> Editar</button>
                                                <button type="button" class="btn btn-danger btn-sm"><i
                                                        class="fa-solid fa-trash-can"></i> Eliminar</button>
                                            </div>
                                        </td>
                                        {{-- <td>{{ $item['nombre'] }}</td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endsection
