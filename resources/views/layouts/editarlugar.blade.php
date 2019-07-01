@extends('layouts.app')

@section('content')

<div class="card-body">
    <form method="post" action="{{ action('lugar\registrarLugaresController@edit') }}">
        @csrf

        @if(isset($lugares))

        <div class="form-group row" >


            <div class="col-md-6">
                <input id="id" type="number" class="form-control @error('name') is-invalid @enderror" name="id" value="{{$idd}}"  required autocomplete="name" autofocus style="visibility:hidden">

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

        </div>



        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name1" type="text" class="form-control @error('name') is-invalid @enderror" name="name1" value="{{old('name')}}"  required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>


        @endif
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('capacidad') }}</label>

            <div class="col-md-6">
                <input id="capacidad" type="number" class="form-control @error('capacidad') is-invalid @enderror" name="capacidad" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('direccion') }}</label>

            <div class="col-md-6">
                <input id="direccion" type="text" class="form-control @error('name') is-invalid @enderror" name="direccion" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('barrio') }}</label>

            <div class="col-md-6">
                <input id="barrio" type="text" class="form-control @error('name') is-invalid @enderror" name="barrio" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('sectores') }}</label>

            <div class="col-md-6">
                <input id="sectores" type="number" class="form-control @error('name') is-invalid @enderror" name="sectores" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

        </div>









        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Editar') }}
                </button>
            </div>
        </div>
    </form>

    @if(isset($lugares))
        <br>

        <div class=" col-xs-12 col-sm-12 col-md-7 col-lg-7 offset-lg-3 offset-md-3" >
        <div class="jumbotron text-center">


            <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>

                    <th scope="col">Nombre</th>
                    <th scope="col">Capacidad</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Barrio</th>
                    <th scope="col">Sectores</th>
                </tr>
                </thead>
                <tbody>

                @foreach($lugares as $lugar)

                    @if($lugar->id==$idd)
                <tr>
                    <td> {{$lugar->id}}</td>

                    <td> {{$lugar->name}}</td>
                    <td> {{$lugar->capacidad}}</td>
                    <td> {{$lugar->direccion}}</td>
                    <td> {{$lugar->barrio}}</td>
                    <td> {{$lugar->sectores}}</td>

                </tr>


                    @endif


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