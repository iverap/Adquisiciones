@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">Sistemas</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">Documentos</div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <a class="dropdown-item" href="/Adquisiciones/public/Documento/create">Nuevo Documento</a>
                                        <a class="dropdown-item" href="/Adquisiciones/public/Documento/">Listar Documentos</a>
                                        <a class="dropdown-item" href="/Adquisiciones/public/Documento/buscar">Buscar Documentos</a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">Pagos</div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <a class="dropdown-item" href="/Adquisiciones/public/Pago/proveedor">Nuevo Pago</a>
                                        <a class="dropdown-item" href="/Adquisiciones/public/Pago/">Lista Pagos</a>
                                        <a class="dropdown-item" href="/Adquisiciones/public/Pago/buscar">Buscar Pagos</a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2 class="mb-4"></h2> {{-- espacio--}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">Estadisticas</div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <a class="dropdown-item" href="/Adquisiciones/public/Grafico/pagos_cuentas">Pagos por Cuenta</a>
                                        <a class="dropdown-item" href="/Adquisiciones/public/Grafico/seleccionar">Pagos a Proveedor</a>
                                        <a class="dropdown-item" href="/Adquisiciones/public/Grafico/pagos_categoria">Pagos por Categoria</a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">Otros</div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <a class="dropdown-item" href="/Adquisiciones/public/Rendicion/seleccionar">Rendicion</a>
                                        <a class="dropdown-item" href="/Adquisiciones/public/Categoria">Listar Categorias</a>
                                        <a class="dropdown-item" href="/Adquisiciones/public/MedioPago">Listar Medios de pago</a>
                                        <a class="dropdown-item" href="/Adquisiciones/public/Compra">Listar Compras</a>
                                        <a class="dropdown-item" href="/Adquisiciones/public/TipoDocumento">Listar Tipos de Documento</a>
                                        <a class="dropdown-item" href="/Adquisiciones/public/Cuenta">Listar Cuenta</a>
                                        <a class="dropdown-item" href="/Adquisiciones/public/Proveedores/create">Nuevo Proveedor</a>
                                        <a class="dropdown-item" href="/Adquisiciones/public/Proveedores/">Listado de Proveedores</a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--
                    <h2 class="mb-4"></h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">Sistemas</div>
                                <div class="card-body">

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">Sistemas</div>
                                <div class="card-body">

                                </div>
                            </div>
                        </div>
                    </div>

                    <h2 class="mb-4"></h2>
                    --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
