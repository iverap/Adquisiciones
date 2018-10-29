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
                    <td>Documentos Pagados</td>
                    <td>Monto</td>
                    <td>Fecha Pago</td>
                    <td>Monto Total</td>
                    <td>Cuenta</td>
                    <td>Medio Pago</td>
                    <td>Banco</td>
                    <td>Nro Transaccion</td>
                    <td>Nro de Cuenta</td>
                    <td>Observacion</td>
                    {{--<td colspan="2">Accion</td>--}}
                </tr>
            </thead>
            <tbody>
                @foreach($pagos as $pago)
                    <tr>
                        <td>
                            @foreach($pago->documentos as $documento)
                                {{$documento->numero_documento}}
                                <br/>
                            @endforeach
                        </td>
                        <td>
                            @foreach($pago->documentos as $documento)
                                ${{$documento->pivot->monto}}
                                <br/>
                            @endforeach
                        </td>
                        <td>{{$pago->fecha_pago}}</td>
                        <td>${{$pago->monto}}</td>
                        <td>{{$pago->cuenta}}</td>
                        <td>{{$pago->medio_pago}}</td>
                        <td>{{$pago->banco}}</td>
                        <td>{{$pago->nro_transaccion}}</td>
                        <td>{{$pago->nro_cuenta}}</td>
                        <td>{{$pago->observacion}}</td>
                        {{--<td><a href="{{ route('Documento.edit',$documento->id_documento)}}" class="btn btn-primary">Editar</a></td>
                        <td>
                            <form action="{{ route('Documento.destroy', $documento->id_documento)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Anular</button>
                            </form>
                        </td>
                        <td><a href="{{ route('Documento.show',$documento->documento_original)}}" class="btn btn-primary">Ver Imagen</a></td>
                        --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection