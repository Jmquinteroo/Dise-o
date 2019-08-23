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
        @if(isset($lugar))
        <form action="{{ action('sector\Admin_Sector@store') }}" method="POST">
            @else
                <form action="{{ route('lugares.store') }}" method="POST">
                    @endif
            @csrf

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group text-center">
                        <input type="hidden" id="idlugar" value={{ $lugar->id }} name="idlugar" class="form-control" placeholder="Nombre" required autofocus>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group text-center">
                        <strong>Nombre:</strong>
                    </div>
                </div>  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group text-center">
                        <strong>capacidad:</strong>
                    </div>
                </div>

                @for($i=0;$i<$sectore;$i++)



                    <div class="col-xs-6 col-sm-6col-md-6 col-lg-5 offset-1">
                        <div class="form-group text-center">
                            <input type="text" id="nombresector[]" name="nombresector[]" class="form-control" placeholder="Nombre" required autofocus>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-5 offset-1">
                        <div class="form-group text-center">
                            <input type="number" id="capacidadsector[]" name="capacidadsector[]" class="form-control" placeholder="capacidad" required autofocus>
                        </div>
                    </div>


                @endfor

                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>






            </div>

        </form>

    </div>






@endsection
