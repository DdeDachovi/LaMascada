@extends('layout')
@section('body')
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: 0.5fr 1fr 1fr 1fr 0.5fr;
            grid-template-rows: 0.2fr 1fr 1fr;
            gap: 1px 1px;
            grid-template-areas: ". NAVBAR NAVBAR NAVBAR ." ". Sucursales Sucursales Sucursales ." ". Sucursales Sucursales Sucursales .";
        }

        .Sucursales {
            grid-area: Sucursales;
            display: block;
            background: #cecece;
            margin-bottom: 50px;
        }

        .suc{
            display: flex;
        }

        .NAVBAR {
            margin-top: 20px;
            margin-bottom: 20px;
            grid-area: NAVBAR;
        }

        .sucursal {
            margin-left: 80px;
            margin-top: 20px;
            width: 350px;
            height: 500px;
            background-color: #dedede;
        }
        .sucursal img{
            width: 100%;
        }
        .sucursal p{
            width: 100%;
            text-align: left;
        }
    </style>
    <div>
        <title>Sucursales - La Mascada</title>
        <div class="grid-container">
            <div class="NAVBAR">
                <h1 align="center">SUCURSALES</h1>
            </div>
            <div class="Sucursales">
                @if(!Auth::guest())
                    <a style="width: 90%; margin-left: 25px; margin-top: 20px" href="{{action('SucursalesController@create')}}" type="button" class="btn btn-primary" style="margin-right: 30%;">Añadir Sucursal</a>
                @endif
                <div class="suc">
                    @foreach($sucursales as $s)
                        <div class=" sucursal">
                            <img src="{{asset('storage/'.$s->Imagen)}}"  width="320" height="300">
                            <p><font color="black">{{$s->Nombre_sucursal}}<br>
                                    Direccion: {{$s->Direccion}}<br>
                                    Telefono: (+56 9){{$s->Telefono}}<br>
                                    Horario de atención: {{$s->Horario_atencion}}<br></font></p>

                            @if(!Auth::guest())
                                <div class="crud">
                                    <a href="{{action('SucursalesController@edit', $s->id)}}"
                                       class=" btn btn-primary active" title="Editar Sucursal">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a data-target="#del{{$s->id}}" class="btn btn-danger active float-right" data-toggle="modal" title="Eliminar Sucursal">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                    <!--pop up confirmacion -->
                                    <div class="modal fade" id="del{{$s->id}}">
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
                                                    <a href="{{action('SucursalesController@destroy',$s->id)}}"  class="btn btn-primary">Eliminar</a>
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
    </div>

@endsection
