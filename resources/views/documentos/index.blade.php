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
                    <td>Numero</td>
                    <td>Proveedor</td>
                    <td>Fecha de Documento</td>
                    <td>Fecha de Vencimiento</td>
                    <td>Tipo</td>
                    <td>Monto</td>
                    <td colspan="2">Accion</td>
                </tr>
            </thead>
            <tbody>
                @foreach($documentos as $documento)
                    <tr>
                        <td>{{$documento->numero_documento}}</td>
                        <td>{{$documento->prov->nombre_proveedor}}</td>
                        <td>{{$documento->fecha_documento}}</td>
                        <td>{{$documento->fecha_vencimiento}}</td>
                        <td>{{$documento->tipodoc->nombre_tipodoc}}</td>
                        <td>{{$documento->monto_documento}}</td>
                        <td><a href="{{ route('Documento.edit',$documento->id_documento)}}" class="btn btn-primary">Editar</a></td>
                        <td>
                            <form action="{{ route('Documento.destroy', $documento->id_documento)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Anular</button>
                            </form>
                        </td>
                        <td><a href="{{ route('Documento.show',$documento->documento_original)}}" class="btn btn-primary">Ver Imagen</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    <div>
@endsection