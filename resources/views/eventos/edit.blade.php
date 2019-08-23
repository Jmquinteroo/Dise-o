@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Evento</h2>
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

    <form action="{{ action('evento\Admin_Eventos@update',$evento->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre" value="{{ $evento->nombre }}" class="form-control" placeholder="Nombre" required autofocus>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Lugar:</strong>
                    <select name="lugar_id" required>
                        <option value="" disabled selected>Seleccionar lugar</option>
                        @foreach ($lugares->all() as $lugar)
                            <option value="{{ $lugar->id }}">{{$lugar['nombre']}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fecha de inicio:</strong>
                    <input type="date" name="fecha_inicio" class="form-control" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fecha fin:</strong>
                    <input type="date" name="fecha_fin" class="form-control" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Hora:</strong>
                    <input type="time" name="hora"  class="form-control" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Precios:</strong>
                    <input type="text" name="precios" value="{{ $evento->precios }}" class="form-control" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Modificar evento</button>
            </div>
        </div>

    </form>
@endsection