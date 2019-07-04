@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Eventos</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('eventos.create') }}"> Regitrar evento</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('Exito'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Lugar_id</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Precios</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($eventos as $evento)
            <tr>
                <td>{{ $evento->id }}</td>
                <td>{{ $evento->nombre }}</td>
                <td>{{ $evento->lugar_id }}</td>
                <td>{{ $evento->fecha }}</td>
                <td>{{ $evento->hora }}</td>
                <td>{{ $evento->precios }}</td>
                <td>
                    <form action="{{ route('eventos.destroy',$evento->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('eventos.show',$evento->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('eventos.edit',$evento->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>


@endsection