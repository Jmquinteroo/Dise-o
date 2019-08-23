@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h1>Información de pago</h1>
            </div>

        </div>
    </div>


    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">
        <a class="btn btn-primary" href="{{ route('eventos.index') }}"> Volver</a>
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
    @if ($message = Session::get('Exito'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @elseif ($message = Session::get('Error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="col-md-10">
        <form action="{{ route('tiquete.pagar', [$tiquete]) }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group text-center">
                        <strong>Tipo de tarjeta:</strong>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group text-center">
                        <select name="tipo_tarjeta" required>
                            <option value="" disabled selected>Seleccione el tipo de Tarjeta</option>
                            <option value="debito">Tarjeta débito</option>
                            <option value="credito">Tarjeta crédito</option>
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <div class="form-group text-center">
                        <strong>Número de tarjeta:</strong>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group text-center">
                        <input type="number" name="numero_tarjeta" class="form-control" required>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <div class="form-group text-center">
                        <strong>Cédula del titular:</strong>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group text-center">
                        <input type="number" name="cedula" class="form-control" required>
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">
                    <button type="submit" class="btn btn-primary btn-success" name="tiquete" value={{$tiquete}}>Pagar</button>
                </div>
            </div>

        </form>

    </div>

@endsection