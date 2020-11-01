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
    <div class="card">
        <div class="card-header">
            @if(isset($s))
                <h1 align="center">Editar sucursal</h1>
            @else
                <h1 align="center">Crear nueva sucursal</h1>
            @endif
        </div>
        <div class="card-body">
            @include('error_formulario')
            @if(isset($s))
                <form role="form" method="POST" action="{{action('SucursalesController@update')}}" enctype="multipart/form-data">
                    <ul class="form-style-1">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <li>
                            <label for="name">Nombre de la sucursal</label>
                            <input placeholder="Nombre sucursal..." type="text" id="name" name="name" class="form-style-1" value="{{$s->Nombre_sucursal}}">
                        </li>
                        <li>
                            <label for="direccion">Direccion</label>
                            <input placeholder="Direccion de sucursal.." type="text" id="direccion" name="direccion" class="form-style-1" value="{{$s->Direccion}}">
                        </li>
                        <li>
                            <label for="telefono">Telefono</label>
                            <input type="number" id="telefono" name="telefono" class="form-style-1" value="{{$s->Telefono}}">
                        </li>
                        <li>
                            <label for="horario">Horario de atencion</label>
                            <input type="text" id="horario" name="horario" class="form-style-1" value="{{$s->Horario_atencion}}">
                        </li>
                        <li>
                            <a href="{{ action('SucursalesController@index') }}" class="btn btn-primary" >Atrás</a>
                            <a style="background-color: #1c7430" href="#confirmation" class="btn btn-primary" data-toggle="modal">Agregar</a>
                        </li>
                    </ul>
                    @include('pop-up')
                </form>
            @else
                <form role="form" method="POST" action="{{action('SucursalesController@store')}}" enctype="multipart/form-data">
                    <ul class="form-style-1">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <li>
                            <label for="name">Nombre de la sucursal</label>
                            <input placeholder="Nombre sucursal..." type="text" id="name" name="name" class="form-style-1">
                        </li>
                        <li>
                            <label for="direccion">Direccion</label>
                            <input placeholder="Direccion de sucursal.." type="text" id="direccion" name="direccion" class="form-style-1">
                        </li>
                        <li>
                            <label for="telefono">Telefono</label>
                            <input type="number" id="telefono" name="telefono" class="form-style-1">
                        </li>
                        <li>
                            <label for="horario">Horario de atencion</label>
                            <input type="text" id="horario" name="horario" class="form-style-1">
                        </li>
                        <li>
                            <label for="imagen"> Imagen de la sucursal</label>
                            <input type="file" id="imagen" name="imagen" class="form-style-1 imagen">
                        </li>
                        <li>
                            <a href="{{ action('SucursalesController@index') }}" class="btn btn-primary" >Atrás</a>
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
