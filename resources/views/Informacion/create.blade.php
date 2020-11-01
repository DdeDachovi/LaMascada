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
        textarea{
            width: 100%;
        }
        label{
            align-content: center;
            text-align: center;
        }
    </style>
<div class="card">
    <div class="card-header">
        @if(isset($i))
            <h1 align="center">Crear nueva categoria</h1>
        @else
            <h1 align="center">Crear nueva informacion</h1>
        @endif
    </div>
    <div class="card-body">
        @include('error_formulario')
        @if(isset($i))
            <form role="form" method="POST" action="{{action('InformacionController@update')}}" enctype="multipart/form-data">
                <ul class="form-style-1">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <li>
                        <label for="informacion">Nombre de la informacion</label>
                        <input placeholder="Nombre de Informacion...." type="text" id="informacion" name="informacion" class="form-style-1" value="{{$i->Informacion}}">
                    </li>
                    <li>
                        <label for="descripcion">Descripcion</label>
                        <textarea name="descripcion" id="descripcion" cols="30" rows="10" value="{{$i->Descripcion}}"></textarea>
                    </li>
                    <li>
                        <a href="{{ action('InformacionController@index') }}" class="btn btn-primary" >Atrás</a>
                        <a style="background-color: #1c7430" href="#confirmation" class="btn btn-primary" data-toggle="modal">Editar</a>
                    </li>
                </ul>
                @include('pop-up')
            </form>
        @else
            <form role="form" method="POST" action="{{action('InformacionController@store')}}" enctype="multipart/form-data">
                <ul class="form-style-1">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <li>
                        <label for="informacion">Nombre de la informacion</label>
                        <input placeholder="Nombre de Informacion...." type="text" id="informacion" name="informacion" class="form-style-1">
                    </li>
                    <li>
                        <label for="descripcion">Descripcion</label>
                        <textarea name="descripcion" id="descripcion" cols="70" rows="30"></textarea>
                    </li>
                    <li>
                        <a href="{{ action('InformacionController@index') }}" class="btn btn-primary" >Atrás</a>
                        <a style="background-color: #1c7430" href="#confirmation" class="btn btn-primary" data-toggle="modal">Agregar</a>
                    </li>
                </ul>
                @include('pop-up')
            </form>
        @endif
    </div>
    <div class="card-footer"></div>
</div>
@endsection
