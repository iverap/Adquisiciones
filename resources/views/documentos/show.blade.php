@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="card bg-default">
                    <h5 class="card-header">
                        Imagen de documento
                    </h5>
                    <div class="card-body">
                        <img src="{{$url}}" class="img-fluid" alt="Responsive image">
                    </div>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>
@endsection