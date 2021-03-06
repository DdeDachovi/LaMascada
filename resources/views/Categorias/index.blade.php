@extends('layout')
@section('body')
    <title>Categorias de Productos - La Mascada</title>
    <div class="container">
        <div style="color: #111111 " align="center">
            <p></p>
            <h1> Categorias</h1>
            <div class="row">
                <div class="column" align="left" style="padding-left: 1.5%">
                    <a type="button" class="btn btn-primary" href="{{action('ProductosController@index')}}" role="button"><i class="fas fa-arrow-left"></i> Regresar</a>
                    <a href="{{action('TipoProductoController@create')}}" type="button" class="btn btn-primary pull-right" > Agregar Categoria</a>
                    <input type="text" id="buscar" onkeyup="myFunction()" placeholder="Buscar Categoria" title="Type in a name">
                </div>
                <table class="table table-hover table-striped" id="tabla_categoria">
                    <thead style="background-color: #f83c3c ">
                    <tr>
                        <th width="20px">ID</th>
                        <th>Categoria</th>

                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    </thead>
                    <tbody style="background-color: #e0e0e0">
                    @foreach($categorias as $c)
                        <tr>
                            <td>{{$c->id}}</td>
                            <td>{{$c->Tipo_producto}}</td>
                            <td>
                                <a href="{{action('TipoProductoController@edit', $c->id)}}"
                                   class="btn btn-primary active" title="Editar Categoria">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                            </td>
                            <td>
                                <a data-target="#del{{$c->id}}" class="btn btn-danger active " data-toggle="modal" title="Eliminar Categoria">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                <!--pop up confirmacion -->
                                <div class="modal fade" id="del{{$c->id}}">
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
                                                <a href="{{action('TipoProductoController@destroy',$c->id)}}"  class="btn btn-primary">Eliminar</a>
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

    <script>
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("buscar");
            filter = input.value.toUpperCase();
            table = document.getElementById("tabla_categoria");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
@endsection
