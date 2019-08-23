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
        <form action="{{ action('lugar\Admin_Lugares@crearsectores')}}" method="POST">
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

                <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                    <div class="form-group">
                        <strong>Tipo de lugar:</strong>
                        <select name="tipo_lugar" required>
                            <option value="" disabled selected>Seleccionar</option>
                            {{--@foreach ($lugares->all() as $lugar)--}}
                            <option value="Estadio">Estadio</option>
                            <option value="Teatro">Teatro</option>
                            {{--@endforeach--}}
                        </select>
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

                {{--<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">--}}
                    {{--<div class="form-group text-center">--}}
                        {{--<strong>Capacidad:</strong>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">--}}
                    {{--<div class="form-group text-center">--}}
                        {{--<input type="number" name="capacidad" class="form-control" placeholder="Capacidad" required>--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group text-center">
                        <strong>Dirección:</strong>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group text-center">
                        <input type="text" name="direccion" class="form-control" placeholder="Dirección" required>
                    </div>
                </div>

                {{--<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">--}}
                    {{--<div class="form-group text-center">--}}
                        {{--<strong>Barrio:</strong>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">--}}
                    {{--<div class="form-group text-center">--}}
                        {{--<input type="text" name="barrio" class="form-control" placeholder="Barrio" required>--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group text-center">
                        <strong>Sectores:</strong>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group text-center">
                        <input type="number" name="sectores" class="form-control" placeholder="Sectores" required>
                    </div>
                </div>
 {{--<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">--}}
                    {{--<div class="form-group text-center">--}}
                        {{--<input type="number" name="sectores" class="form-control" placeholder="Sectores" required--}}
                               {{--onchange="mifuncion(this, 'tabla_sectores')">--}}
                    {{--</div>--}}
                {{--</div>--}}




                {{--<div id="lista_sectores" class="col-xs-12 col-sm-12 col-md-12 col-lg-10 offset-2">--}}
                    {{--<table id="tabla_sectores" class="table table-bordered">--}}
                        {{--<thead style="background-color: gray; text-align: center">--}}
                            {{--<tr>--}}
                                {{--<td>nombre</td>--}}
                                {{--<td>capacidad</td>--}}
                            {{--</tr>--}}
                        {{--</thead>--}}

                        {{--<tr>--}}
                            {{--<td> <input type="text" id="nombre1[]" name="nombre1[]" class="form-control" placeholder="Nombre" required autofocus></td>--}}
                            {{--<td><input type="number" id="nombre2[]" name="nombre2[]" class="form-control" placeholder="capacidad" required autofocus></td>--}}
                        {{--</tr>--}}
                    {{--</table>--}}





                    {{--<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">--}}
                        {{--<div class="form-group text-center">--}}
                            {{--<strong>Nombre:</strong>--}}
                        {{--</div>--}}
                    {{--</div>--}}


                {{--</div>--}}

                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">
                    <a class="btn btn-primary" href="{{ route('lugares.index') }}"> Volver</a>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">
                    <button type="submit" class="btn btn-primary">Registrar lugar</button>
                </div>
            </div>

        </form>

    </div>



    <script>
        function mifuncion(obj, id_table) {


            if ($(obj).val() >0) {
                let a = '<thead style="background-color: gray; text-align: center">\n' +
                    '<tr>\n' +
                    '                            <td>nombre</td>\n' +
                    '                            <td>capacidad</td>\n' +
                    '                        </tr>\n' +
                    '                        </thead>';


                for (paso = 0; paso < $(obj).val(); paso++) {
                    // Se ejecuta 5 veces, con valores desde paso desde 0 hasta 4.
                    a += '<tr>\n' +
                        '                        <td> <input type="text" id="nombresector[]" name="nombresector[]" class="form-control" placeholder="Nombresector" required autofocus></td>\n' +
                        '                            <td><input type="number" id="capacidadsector[]" name="capacidadsector[]" class="form-control" placeholder="capacidadsector" required autofocus></td>\n' +
                        '                        </tr>';
                }
                $('#' + id_table).html(a);
            }else{
                $('#' + id_table).html('');
            }
        }



    </script>


@endsection