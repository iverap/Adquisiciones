@extends('layouts.app')

@section('content')

    <div class="page-content">
        <div class=" android-more-section">
            <div class="mdl-grid">


                <div class="mdl-cell mdl-cell--8-col mdl-cell--4-col-phone">
                    <div class="demo-card-wide mdl-card mdl-shadow--2dp">s



                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">{{ __('Editar Proveedor') }}</div>
                                    <div class="card-body">
                                        <form method="POST" action="{{route('editarProveedor.submit',$proveedor->id)}}">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="nombre_proveedor" class="col-md-4 col-form-label text-md-right">{{ __('nombre_proveedor') }}</label>
                                                <div class="col-md-6">
                                                    <input id="nombre_proveedor" type="text" class="form-control{{ $errors->has('nombre_proveedor') ? ' is-invalid' : '' }}" name="nombre_proveedor" value="{{ old('nombre_proveedor') }}" required autofocus>

                                                    @if ($errors->has('nombre_proveedor'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('nombre_proveedor') }}</strong>
                                                         </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="rut_proveedor" class="col-md-4 col-form-label text-md-right">{{ __('Rut Proveedor') }}</label>
                                                <div class="col-md-6">
                                                    <input id="rut_proveedor" type="text" class="form-control{{ $errors->has('rut_proveedor') ? ' is-invalid' : '' }}" name="rut_proveedor" value="{{ old('rut_proveedor') }}" required autofocus>

                                                    @if ($errors->has('rut_proveedor'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('rut_proveedor') }}</strong>
                                                         </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <br>
                                            <div class="form-group row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Registrar') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection
