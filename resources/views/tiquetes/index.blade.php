@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb text-center">
            <div class="text-center">
                <h1>Tiquetes</h1>
            </div>

        </div>
    </div>
    @if ($message = Session::get('Exito'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @elseif ($message = Session::get('Fracaso'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif



    <div class="col-md-10 offset-1 ">
        @if(1==1)
        <br>
            <div class=" col-xs-12 col-sm-12 col-md-7 col-lg-7 offset-lg-3 offset-md-3">
                <div class="jumbotron text-center">
                    <div class="table-responsive">
                        <br class="table">
                        <thead>
                        <tr>
                            <th>Id tiquete</th>
                            <th>Id Evento</th>
                            <th>Fecha Limite</th>
                            <th>Precio</th>
                        </tr>
                        </thead>
                        <tbody>
                        <div class="col-md-6">
                            @foreach ($tiquetes as $tiquete)
                                <tr>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <div class="col-4">
                                            <td> {{$tiquete->id}}</td>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <div class="col-4">
                                            <td> {{$tiquete->evento_id}}</td>
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
                                </tr>
                                <form action="{{ route('tiquetes.cancelar',$tiquete->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Cancelar</button>
                                </form>
                                <form action="{{ route('tiquetes.mostrar_pago',$tiquete->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-info">Pagar</button>
                                </form>
                            @endforeach
                        </div>


                        </tbody>

                    </div>
                </div>
            </div>
            </br>
        @endif
    </div>


@endsection