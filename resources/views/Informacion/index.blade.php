@extends('layout')
@section('body')
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: 0.7fr 1fr 1fr 1fr 0.7fr;
            grid-template-rows: 0.6fr 1.2fr 1.2fr;
            gap: 1px 1px;
            grid-template-areas: "NAVBAR NAVBAR NAVBAR NAVBAR NAVBAR" ". INFO INFO INFO ." ". INFO INFO INFO .";
        }



        .NAVBAR {
            margin-top: 20px;
            grid-area: NAVBAR;
        }

        .INFO {
            grid-area: INFO;
            display: block;
            background: #cecece;
        }

        .informacion {
            display: block;
            margin-left: 50px;
            margin-bottom: 20px;
            margin-top: 20px;
            width: 90%;
            padding: 4px 4px 4px 4px;
            background-color: #e5e5e5;
        }
    </style>
    <div>
        <title>Sobre Nosotros - La Mascada</title>
        <div class="grid-container">
            <div class="NAVBAR">
                <h1 align="center">¿Quienes somos?</h1>
            </div>
            <div class="CATEGORIAS">

            </div>
            <div class="INFO">
                @if(!Auth::guest())
                    <a style="margin-top: 20px;margin-left: 30px; width: 90%" href="{{action('InformacionController@create')}}" type="button" class="btn btn-primary">Crear Información</a>
                @endif
                @foreach($informacion as $i)
                    <div class="informacion">
                        <div class="container">
                            <h1 align="center">{{$i->Informacion}}</h1><br>
                            <p style="color: #0a0404">{{$i->Descripcion}}</p>
                        </div>
                        @if(!Auth::guest())
                            <div class="crud">
                                <a href="{{action('InformacionController@edit', $i->id)}}"
                                   class=" btn btn-primary active" title="Editar Informacion">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a data-target="#del{{$i->id}}" class="btn btn-danger active float-right active" data-toggle="modal" title="Eliminar Informacion">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                <!--pop up confirmacion -->
                                <div class="modal fade" id="del{{$i->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Confirmacion</h5>
                                                <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <p><font color="black">Si presiona cancelar, no se eliminaran los cambios</font> </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                                <a href="{{action('InformacionController@destroy',$i->id)}}"  class="btn btn-primary">Eliminar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- endf pop up-->
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
