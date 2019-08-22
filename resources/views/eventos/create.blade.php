@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h1>Registro de eventos</h1>
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
    <div class="col-md-10">
        <form action="{{ route('eventos.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group text-center">
                        <strong>Nombre:</strong>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group text-center">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre" required autofocus>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <div class="form-group">
                        <strong>Lugar:</strong>
                        <select name="lugar_id" required>
                            <option value="" disabled selected>Seleccionar lugar</option>
                            @foreach ($lugares->all() as $lugar)
                                <option value="{{$lugar['id']}}">{{$lugar['nombre']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group text-center">
                        <strong>Fecha de inicio:</strong>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group text-center">
                        <input type="date" name="fecha_inicio" class="form-control" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group text-center">
                        <strong>Fecha fin:</strong>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group text-center">
                        <input type="date" name="fecha_fin" class="form-control" required>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group text-center">
                        <strong>Hora:</strong>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group text-center">
                        <input type="time" name="hora" class="form-control" required>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group text-center">
                        <strong>Precios:</strong></div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group text-center">
                        <input type="text" name="precios" class="form-control" required>
                    </div>
                </div>


                {{--            <div class="col-xs-12 col-sm-12 col-md-12">--}}
                {{--                <div class="form-group">--}}
                {{--                    <strong>Fecha:</strong>--}}
                {{--                    <input type="date" name="fecha" class="form-control" required>--}}
                {{--                </div>--}}
                {{--            </div>--}}
                {{--            <div class="col-xs-12 col-sm-12 col-md-12">--}}
                {{--                <div class="form-group">--}}
                {{--                    <strong>Hora:</strong>--}}
                {{--                    <input type="time" name="hora" class="form-control" required>--}}
                {{--                </div>--}}
                {{--            </div>--}}
                {{--            <div class="col-xs-12 col-sm-12 col-md-12">--}}
                {{--                <div class="form-group">--}}
                {{--                    <strong>Precios:</strong>--}}
                {{--                    <input type="text" name="precios" class="form-control" required>--}}
                {{--                </div>--}}
                {{--            </div>--}}

                {{--            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">--}}
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">
                    <a class="btn btn-primary" href="{{ route('eventos.index') }}"> Volver</a>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">
                    <button type="submit" class="btn btn-primary btn-success">Registrar evento</button>
                </div>
                {{--            </div>--}}
                {{--            <div class="pull-right">--}}
                {{--                <a class="btn btn-primary" href="{{ route('eventos.index') }}"> Volver</a>--}}
                {{--            </div>--}}
                {{--            <div class="col-xs-12 col-sm-12 col-md-12 text-right">--}}
                {{--                <button type="submit" class="btn btn-primary btn-success" >Registrar evento</button>--}}
                {{--            </div>--}}
            </div>

        </form>

    </div>

@endsection

