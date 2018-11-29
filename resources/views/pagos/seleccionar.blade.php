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
        <form action="/Pago/create" method="POST" id="entriesSelected">
            @csrf
            <table id='tabla' class="table table-striped">
                <thead>
                    <tr>
                        <td>id</td>
                        <td>Numero</td>
                        <td>Proveedor</td>
                        <td>Fecha de Documento</td>
                        <td>Fecha de Vencimiento</td>
                        <td>Tipo</td>
                        <td>Monto</td>
                        <td>Monto Pagado</td>
                        <td>Monto Restante</td>
                        <td>Accion</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($documentos as $documento)
                        <tr data-id={{$documento->id_documento}}>
                            <td>{{$documento->id_documento}}</td>
                            <td>{{$documento->numero_documento}}</td>
                            <td>{{$documento->prov->nombre_proveedor}}</td>
                            <td>{{$documento->fecha_documento}}</td>
                            <td>{{$documento->fecha_vencimiento}}</td>
                            <td>{{$documento->tipodoc->nombre_tipodoc}}</td>
                            <td>{{$documento->monto_documento}}</td>
                            <td>{{$documento->monto_pagado}}</td>
                            <td>{{$documento->monto_restante}}</td>
                            <td><a href="{{ route('Documento.show',$documento->documento_original)}}" class="btn btn-primary">Ver Imagen</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br><br>
            <button id="submit">Continuar a Pago</button>
            <br><br>
        </form>
    <div>

        <script>

            $(document).ready(function() {
                var table = $('#tabla').DataTable( {
                    "language": {
                        "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
                    },
                    "columnDefs": [
                        { "visible": false, "targets": 0 }
                    ]
                } );

                $('#tabla tbody').on('click', 'tr', function () {
                    $(this).toggleClass('selected');
                });

                $('#submit').click(function (e) {
                    e.preventDefault();
                    var selectedRowInputs = table.rows('.selected').data();

                    //use the serialized version of selectedRowInputs as the data
                    //to be sent to the AJAX request
                    console.log(selectedRowInputs);
                    //console.log('serlialized inputs: ',selectedRowInputs.serialize());
                    var ids = $.map(table.rows('.selected').data(), function (item) {
                        return item[0]
                    });
                    console.log(ids)
                    alert(table.rows('.selected').data().length + ' row(s) selected');
                    var datos = JSON.stringify(ids);

                    window.location = '/Adquisiciones/public/Pago/pagar?datos='+datos;
                    /*
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });


                    $.ajax({
                        url: '/Adquisiciones/public/Pago/pagar',
                        type: 'POST',
                        data: JSON.stringify(selectedRowInputs),
                        //contentType: false,
                        //processData: false,
                        dataType: "JSON",
                        success: function (response) { // What to do if we succeed
                            console.log(response);
                        },
                        error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
                            console.log(JSON.stringify(jqXHR));
                            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                        }
                    });
                    */
                })

            });

            /*
            $('#tabla').DataTable( {
                select: {
                    style: 'multi'
                },
                columnDefs: [
                    {
                        "targets": [ 0 ],
                        "visible": false,
                        "searchable": false
                    }
                ],
                dom: 'Bfrtip',
                buttons: [
                    'csvHtml5',
                ]

            } );
            */
            </script>
@endsection