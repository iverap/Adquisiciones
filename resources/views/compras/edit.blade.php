@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Editar Compra
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif
            <form method="post" action="{{ route('Compra.update', $compra->id_compra) }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="categoria">Categoria:</label>
                    <select name="categoria" id="categoria" class="form-control">
                        <option value="{{$compra->categoria}}" selected=selected >{{$compra->categ->nombre_categoria}}</option>
                        @foreach($categorias as $categoria)
                            <option value="{{$categoria->id_categoria}}">{{$categoria->nombre_categoria}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="documento">Documento:</label>
                    <select name="documento" id="documento" class="form-control">
                        <option value="{{$compra->documento}}" selected=selected >{{$compra->docum->numero_documento}}</option>
                        @foreach($documentos as $documento)
                            <option value="{{$documento->id_documento}}">{{$documento->numero_documento}}</option>
                        @endforeach
                    </select>
                </div>
                {{--<div class="form-group">
                    <label for="name">Detalle:</label>
                    <input type="text" class="form-control" name="detalle" value="{{ $compra->detalle }}"/>
                </div>--}}
                <div class="form-group">
                    <label for="name">Descripcion Gasto:</label>
                    <input type="text" class="form-control" name="descripcion_gasto" value="{{ $compra->descripcion_gasto }}"/>
                </div>
                <div class="form-group">
                    <label for="quantity">Monto Gasto:</label>
                    <input type="text" class="form-control" name="monto_gasto" value="{{ $compra->monto_gasto }}"/>
                </div>
                <button type="submit" class="btn btn-primary">Editar</button>
            </form>
    </div>
</div>
@endsection