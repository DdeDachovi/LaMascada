@extends('layout')
@section('body')
    <div class="container">
        <div style="color: #111111 " align="center">
            <p></p>
            <h1> Videos</h1>
            <div class="row">
                <div class="column" align="left" style="padding-left: 1.5%">
                    <a type="button" class="btn btn-primary" href="/"  role="button"><i class="fas fa-arrow-left"></i> Regresar</a>
                    <a href="{{action('VideosController@create')}}" type="button" class="btn btn-primary pull-right" > Agregar Video</a>
                </div>
                <table class="table table-hover table-striped">
                    <thead style="background-color: #f83c3c ">
                    <tr>
                        <th width="20px">ID</th>
                        <th>Nombre del video</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody style="background-color: #e0e0e0">
                    @foreach($videos as $v)
                        <tr>
                            <td>{{$v->id}}</td>
                            <td>{{$v->Nombre_video}}</td>
                            <td>
                                <a data-target="#del{{$v->id}}" class="btn btn-danger active" data-toggle="modal" title="Eliminar video">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                <!--pop up confirmacion -->
                                <div class="modal fade" id="del{{$v->id}}">
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
                                                <a href="{{action('VideosController@destroy',$v->id)}}"  class="btn btn-primary">Eliminar</a>
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
