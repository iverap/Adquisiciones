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
                    <div class="card-header">Filtros para busqueda de documentos</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('Documento.busqueda') }}" >
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
                                <div class="form-group col-md-3">
                                    <label for="proveedor">Proveedor:</label>
                                    <select name="proveedor" id="proveedor" class="form-control">
                                        @foreach($proveedores as $proveedore)
                                            <option value="{{$proveedore->id_proveedor}}">{{$proveedore->nombre_proveedor}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="todos" id="checkbox"  onchange="doalert(this,'proveedor')"/>
                                    <label for="checkbox"> Todos</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="pagos" id="checkpago"/>
                                <label for="checkpago"> Incluir solo documentos con deuda</label>
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