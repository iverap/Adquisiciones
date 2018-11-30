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
            <form method="post" action="{{ route('Documento.update', $documento->id_documento) }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name">Nro Documento:</label>
                    <input type="text" class="form-control" name="numero_documento" value="{{ $documento->numero_documento }}"/>
                </div>
                <div class="form-group">
                    <label for="proveedor">Proveedor:</label>
                    <select name="proveedor" id="proveedor" class="form-control">
                        <option value="{{$documento->proveedor}}" selected=selected >{{$documento->prov->nombre_proveedor}}</option>
                        @foreach($proveedores as $proveedor)
                            <option value="{{$proveedor->id_proveedor}}">{{$proveedor->nombre_proveedor}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantity">Fecha Del Documento:</label>
                    <input type="date" class="form-control" name="fecha_documento" value="{{ $documento->fecha_documento }}"/>
                </div>
                <div class="form-group">
                    <label for="quantity">Fecha de Vencimiento:</label>
                    <input type="date" class="form-control" name="fecha_vencimiento" value="{{ $documento->fecha_vencimiento }}"/>
                </div>
                <div class="form-group">
                    <label for="tipo">Tipo:</label>
                    <select class="form-control" name="tipo" >
                        <option value="{{$documento->tipo}}" selected=selected >{{$documento->tipo}}</option>
                        <option>FACEX</option>
                        <option>FACEL</option>
                        <option>BOL</option>
                        <option>BOLEC</option>
                        <option>ODE</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantity">Monto del Documento:</label>
                    <input type="text" class="form-control" name="monto_documento" value="{{ $documento->monto_documento }}"/>
                </div>
                <div class="form-group">
                    <label for="quantity">Documento Original:</label>
                    <input type="file" class="form-control" name="documento_original"/>
                </div>
                <button type="submit" class="btn btn-primary">Editar</button>
            </form>
        </div>
    </div>
@endsection