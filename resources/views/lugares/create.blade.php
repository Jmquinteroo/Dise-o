@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb text-center">
            <div class="text-center">
                <h1>Registro de lugares</h1>
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
        <form action="{{ route('lugares.store') }}" method="POST">
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

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group text-center">
                        <strong>Tipo:</strong>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 dropdown show text-center">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tipo de lugar
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" id="estadio" >Estadio</a>
                        <a class="dropdown-item" id="teatro">Teatro</a>
                    </div>
                </div>

{{--                <div class="col-xs-12 col-sm-12 col-md-12 text-center">--}}
{{--                    <div class="dropdown">--}}
{{--                        <strong>Tipo:</strong>--}}
{{--                        <select name="Tipo" required>--}}
{{--                            <option id="estadio"> Estadio </option>--}}
{{--                            <option id="teatro"> Teatro </option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                @if()--}}
{{--                @endif--}}

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group text-center">
                        <strong>Capacidad:</strong>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group text-center">
                        <input type="text" name="capacidad" class="form-control" placeholder="Capacidad" required
                               autofocus>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group text-center">
                        <strong>Dirección:</strong>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group text-center">
                        <input type="text" name="direccion" class="form-control" placeholder="Dirección" required
                               autofocus>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group text-center">
                        <strong>Barrio:</strong>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group text-center">
                        <input type="text" name="barrio" class="form-control" placeholder="Barrio" required autofocus>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group text-center">
                        <strong>Sectores:</strong>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group text-center">
                        <input type="text" name="sectores" class="form-control" placeholder="Sectores" required
                               autofocus>
                    </div>
                </div>


                {{--            <div class="col-md-6 offset-3">--}}
                {{--                <div class="form-group">--}}
                {{--                    <strong>nombre:</strong>--}}
                {{--                    <input type="text" name="nombre" class="form-control" required>--}}
                {{--                </div>--}}
                {{--            </div>--}}
                {{--            <div class="col-md-6 offset-3">--}}
                {{--                <div class="form-group">--}}
                {{--                    <strong>capacidad:</strong>--}}
                {{--                    <input type="text" name="capacidad" class="form-control" required>--}}
                {{--                </div>--}}
                {{--            </div>--}}
                {{--            <div class="col-md-6 offset-3">--}}
                {{--                <div class="form-group">--}}
                {{--                    <strong>direccion:</strong>--}}
                {{--                    <input type="text" name="direccion" class="form-control" required>--}}
                {{--                </div>--}}
                {{--            </div>--}}
                {{--            <div class="col-md-6 offset-3">--}}
                {{--                <div class="form-group">--}}
                {{--                    <strong>barrio:</strong>--}}
                {{--                    <input type="text" name="barrio" class="form-control" required>--}}
                {{--                </div>--}}
                {{--            </div>--}}
                {{--            <div class="col-md-6 offset-3">--}}
                {{--                <div class="form-group">--}}
                {{--                    <strong>sectores:</strong>--}}
                {{--                    <input type="text" name="sectores" class="form-control" required>--}}
                {{--                </div>--}}
                {{--            </div>--}}

                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">
                    <a class="btn btn-primary" href="{{ route('lugares.index') }}"> Volver</a>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">
                    <button type="submit" class="btn btn-primary">Registrar lugar</button>
                </div>
            </div>

        </form>

    </div>






@endsection
