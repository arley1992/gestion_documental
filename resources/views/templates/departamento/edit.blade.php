@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="fl"><i class="fa-solid fa-network-wired"></i> Editar Departamento </h3>

                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form class="needs-validation" novalidate method="POST" action="{{ route('departamento.update',$dep) }}">
                            {{-- csrf etiqueta de blade que agrega un token oculto en el formulario para evitar falsificacion 
                                de peticion  --}}
                            @csrf @method('PATCH')
                            <div class="mb-3">
                                <label for="nombre" class="form-label"> Nombre </label>
                                <input placeholder="ingrece el nombre" type="text" class="form-control" id="nombre"
                                    name="nombre" aria-describedby="nombreHelp" value="{{old('nombre', $dep->nombre)}}" required >
                                @error('nombre')
                                    <div class="invalid-feedback" >
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-warning"> Actualizar </button>
                            <a type="button" href="{{ route('departamento.index') }}" class="btn btn-secondary"> Cancelar
                            </a>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
