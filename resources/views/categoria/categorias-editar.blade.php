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
                                    <div class="card-header">{{ __('Editar Categoria') }}</div>
                                    <div class="card-body">
                                        <form method="POST" action="{{route('editarCategorias.submit',$categorias->id)}}">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="nombre_categoria" class="col-md-4 col-form-label text-md-right">{{ __('nombre_categoria') }}</label>
                                                <div class="col-md-6">
                                                    <input id="nombre_categoria" type="text" class="form-control{{ $errors->has('nombre_categoria') ? ' is-invalid' : '' }}" name="nombre_categoria" value="{{ old('nombre_categoria') }}" required autofocus>

                                                    @if ($errors->has('nombre_categoria'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('nombre_categoria') }}</strong>
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
