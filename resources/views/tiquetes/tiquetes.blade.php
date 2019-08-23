@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb text-center">
            <div class="text-center">
                <h1>Tiquetes</h1>
            </div>

        </div>
    </div>



    <div class="col-md-10 offset-1 ">
        @if(1==1)
        <br>
            <div class=" col-xs-12 col-sm-12 col-md-7 col-lg-7 offset-lg-3 offset-md-3">
                <div class="jumbotron text-center">
                    <div class="table-responsive">
                        <br class="table">
                        <thead>
                        <tr>
                            <th>Evento</th>
                            <th>Fecha Limite</th>
                            <th>Precio</th>
                        </tr>
                        </thead>
                        <div class="col-md-6">
                            <tbody>
                            @foreach($tiquetes as $tiquete)
                                <tr>
                                    <br>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <div class="col-4">
                                            <td> {{$evento_nombre}}</td>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <div class="col-4">
                                            <td> {{$tiquete->fecha_limite}}</td>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <div class="col-4">
                                            <td> {{$tiquete->precio}}</td>
                                        </div>
                                    </div>

                                    </br>


                                    <label>{{ $lugar->name }}</label>
                                </tr>
                            @endforeach
                            </tbody>
                        </div>
                        </br>
                    </div>
                </div>
            </div>
            </br>
        @endif
    </div>

    <form method="get" action="{{route('lugares.create')}}">
        @csrf
        <div class="form-group row mb-0 text-center">
            <div class="text-center">
                <button type="submit" class="btn btn-primary">
                    {{ __('Agregar lugar') }}
                </button>
            </div>
        </div>
    </form>



    </div>

    {{--    <div class="col-md"></div>--}}

    {{--    </div>--}}
    {{--    </div>--}}

@endsection