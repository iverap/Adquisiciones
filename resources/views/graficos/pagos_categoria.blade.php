@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Parametros de Filtrado</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('Grafico.categoria') }}" >
                            @csrf
                            <div class="form-group">
                                <label for="quantity">Desde:</label>
                                <input type="date" class="form-control" name="inicio"/>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Hasta:</label>
                                <input type="date" class="form-control" name="fin"/>
                            </div>
                            <div class="form-group">
                                <label for="categoria">Categoria:</label>
                                <select name="categoria" id="categoria" class="form-control">
                                    @foreach($categorias as $categoria)
                                        <option value="{{$categoria->id_categoria}}">{{$categoria->nombre_categoria}}</option>
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