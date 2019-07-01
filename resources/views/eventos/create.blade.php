@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Registrar Evento</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('eventos.index') }}"> Volver</a>
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

    <form action="{{ route('eventos.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" required autofocus>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Lugar:</strong>
                    <select name="lugar_id" required>
                        <option value="" disabled selected>Seleccionar lugar</option>
                        @foreach ($lugares->all() as $lugar)
                            <option value="<?php echo $lugar['id'];?>">{{$lugar['name']}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fecha:</strong>
                    <input type="date" name="fecha" class="form-control" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Hora:</strong>
                    <input type="time" name="hora" class="form-control" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Precios:</strong>
                    <input type="text" name="precios" class="form-control" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Registrar evento</button>
            </div>
        </div>

    </form>
@endsection

