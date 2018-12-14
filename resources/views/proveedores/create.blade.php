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
            <div class="col-md-4">
                <div class="card uper">
                    <div class="card-header">
                        Nuevo Proveedor
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div><br />
                        @endif
                        <form method="post" action="{{ route('Proveedores.store') }}">
                            <div class="form-group">
                                @csrf
                                <label for="name">Nombre:</label>
                                <input type="text" class="form-control" name="nombre_proveedor"/>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Rut:</label>
                                <input type="text" class="form-control" name="rut_proveedor"/>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Numero de Cuenta:</label>
                                <input type="text" class="form-control" name="nro_cuenta"/>
                            </div>
                            <div class="form-group">
                                <label for="banco">Banco:</label>
                                <select name="banco" id="banco" class="form-control">
                                    <option>Santander</option>
                                    <option>Banco Estado</option>
                                    <option>Banco de Chile</option>
                                    <option>BCI</option>
                                    <option>BBVA</option>
                                    <option>Scotibank</option>
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
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
            </div>
        </div>
    </div>

@endsection