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

                                @foreach ($lugares as $lugar)
                                    <tr>
                                        <spam><b>Nombre :</b></spam>
                                        <td>{{ $lugar->nombre }}</td>


                                        <td>
                                            <form action="{{ route('lugares.destroy',$lugar->id) }}" method="POST">

{{--                                                <a class="btn btn-info" href="{{ route('eventos.show',$evento->id) }}">Detalle</a>--}}

                                                <a class="btn btn-primary" href="{{ route('lugares.edit',$lugar->id)  }}">Modificar</a>

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger">Desactivar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                {{--    </table>--}}

                                <div class="text-right">
                                    <a class="btn btn-success" href="{{ route('lugares.create') }}"> Agregar evento</a>
                                </div>
@endsection