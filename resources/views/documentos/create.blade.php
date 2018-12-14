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
                @if(isset($repetido))
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{ 'El numero de documento ya existe para este proveedor' }}</li>
                        </ul>
                    </div><br />
                @endif
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
                                        <label for="fecha_vencimiento">Fecha de Vencimiento:</label>
                                        <input type="date" class="form-control" name="fecha_vencimiento"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="documento_original">Documento Original:</label>
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
                                        <select name="tipo" id="tipo" class="form-control">
                                            @foreach($tiposdoc as $tipodoc)
                                                <option value="{{$tipodoc->id_tipodoc}}">{{$tipodoc->nombre_tipodoc}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fecha_documento">Fecha Del Documento:</label>
                                        <input type="date" class="form-control" name="fecha_documento"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="monto_documento">Monto del Documento:</label>
                                        <input type="number" class="form-control" value="0" min="0" name="monto_documento"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-4">
                                    <label for="categoria">Categoria:</label>
                                    <select name="categoria" id="categoria" class="form-control">
                                        @foreach($categorias as $categoria)
                                            <option value="{{$categoria->id_categoria}}">{{$categoria->nombre_categoria}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{--<div class="form-group col-4">
                                    <label for="detalle">Detalle:</label>
                                    <textarea id="detalle" class="form-control" rows="4" name="detalle"></textarea>
                                </div>--}}
                                <div class="form-group col-4">
                                    <label for="descripcion_gasto">Descripcion Gasto:</label>
                                    {{--<input type="text" class="form-control" name="descripcion_gasto"/>--}}
                                    <textarea id="descripcion_gasto" class="form-control" rows="4" name="descripcion_gasto"></textarea>
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