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
        select{
            width: 100%;
        }
        label{
            align-content: center;
            text-align: center;
        }
    </style>
    <div class="card">
        <div class="card-header">
            @if(isset($p))
                <h1 align="center"> Editar Producto</h1>
            @else
                <h1 align="center"> Crear Producto</h1>
            @endif
        </div>
        <div class="card-body">
            @include('error_formulario')
            @if(isset($p))
                <form role="form" action="{{action('ProductosController@update')}}" enctype="multipart/form-data">
                    <ul class="form-style-1">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <li>
                            <label for="name">Nombre del producto</label>
                            <input placeholder="Ingrese el nombre del producto..." type="text" id="name" name="name" class="form-style-1" value="{{$p->Nombre_producto}}">
                        </li>
                        <li>
                            <label for="informacion">Informacion del producto</label>
                            <input placeholder="ingrese la informacion..." type="text" id="informacion" name="informacion" class="form-style-1" value="{{$c->Informacion}}">
                        </li>
                        <li>
                            <label for="precio">Precio del producto</label>
                            <input type="number" id="precio" name="precio" class="form-style-1" value="{{$c->Precio}}">
                        </li>
                        <li>
                            <label for="categoria"> Categoria del producto</label>
                            <select name="categoria" id="categoria">
                                <option value="{{$c->tipo_id}}">--Seleccione una opcion--</option>
                                @foreach($categorias as $c)
                                    <option value="{{$c->id}}">{{$c->Tipo_producto}}</option>
                                @endforeach
                            </select>
                        </li>
                        <li>
                            <a href="{{ action('ProductosController@index') }}" class="btn btn-primary" >Atrás</a>
                            <a style="background-color: #1c7430" href="#confirmation" class="btn btn-primary" data-toggle="modal">Editar</a>
                        </li>
                    </ul>
                    @include('pop-up')
                </form>
            @else
                <form role="form" method="POST" action="{{action('ProductosController@store')}}" enctype="multipart/form-data">
                    <ul class="form-style-1">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <li>
                            <label for="name">Nombre del producto</label>
                            <input placeholder="Ingrese el nombre del producto..." type="text" id="name" name="name" class="form-style-1">
                        </li>
                        <li>
                            <label for="informacion">Informacion del producto</label>
                            <input placeholder="ingrese la informacion..." type="text" id="informacion" name="informacion" class="form-style-1">
                        </li>
                        <li>
                            <label for="precio">Precio del producto</label>
                            <input type="number" id="precio" name="precio" class="form-style-1">
                        </li>
                        <li>
                            <label for="categoria"> Categoria del producto</label>
                            <select name="categoria" id="categoria">
                                <option value="0">--Seleccione una opcion--</option>
                                @foreach($categorias as $c)
                                    <option value="{{$c->id}}">{{$c->Tipo_producto}}</option>
                                @endforeach
                            </select>
                        </li>
                        <li>
                            <label for="imagen"> Imagen del producto</label>
                            <input type="file" id="imagen" name="imagen" class="form-style-1 imagen">
                        </li>
                        <li>
                            <a href="{{ action('ProductosController@index') }}" class="btn btn-primary" >Atrás</a>
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
