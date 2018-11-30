@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <form method="post" action="{{ route('Pago.store') }}">
                    @csrf
                    <div class="card uper">
                        <div class="card-header">
                            Datos del Pago
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        @csrf
                                        <label for="banco">Banco:</label>
                                        <select name="banco" id="banco" class="form-control">
                                            <option>Santander</option>
                                            <option>Banco Estado</option>
                                            <option>Banco de Chile</option>
                                            <option>BCI</option>
                                            <option>BBVA</option>
                                            <option>CORP-BANCA</option>
                                            <option>BICE</option>
                                            <option>Banco ITAU</option>
                                            <option>Banco Security</option>
                                            <option>Banco Falabella</option>
                                            <option>Banco Ripley</option>
                                            <option>Banco Consorcio</option>
                                            <option>Banco Paris</option>
                                            <option>COOPEUCH</option>
                                            <option>MUFG BANK LTD</option>
                                            <option>HSBC BANK Chile</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="fecha_pago">Fecha de Pago:</label>
                                        <input type="date" class="form-control" name="fecha_pago"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="observacion">Observaciones:</label>
                                        <textarea class="form-control" rows="5" name="observacion"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="medio_pago">Medios de Pago:</label>
                                        <select name="medio_pago" id="medio_pago" class="form-control">
                                            @foreach($medio_pagos as $medio_pago)
                                                <option value="{{$medio_pago->id_mediopago}}">{{$medio_pago->medio}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="cuenta">Cuenta:</label>
                                        <select name="cuenta" id="cuenta" class="form-control">
                                            @foreach($cuentas as $cuenta)
                                                <option value="{{$cuenta->id_cuenta}}">{{$cuenta->nombre_cuenta}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nro_cuenta">Numero de cuenta:</label>
                                        <input type="text" class="form-control" name="nro_cuenta"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="nro_transaccion">Numero de Transaccion:</label>
                                        <input type="text" class="form-control" name="nro_transaccion"/>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <table id='tabla' class="table table-striped">
                        <thead>
                        <tr>
                            <td>Numero</td>
                            <td>Monto Total</td>
                            <td>Monto Restante</td>
                            <td>Monto a Pagar</td>
                            <td>Pago Total</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($documentos as $documento)
                            <tr>
                                <td>{{$documento->numero_documento}}</td>
                                <td>{{$documento->monto_documento}}</td>
                                <td>{{$documento->monto_restante}}</td>
                                <td>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" value="{{$documento->id_documento}}" name="ids[]"/>
                                        <label for="{{$documento->id_documento}}"> Monto a Pagar:</label>
                                        <input type="number" class="form-control" value="0" min="0" max="{{$documento->monto_restante}}" id="{{$documento->id_documento}}" name="montos[]"/>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="checkbox"> Pago Total:</label>
                                        <input type="checkbox" name="checkfield" id="checkbox"  onchange="doalert(this,{{$documento->monto_restante}},{{$documento->id_documento}})"/>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <button type="submit" class="btn btn-primary">Agregar</button>
                </form>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

    <script>
        function doalert(checkboxElem,monto,id_campo) {
            var campo = document.getElementById(id_campo);
            if (checkboxElem.checked) {
                campo.value = monto;
                campo.readOnly = true;
            } else {
                campo.readOnly = false;
            }
        }
    </script>
@endsection