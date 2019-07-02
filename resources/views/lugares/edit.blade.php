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
                <strong>name:</strong>
                <input type="text" name="nombre" value="{{ $lugar->nombre }}"  class="form-control" required>
            </div>
        </div>
        <div class="col-md-6 offset-3">
            <div class="form-group">
                <strong>capacidad:</strong>
                <input type="number" name="capacidad" value="{{ $lugar->capacidad }}"  class="form-control" required>
            </div>
        </div>
        <div class="col-md-6 offset-3">
            <div class="form-group">
                <strong>direccion:</strong>
                <input type="text" value="{{$lugar->direccion }}" name="direccion" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6 offset-3">
            <div class="form-group">
                <strong>barrio:</strong>
                <input type="text" name="barrio" value="{{ $lugar->barrio }}" class="form-control" required>
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