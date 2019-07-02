@extends('layouts.app')

@section('content')

<div class="card-body">
    <form method="get" action="{{route('lugares.create')}}">
        @csrf


        <div class="form-group row mb-0">
            <div class="col-md-7 offset-md-6">
                <button type="submit" class="btn btn-primary">
                    {{ __('Registrar') }}
                </button>
            </div>
        </div>
    </form>

    @if ($message = Session::get('Exito'))
        <div class="alert alert-success col-lg-7 offset-3">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if(isset($lugares))
        <br>

        <div class=" col-xs-12 col-sm-12 col-md-7 col-lg-7 offset-lg-3 offset-md-3" >
        <div class="jumbotron text-center">
            <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Capacidad</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Barrio</th>
                    <th scope="col">Sectores</th>
                </tr>
                </thead>
                <tbody>

                @foreach($lugares as $lugar)


                <tr>

                    <td> {{$lugar->nombre}}</td>
                    <td> {{$lugar->capacidad}}</td>
                    <td> {{$lugar->direccion}}</td>
                    <td> {{$lugar->barrio}}</td>
                    <td> {{$lugar->sectores}}</td>

                    <td>

                        <form action="{{ route('lugares.destroy',$lugar->id) }}" method="POST">


                            <a class="btn btn-primary" href="{{ route('lugares.edit',$lugar->id) }}">Edit</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>


                    </td>
                </tr>





            {{--<label>{{ $lugar->name }}</label>--}}
        @endforeach
                </tbody>

            </table>
            </div>
    @endif
        </div>
        </div>

</div>
@endsection