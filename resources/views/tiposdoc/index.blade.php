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
                    <td>Nombre Tipo Documento</td>

                    <td colspan="2">Accion</td>
                </tr>
            </thead>
            <tbody>
                @foreach($tiposdoc as $tipodoc)
                    <tr>
                        <td>{{$tipodoc->nombre_tipodoc}}</td>
                        <td><a href="{{ route('TipoDocumento.edit',$tipodoc->id_tipodoc)}}" class="btn btn-primary">Editar</a></td>
                        <td>
                            <form action="{{ route('TipoDocumento.destroy', $tipodoc->id_tipodoc)}}" method="post">
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
                <form action="{{ route('TipoDocumento.create')}}" method="get" >
                    <button class="btn btn-primary">Agregar</button>
                </form>
                <br>
            </div>
@endsection