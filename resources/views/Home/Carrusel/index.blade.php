@extends('layout')
@section('body')
    <div class="container">
        <div style="color: #111111 " align="center">
            <p></p>
            <h1> Carrusel</h1>
            <div class="row">
                <div class="column" align="left" style="padding-left: 1.5%">
                    <a type="button" class="btn btn-primary" href="/"  role="button"><i class="fas fa-arrow-left"></i> Regresar</a>
                    <a href="{{action('CarruselController@create')}}" type="button" class="btn btn-primary pull-right" > Agregar Imagen</a>
                </div>
                <table class="table table-hover table-striped">
                    <thead style="background-color: #f83c3c ">
                    <tr>
                        <th width="20px">ID</th>
                        <th>Imagen</th>
                        <th>Acción</th>
                    </tr>
                    </thead>
                    <tbody style="background-color: #e0e0e0">
                    @foreach($imagenes as $i)
                        <tr>
                            <td>{{$i->id}}</td>
                            <td><img src="{{asset('storage/'.$i->Imagen)}}" alt="" width="250px" height="250px"></td>
                            <td>
                                <a data-target="#del{{$i->id}}" class="btn btn-danger active" data-toggle="modal" title="Eliminar Imagen">
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
                                                <a href="{{action('CarruselController@destroy',$i->id)}}"  class="btn btn-primary">Eliminar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- endf pop up-->
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
