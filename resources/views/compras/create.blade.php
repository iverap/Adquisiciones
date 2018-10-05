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
            <div class="card uper">
                <div class="card-header">
                    Nueva Compra
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
                    <form method="post" action="{{ route('Compra.store') }}" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="categoria">Categoria:</label>
                            <select name="categoria" id="categoria" class="form-control">
                                @foreach($categorias as $categoria)
                                    <option value="{{$categoria->id_categoria}}">{{$categoria->nombre_categoria}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="documento">Documento:</label>
                            <select name="documento" id="documento" class="form-control">
                                @foreach($documentos as $documento)
                                    <option value="{{$documento->id_documento}}">{{$documento->numero_documento}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            @csrf
                            <label for="name">Detalle:</label>
                            <input type="text" class="form-control" name="detalle"/>
                        </div>
                        <div class="form-group">
                            @csrf
                            <label for="name">Descripcion Gasto:</label>
                            <input type="text" class="form-control" name="descripcion_gasto"/>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Monto Gasto:</label>
                            <input type="text" class="form-control" name="monto_gasto"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection