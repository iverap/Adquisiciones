@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="uper">
                @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div><br />
                @endif
                <table class="table table-striped">
                    <thead>
                    <tr>
                        {{--<td>ID</td>--}}
                        <td>Proveedor</td>
                        <td>RUT</td>
                        <td>Numero Cuenta</td>
                        <td>Banco</td>
                        <td colspan="2">Accion</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($proveedores as $proveedor)
                        <tr>
                           {{-- <td>{{$proveedor->id_proveedor}}</td>--}}
                            <td>{{$proveedor->nombre_proveedor}}</td>
                            <td>{{$proveedor->rut_proveedor}}</td>
                            <td>{{$proveedor->nro_cuenta}}</td>
                            <td>{{$proveedor->banco}}</td>
                            <td><a href="{{ route('Proveedores.edit',$proveedor->id_proveedor)}}" class="btn btn-primary">Editar</a></td>
                            <td>
                                <form action="{{ route('Proveedores.destroy', $proveedor->id_proveedor)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection