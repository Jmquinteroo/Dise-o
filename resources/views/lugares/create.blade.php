@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb text-center">
            <div class="pull-left">
                <h2>Registrar Lugares</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('lugares.index') }}"> Volver</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> La información no se ingresó correctamente.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('lugares.store') }}" method="POST">
        @csrf

        <div class="form-group row">


            </div>
            <div class="col-md-6 offset-3">
                <div class="form-group">
                    <strong>nombre:</strong>
                    <input type="text" name="nombre" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6 offset-3">
                <div class="form-group">
                    <strong>capacidad:</strong>
                    <input type="text" name="capacidad" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6 offset-3">
                <div class="form-group">
                    <strong>direccion:</strong>
                    <input type="text" name="direccion" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6 offset-3">
                <div class="form-group">
                    <strong>barrio:</strong>
                    <input type="text" name="barrio" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6 offset-3">
                <div class="form-group">
                    <strong>sectores:</strong>
                    <input type="text" name="sectores" class="form-control" required>
                </div>
            </div>

            <div class="col-md-6 offset-3 text-center">
                <button type="submit" class="btn btn-primary">Registrar lugar </button>
            </div>
        </div>

    </form>




@endsection
