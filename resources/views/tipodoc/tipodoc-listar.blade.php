@extends('layouts.app')

@section('content')
    <!-- proveedores -->
    <div class="page-content">
        <div class=" android-more-section">
            <h1 class="article-h1">Lista de Tipos de Documento</h1>
            <div class="mdl-grid">
                <table class="mdl-data-table mdl-shadow--2dp" >
                    <thead>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric">Nombre</th>
                        <th class="mdl-data-table__cell--non-numeric">Editar</th>
                        <th class="mdl-data-table__cell--non-numeric">Eliminar</th>
                    </tr>
                    </thead>
                    @foreach($tipos as $tipo)
                        <tbody>
                        <tr>
                            <td class="mdl-data-table__cell--non-numeric">{{$tipo->nombre_tipodoc}}</td>
                            <td class="mdl-data-table__cell--non-numeric">
                                <a href="{!! route('editartipodoc', ['id_tipodoc'=>$tipo->id_tipodoc]) !!}"><button><i class="material-icons">perm_identity </i></button></a>
                            </td>
                            <td class="mdl-data-table__cell--non-numeric">
                                <a href="{!! route('eliminartipodoc', ['id_tipodoc'=>$tipo->id_tipodoc]) !!}"><button><i class="material-icons">perm_identity </i></button></a>
                            </td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
            <div class="mdl-grid">
                <a href="{{ route('home') }}">
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                        Volver
                    </button>
                </a>
            </div>
            <br>
            <form action="{{ route('crearTipoDoc')}}" method="get">
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Agregar</button>
            </form>
            <br>
        </div>
    </div>
@endsection
