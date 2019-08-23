@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Detalle Evento</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('eventos.index') }}"> Volver</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('Exito'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @elseif ($message = Session::get('Error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                {{ $evento->nombre }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Lugar:</strong>
                {{ $evento->lugar_id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Fecha inicio:</strong>
                {{ $evento->fecha_inicio }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Fecha fin:</strong>K
                {{ $evento->fecha_fin }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Hora:</strong>
                {{ $evento->hora }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Precios:</strong>
                {{ $evento->precios }}
                <form action="{{ route('tiquetes.mostrar_pago',[$tiquete]) }}" method="POST">
                    @csrf
                    @if (auth()->check())
                        <button type="submit" class="btn btn-primary btn-success">Pagar tiquete</button>
                    @endif
                </form>

            </div>
        </div>
    </div>
@endsection
