@extends('layout')
@section('body')
    <style>
        .card{
            margin-top: 40px;
            margin-left: 30%;
            margin-right: 30%;
            margin-bottom: 40px;
        }
        input{
            width: 100%;
        }
        label{
            align-content: center;
            text-align: center;
        }
    </style>
    <div class="card">
        <div class="card-header">
            @if(isset($c))
                <h1 align="center">Editar categoria</h1>
            @else
                <h1 align="center">Crear nueva categoria</h1>
            @endif
        </div>
        <div class="card-body">
            @include('error_formulario')
            @if(isset($c))
                <form role="form" method="POST" action="{{action('TipoProductoController@update')}}" enctype="multipart/form-data">
                    <ul class="form-style-1">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <li>
                            <label for="categoria">Nombre de la categoria</label>
                            <input placeholder="Nombre categoria" type="text" id="categoria" name="categoria" class="form-style-1" value="{{$c->Tipo_producto}}">
                        </li>
                        <li>
                            <a href="{{ action('TipoProductoController@index') }}" class="btn btn-primary" >Atrás</a>
                            <a style="background-color: #1c7430" href="#confirmation" class="btn btn-primary" data-toggle="modal">Editar</a>
                        </li>
                    </ul>
                    @include('pop-up')
                </form>
            @else
                <form role="form" method="POST" action="{{action('TipoProductoController@store')}}" enctype="multipart/form-data">
                    <ul class="form-style-1">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <li>
                            <label for="categoria">Nombre de la categoria</label>
                            <input placeholder="Nombre categoria" type="text" id="categoria" name="categoria" class="form-style-1">
                        </li>
                        <li>
                            <a href="{{ action('TipoProductoController@index') }}" class="btn btn-primary" >Atrás</a>
                            <a style="background-color: #1c7430" href="#confirmation" class="btn btn-primary" data-toggle="modal">Agregar</a>
                        </li>
                    </ul>
                    @include('pop-up')
                </form>
            @endif

        </div>
        <div class="card-footer">

        </div>
    </div>
@endsection
