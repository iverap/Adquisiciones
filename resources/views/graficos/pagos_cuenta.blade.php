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
                    <div class="card-header">Pagos por cuenta</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('Grafico.cuenta') }}" >
                            @csrf
                            <div class="form-group">
                                <label for="quantity">Desde:</label>
                                <input type="date" class="form-control" name="inicio"/>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Hasta:</label>
                                <input type="date" class="form-control" name="fin"/>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="cuenta">Cuenta:</label>
                                    <select name="cuenta" id="cuenta" class="form-control">
                                        @foreach($cuentas as $cuenta)
                                            <option value="{{$cuenta->id_cuenta}}">{{$cuenta->nombre_cuenta}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="checkbox" id="checkbox"  onchange="doalert(this,'cuenta')"/>
                                    <label for="checkbox"> Todas </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Continuar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function doalert(checkboxElem,id_campo) {
            var campo = document.getElementById(id_campo);
            if (checkboxElem.checked) {
                campo.disabled=true;
            } else {
                campo.disabled=false;
            }
        }
    </script>
@endsection