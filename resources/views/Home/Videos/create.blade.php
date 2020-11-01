@extends('layout')
@section('body')
    <style>
        .card{
            margin-top: 40px;
            margin-left: 30%;
            margin-right: 30%;
            margin-bottom: 40px;
        }
        textarea{
            width: 100%;
        }

        label{
            align-content: center;
            text-align: center;
        }
        input{
            width: 100%;
        }
    </style>
    <div class="card">
        <div class="card-header">
            <h1 align="center"> Ingresar nuevo video</h1>
        </div>
        <div class="card-body">
            @include('error_formulario')
            <form role="form" method="POST" action="{{action('VideosController@store')}}" enctype="multipart/form-data">
                <ul class="form-style-1">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <li>
                        <label for="name">Nombre del Video</label>
                        <input placeholder="Nombre del video..." type="text" id="name" name="name" class="form-style-1">
                    </li>
                    <li>
                        <label for="video"> Ingrese el fragmento html del video a subir</label>
                        <p><font color="black">Se recomienda que deje de la siguiente forma los atributos width y height: width="1000" height="500"</font></p>
                        <textarea name="video" id="video" cols="30" rows="20"></textarea>
                    </li>
                    <li>
                        <a href="{{ action('VideosController@index') }}" class="btn btn-primary" >Atrás</a>
                        <a style="background-color: #1c7430" href="#confirmation" class="btn btn-primary" data-toggle="modal">Agregar</a>
                    </li>
                </ul>
                @include('pop-up')
            </form>
        </div>
        <div class="card-footer"></div>
    </div>
@endsection
