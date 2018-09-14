@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-4">
                <div class="card uper">
                    <div class="card-header">
                        Nuevo Proveedor
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
                        <form method="post" action="{{ route('Proveedores.store') }}">
                            <div class="form-group">
                                @csrf
                                <label for="name">Nombre:</label>
                                <input type="text" class="form-control" name="nombre_proveedor"/>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Rut:</label>
                                <input type="text" class="form-control" name="rut_proveedor"/>
                            </div>
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
            </div>
        </div>
    </div>

@endsection