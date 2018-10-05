@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>

    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Categoria</td>
                    <td>Documento</td>
                    <td>Detalle Compra</td>
                    <td>Descripcion del gasto</td>
                    <td>Monto del Gasto</td>
                    <td colspan="2">Accion</td>
                </tr>
            </thead>
            <tbody>
                @foreach($compras as $compra)
                    <tr>
                        <td>{{$compra->categ->nombre_categoria}}</td>
                        <td>{{$compra->docum->numero_documento}}</td>
                        <td>{{$compra->detalle}}</td>
                        <td>{{$compra->descripcion_gasto}}</td>
                        <td>{{$compra->monto_gasto}}</td>
                        <td><a href="{{ route('Compra.edit',$compra->id_compra)}}" class="btn btn-primary">Editar</a></td>
                        <td>
                            <form action="{{ route('Compra.destroy', $compra->id_compra)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
            <div>
                <form action="{{ route('Compra.create')}}" method="get" >
                    <button class="btn btn-primary">Agregar</button>
                </form>
                <br>
            </div>
@endsection