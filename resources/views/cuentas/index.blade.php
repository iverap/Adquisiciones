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
                    <td>Nombre Cuenta</td>

                    <td colspan="2">Accion</td>
                </tr>
            </thead>
            <tbody>
                @foreach($cuentas as $cuenta)
                    <tr>
                        <td>{{$cuenta->nombre_cuenta}}</td>
                        <td><a href="{{ route('Cuenta.edit',$cuenta->id_cuenta)}}" class="btn btn-primary">Editar</a></td>
                        <td>
                            <form action="{{ route('Cuenta.destroy', $cuenta->id_cuenta)}}" method="post">
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
            <form action="{{ route('Cuenta.create')}}" method="get" >
                <button class="btn btn-primary">Agregar</button>
            </form>
            <br>
    </div>
@endsection