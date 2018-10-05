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
                    Nueva Categoria
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
                    <form method="post" action="{{ route('Categoria.store') }}" enctype="multipart/form-data">
                        <div class="form-group">
                            @csrf
                            <label for="name">Nombre Categoria:</label>
                            <input type="text" class="form-control" name="nombre_categoria"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection