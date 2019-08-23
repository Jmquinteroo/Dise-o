@extends('layouts.app')

@section('content')
<div class="container">
    <body>
    <div class="top-right links">
        @if (auth()->check())
            @can('read user')
                {{--<a href="{{ url('/home') }}">Home</a>--}}
            @endcan


            @if (auth()->user()->isAdministrator())
                <a href="{{ route('eventos.index') }}">Eventos</a>
                <a href="{{ route('lugares.index') }}">Lugares</a>
                <a href="{{ route('register') }}">Registrar Admin</a>
                <a href="{{ url('/home') }}">Home</a>

            @else

                {{--<a href="{{ url('/home') }}">Home</a>--}}
                {{--<a href="{{ route('register') }}">Register</a>--}}
            @endif
        @else

            <a href="{{ route('register') }}">Register</a>
            <a href="{{ route('login') }}">Login</a>

        @endif
    </div>




    </body>
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>

            </div>
            <div class ="card">

            </div>

        </div>

    </div>

</div>

@endsection
