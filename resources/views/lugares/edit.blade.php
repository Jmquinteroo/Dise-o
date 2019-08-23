@extends('layouts.app')

@section('content')

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

    <form action="{{ action('lugar\Admin_Lugares@update', $lugar->id)}}" method="POST">
        @csrf


            @method('PUT')

        <div class="form-group row">





        <div class="col-md-6 offset-3">
            <div class="form-group">
                <strong>nombre:</strong>
                <input type="text" name="nombre" value="{{ $lugar->nombre }}"  class="form-control" required>
            </div>
        </div>

        <div class="col-md-6 offset-3">
            <div class="form-group">
                <strong>direccion:</strong>
                <input type="text" value="{{$lugar->direccion }}" name="direccion" class="form-control" required>
            </div>
        </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group text-center">
                    <strong>Tipo:</strong>
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">
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
        <div class="col-md-6 offset-3">
            <div class="form-group">
                <strong>sectores:</strong>
                <input type="number" name="sectores" value="{{ $lugar->sectores }}" class="form-control" required>
            </div>
        </div>

        <div class="col-md-6 offset-3 text-center">
            <button type="submit" class="btn btn-primary">Modificar lugar</button>
        </div>
        </div>

    </form>





@endsection