@extends('layout')
@section('body')
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
            grid-template-rows: 0.6fr 1.2fr 1.2fr;
            grid-template-areas: ". NAVBAR NAVBAR NAVBAR ." ". INFO INFO INFO ." ". INFO INFO INFO .";
        }


        .NAVBAR { grid-area: NAVBAR; }

        .INFO { grid-area: INFO;}

        .card{
            width: 90%;
        }

        .form-style-1 input{
            width: 100%;
        }
        .form-style-1 a{
            width: 100%;
        }
    </style>
    <title>Contáctanos - La Mascada</title>
    <div class="grid-container">
        <div class="NAVBAR"></div>
        <div class="CATEGORIAS">

        </div>
        <div class="INFO">
            <div class="card">
                <div class="card-header">
                    <h2 align="center">Envíanos un Mail con tu cotización</h2>
                </div>
                <div class="card-body" >
                    <form role="form" action="{{action('ContactoController@store')}}" method="POST" enctype="multipart/form-data" >
                        <ul class="form-style-1">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <li>
                                <label for="name">Nombre</label>
                                <input placeholder="Ingrese su nombre o de le empresa" type="text" name="name" id="name" class="form-style-1">
                            </li>
                            <li>
                                <label for="asunto"> Asunto</label>
                                <input placeholder="Asunto" type="text" name="asunto" id="asunto" class="form-style-1">
                            </li>
                            <li>
                                <label for="email">Correo Electrónico</label>
                                <input placeholder="Ej: user@domain.com" type="text" name="email" id="email" class="form-style-1">
                            </li>
                            <li>
                                <label for="descripcion">Descripcion de la cotización</label><br>
                                <textarea name="descripcion" id="descripcion" cols="111" rows="10"></textarea>
                            </li>
                            <a style="background-color: #1c7430" href="#confirmation" class="btn btn-primary" data-toggle="modal">Enviar</a>
                        </ul>
                        @include('pop-up')
                    </form>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>

@endsection
