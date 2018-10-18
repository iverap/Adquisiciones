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
                <form method="post" action="{{ route('Pago.store') }}">
                    <div class="card uper">
                        <div class="card-header">
                            Nuevo Documento
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        @csrf
                                        <label for="name">Banco:</label>
                                        <input type="text" class="form-control" name="banco"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity">Fecha de Pago:</label>
                                        <input type="date" class="form-control" name="fecha_pago"/>
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
                        </div>
                    </div>
                </form>
                <table id='tabla' class="table table-striped">
                    <thead>
                    <tr>
                        <td>id</td>
                        <td>Numero</td>
                        <td>Proveedor</td>
                        <td>Fecha de Documento</td>
                        <td>Fecha de Vencimiento</td>
                        <td>Tipo</td>
                        <td>Monto</td>
                        <td>Accion</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($documentos as $documento)
                        <tr>
                            <td>{{$documento->id_documento}}</td>
                            <td>{{$documento->numero_documento}}</td>
                            <td>{{$documento->prov->nombre_proveedor}}</td>
                            <td>{{$documento->fecha_documento}}</td>
                            <td>{{$documento->fecha_vencimiento}}</td>
                            <td>{{$documento->tipo}}</td>
                            <td>{{$documento->monto_documento}}</td>
                            <td><a href="{{ route('Documento.show',$documento->documento_original)}}" class="btn btn-primary">Ver Imagen</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
@endsection