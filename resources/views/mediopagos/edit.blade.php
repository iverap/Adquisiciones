@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="card uper">
                <div class="card-header">
                    Editar Medio de pago
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
                        <form method="post" action="{{ route('MedioPago.update', $mediopago->id_mediopago) }}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="name">Medio de Pago:</label>
                            <input type="text" class="form-control" name="medio" value="{{ $mediopago->medio }}"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection