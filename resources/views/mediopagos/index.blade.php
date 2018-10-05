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
                    <td>Medio</td>
                    <td>Banco</td>
                    <td>Numero de cuenta</td>
                    <td>Numero de Transaccion</td>
                    <td colspan="2">Accion</td>
                </tr>
            </thead>
            <tbody>
                @foreach($mediopagos as $mediopago)
                    <tr>
                        <td>{{$mediopago->medio}}</td>
                        <td>{{$mediopago->banco}}</td>
                        <td>{{$mediopago->nro_cuenta}}</td>
                        <td>{{$mediopago->nro_transaccion}}</td>
                        <td><a href="{{ route('MedioPago.edit',$mediopago->id_mediopago)}}" class="btn btn-primary">Editar</a></td>
                        <td>
                            <form action="{{ route('MedioPago.destroy', $mediopago->id_mediopago)}}" method="post">
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
                <form action="{{ route('MedioPago.create')}}" method="get" >
                    <button class="btn btn-primary">Agregar</button>
                </form>
                <br>
            </div>
@endsection