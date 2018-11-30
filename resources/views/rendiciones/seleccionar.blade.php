@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <div class="card">
                    <div class="card-header">Seleccione fecha de inicio y fin</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('Rendicion') }}" >
                            @csrf
                            <div class="form-group">
                                <label for="quantity">Desde:</label>
                                <input type="date" class="form-control" name="inicio"/>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Hasta:</label>
                                <input type="date" class="form-control" name="fin"/>
                            </div>
                            <button type="submit" class="btn btn-primary">Continuar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection