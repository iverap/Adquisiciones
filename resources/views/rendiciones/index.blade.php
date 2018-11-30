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
        <table id="tabla" class="table table-striped">
            <thead>
            <tr>
                <td>Tipo de documento</td>
                <td>N° Documento</td>
                <td>Fecha Documento</td>
                <td>Fecha Pago</td>
                <td>Descripcion Gasto</td>
                <td>Rut Proveedor</td>
                <td>Nombre Proveedor</td>
                <td>Monto Documento</td>
            </tr>
            </thead>
            <tbody>
            @foreach($documentos as $documento)
                <tr>
                    {{--<td>@foreach($documento->pagos as $pagos)
                            {{$pago->pagoss->nombre_cuenta}}
                        @endforeach
                    </td>--}}
                    <td>{{$documento->tipodoc->nombre_tipodoc}}</td>
                    <td>{{$documento->numero_documento}}</td>
                    <td>{{$documento->fecha_documento}}</td>

                    <td>@foreach($documento->pagos as $pago)
                            {{$pago->fecha_pago}}
                        @endforeach
                    </td>
                    <td>@foreach($documento->compras as $compra)
                            {{$compra->descripcion_gasto}}
                        @endforeach
                    </td>
                    <td>{{$documento->prov->rut_proveedor}}</td>
                    <td>{{$documento->prov->nombre_proveedor}}</td>
                    <td>${{$documento->monto_documento}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


    <script>
        $(document).ready(function() {
            $('#tabla').dataTable( {
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
                },
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excel',
                        text: 'Exportar a excel',
                        exportOptions: {
                            modifier: {
                                search: 'none'
                            }
                        }
                    }
                ]
            } );
        } )

    </script>

@endsection