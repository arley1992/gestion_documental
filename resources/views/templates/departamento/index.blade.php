@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="fl"><i class="fa-solid fa-network-wired"></i> Listados de departamento</h3>
                        <a type="button" href="{{route('departamento.create')}}" class="btn btn-primary fr">
                            <i class="fa-solid fa-plus"></i> Nuevo
                        </a>
                    </div>

                    <div class="card-body table-responsive">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                <i class="fa-solid fa-thumbs-up"></i>  {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Departamento</th>
                                    <th scope="col" class="mw-200">
                                        <div class="fr">Acciones</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dep as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nombre }}</td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                <a href="{{route('departamento.edit',$item)}}" type="button" class="btn btn-warning btn-sm"><i
                                                        class="fa-solid fa-pen-to-square"></i> Editar</a>
                                                <a href="{{route('departamento.delete',$item->id)}}" type="button" class="btn btn-danger btn-sm"><i
                                                        class="fa-solid fa-trash-can"></i> Eliminar</a>
                                            </div>
                                        </td>
                                        {{-- <td>{{ $item['nombre'] }}</td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
