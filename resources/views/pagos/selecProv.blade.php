@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Seleccione 1 Proveedor</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('Pago.proveedor') }}" >
                            @csrf
                            <div class="form-group">
                                <label for="proveedor">Proveedor:</label>
                                <select name="proveedor" id="proveedor" class="form-control">
                                    @foreach($proveedores as $proveedore)
                                        <option value="{{$proveedore->id_proveedor}}">{{$proveedore->nombre_proveedor}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Continuar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection