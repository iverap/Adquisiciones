@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                        <br>
                        <form action="{{ route('admin.mantenedorProveedor')}}" method="get">
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">MANTENEDOR PROVEEDOR</button>
                      </form>
                        <br>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
