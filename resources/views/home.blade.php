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
                    <h2 class="mb-4"></h2> {{-- espacio--}}
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
                    <h2 class="mb-4"></h2> {{-- espacio--}}
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
                    <h2 class="mb-4"></h2> {{-- espacio--}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
