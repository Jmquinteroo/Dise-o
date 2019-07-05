@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb text-center">
            <div class="text-center">
                <h1>Lugares</h1>
            </div>

        </div>
    </div>

    @if ($message = Session::get('Exito'))
        <div class="alert alert-success col-lg-7 offset-3">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">
{{--    <div class="col-md-10 offset-1 ">--}}
            @if(isset($lugares))
{{--                <br>--}}

                {{--            <div class=" col-xs-12 col-sm-12 col-md-7 col-lg-7 offset-lg-3 offset-md-3">--}}
                {{--                <div class="jumbotron text-center">--}}
                {{--                    <div class="table-responsive">--}}
                {{--                        <table class="table">--}}
                {{--                            <thead>--}}
                {{--                <tr>--}}
{{--                <div>--}}
                    <spam>Nombre:</spam>

{{--                </div>--}}
{{--                </br>--}}
                {{--                                <th scope="col">Capacidad</th>--}}
                {{--                                <th scope="col">Direccion</th>--}}
                {{--                                <th scope="col">Barrio</th>--}}
                {{--                                <th scope="col">Sectores</th>--}}
                {{--                </tr>--}}
                {{--                            </thead>--}}
                {{--                <div class="col-md-6">--}}
                {{--            <tbody>--}}

                @foreach($lugares as $lugar)
                    {{--                        <tr>--}}
{{--                    <br>--}}
{{--                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">--}}

                        <label> {{$lugar->nombre}}</label>
{{--                    </div>--}}


                    {{--                                    <td> {{$lugar->capacidad}}</td>--}}
                    {{--                                    <td> {{$lugar->direccion}}</td>--}}
                    {{--                                    <td> {{$lugar->barrio}}</td>--}}
                    {{--                                    <td> {{$lugar->sectores}}</td>--}}

                    {{--                            <td>--}}
{{--                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">--}}
                        <form action="{{ route('lugares.destroy',$lugar->id) }}" method="POST">
                            <a class="btn btn-primary" href="{{ route('lugares.edit',$lugar->id) }}">Editar</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
{{--                    </div>--}}

                    {{--                    </td>--}}
                    {{--                </tr>--}}

                    {{--<label>{{ $lugar->name }}</label>--}}
                @endforeach
                {{--            </tbody>--}}

                {{--                </div>--}}

                {{--                        </table>--}}
                {{--                    </div>--}}
            @endif
            {{--                </div>--}}
{{--            <br>--}}

                <form method="get" action="{{route('lugares.create')}}">
                    @csrf
                    {{--            <div class="form-group row mb-0">--}}
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Agregar lugar') }}
                        </button>
                    </div>
                    {{--            </div>--}}
                </form>

        </div>

    </div>

{{--    <div class="col-md"></div>--}}

    {{--    </div>--}}
{{--    </div>--}}

@endsection