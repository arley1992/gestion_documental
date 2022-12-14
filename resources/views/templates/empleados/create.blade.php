@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="fl"><i class="fa-solid fa-user-plus"></i> Registro de Empleados </h3>

                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form class="needs-validation" novalidate method="POST" action="{{ route('empleados.store') }}">
                            {{-- csrf etiqueta de blade que agrega un token oculto en el formulario para evitar falsificacion 
                                de peticion  --}}
                            @csrf
                            <div class="mb-3">
                                <label for="nombre" class="form-label"> Nombre </label>
                                <input placeholder="Ingrese el nombre" type="text" class="form-control" id="nombre"
                                    name="nombre" aria-describedby="nombreHelp" value="{{old('nombre')}}" required >
                                @error('nombre')
                                    <div class="invalid-feedback" >
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="documento_de_identidad" class="form-label"> Documento De Identidad </label>
                                <input placeholder="Ingrese el documento_de_identidad" type="text" class="form-control" id="documento_de_identidad"
                                    name="documento_de_identidad" aria-describedby="nombreHelp" value="{{old('documento_de_identidad')}}" required >
                                @error('documento_de_identidad')
                                    <div class="invalid-feedback" >
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="telefono" class="form-label"> Telefono </label>
                                <input placeholder="Ingrese el telefono" type="text" class="form-control" id="telefono"
                                    name="telefono" aria-describedby="telefonoHelp" value="{{old('telefono')}}" required >
                                @error('telefono')
                                    <div class="invalid-feedback" >
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="direccion" class="form-label"> Direccion </label>
                                <input placeholder="Ingrese la direccion" type="text" class="form-control" id="direccion"
                                    name="direccion" aria-describedby="direccionHelp" value="{{old('direccion')}}" required >
                                @error('direccion')
                                    <div class="invalid-feedback" >
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary"> Registrar </button>
                            <a type="button" href="{{ route('empleados.index') }}" class="btn btn-secondary"> Cancelar
                            </a>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
