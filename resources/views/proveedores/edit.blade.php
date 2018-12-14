@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Editar Proveedor
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
            <form method="post" action="{{ route('Proveedores.update', $proveedor->id_proveedor) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name">Nombre Proveedor:</label>
                    <input type="text" class="form-control" name="nombre_proveedor" value={{ $proveedor->nombre_proveedor }} />
                </div>
                <div class="form-group">
                    <label for="quantity">Rut Proveedor:</label>
                    <input type="text" class="form-control" name="rut_proveedor" value={{ $proveedor->rut_proveedor }} />
                </div>
                <div class="form-group">
                    <label for="quantity">Numero de Cuenta:</label>
                    <input type="text" class="form-control" name="nro_cuenta" value={{ $proveedor->nro_cuenta }} />
                </div>
                <div class="form-group">
                    <label for="banco">Banco:</label>
                    <select class="form-control" name="banco" >
                        <option value="{{$proveedor->banco}}" selected=selected >{{$proveedor->banco}}</option>
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
                <button type="submit" class="btn btn-primary">Editar</button>
            </form>
        </div>
    </div>
@endsection