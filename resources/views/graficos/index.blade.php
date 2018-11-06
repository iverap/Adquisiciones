@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Pagos Mensuales</div>
                    <div class="card-body">

                        {!! $chart->container() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! $chart->script() !!}
@endsection