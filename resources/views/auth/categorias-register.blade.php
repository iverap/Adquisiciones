@extends('layouts.app')

@section('content')

    <div class="page-content">
        <div class=" android-more-section">
         <!--   <h2 class="demo-title mdc-typography mdc-typography--headline6">{{ Auth::user()->username }}</h2> -->
                <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar Categoria') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('crearCategorias.submit') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nombre_categoria" class="col-md-4 col-form-label text-md-right">{{ __('Nombre:') }}</label>

                            <div class="col-md-6">
                                <input id="nombre_categoria" class="form-control{{ $errors->has('nombre_categoria') ? ' is-invalid' : '' }}" name="nombre_categoria" value="{{ old('nombre_categoria') }}" required>

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
                                    {{ __('Register') }}
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
@endsection
