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
            <div class="card uper">
                <div class="card-header">
                    Nuevo medio de pago
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
                    <form method="post" action="{{ route('MedioPago.store') }}" enctype="multipart/form-data">
                        <div class="form-group">
                            @csrf
                            <label for="name">Medio:</label>
                            <input type="text" class="form-control" name="medio"/>
                        </div>
                        <div class="form-group">
                            @csrf
                            <label for="name">Banco:</label>
                            <input type="text" class="form-control" name="banco"/>
                        </div>
                        <div class="form-group">
                            @csrf
                            <label for="name">Numero de cuenta:</label>
                            <input type="text" class="form-control" name="nro_cuenta"/>
                        </div>
                        <div class="form-group">
                            @csrf
                            <label for="name">Numero de Transaccion:</label>
                            <input type="text" class="form-control" name="nro_transaccion"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection