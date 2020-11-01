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
        .imagen{
            background: #d0d0d0;
        }
        label{
            align-content: center;
            text-align: center;
        }
    </style>
    <div class="card" style="margin-top: 5%">
        <div class="card-header">
            <h1 align="center">Añadir Imagen al Carrusel</h1>
        </div>
        <div class="card-body">
            @include('error_formulario')
            <form role="form" method="POST" action="{{action('CarruselController@store')}}" enctype="multipart/form-data">
                <ul class="form-style-1">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <li>
                        <label for="imagen">Imagen</label>
                        <input type="file" id="imagen" name="imagen" class="form-style-1 imagen">
                    </li>
                    <li>
                        <a href="{{ action('CarruselController@index') }}" class="btn btn-primary" >Atrás</a>
                        <a style="background-color: #1c7430" href="#confirmation" class="btn btn-primary" data-toggle="modal">Agregar</a>
                    </li>
                </ul>
                @include('pop-up')
            </form>
        </div>
        <div class="card-footer"></div>
    </div>
@endsection
