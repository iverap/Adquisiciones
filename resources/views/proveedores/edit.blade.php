@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Editar Proveedor
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('Proveedores.update', $proveedor->id_proveedor) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name">Nombre Proveedor:</label>
                    <input type="text" class="form-control" name="nombre_proveedor" value={{ $proveedor->nombre_proveedor }} />
                </div>
                <div class="form-group">
                    <label for="quantity">Rut Proveedor:</label>
                    <input type="text" class="form-control" name="rut_proveedor" value={{ $proveedor->rut_proveedor }} />
                </div>
                <button type="submit" class="btn btn-primary">Editar</button>
            </form>
        </div>
    </div>
@endsection