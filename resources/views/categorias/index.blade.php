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
                    <td>Nombre Categoria</td>

                    <td colspan="2">Accion</td>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $categoria)
                    <tr>
                        <td>{{$categoria->nombre_categoria}}</td>
                        <td><a href="{{ route('Categoria.edit',$categoria->id_categoria)}}" class="btn btn-primary">Editar</a></td>
                        <td>
                            <form action="{{ route('Categoria.destroy', $categoria->id_categoria)}}" method="post">
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
            <form action="{{ route('Categoria.create')}}" method="get" >
                <button class="btn btn-primary">Agregar</button>
            </form>
            <br>
    </div>
@endsection