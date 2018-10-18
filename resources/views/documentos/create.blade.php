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
            <div class="col-md-10">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <div class="card uper">
                    <div class="card-header">
                        Nuevo Documento
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('Documento.store') }}" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        @csrf
                                        <label for="name">Nro Documento:</label>
                                        <input type="text" class="form-control" name="numero_documento"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity">Fecha de Vencimiento:</label>
                                        <input type="date" class="form-control" name="fecha_vencimiento"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity">Documento Original:</label>
                                        <input type="file" class="form-control" name="documento_original"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="proveedor">Proveedor:</label>
                                        <select name="proveedor" id="proveedor" class="form-control">
                                            @foreach($proveedores as $proveedor)
                                                <option value="{{$proveedor->id_proveedor}}">{{$proveedor->nombre_proveedor}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tipo">Tipo:</label>
                                        <select class="form-control" name="tipo">
                                            <option>FACEX</option>
                                            <option>FACEL</option>
                                            <option>BOL</option>
                                            <option>BOLEC</option>
                                            <option>ODE</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="quantity">Fecha Del Documento:</label>
                                        <input type="date" class="form-control" name="fecha_documento"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity">Monto del Documento:</label>
                                        <input type="text" class="form-control" name="monto_documento"/>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

@endsection