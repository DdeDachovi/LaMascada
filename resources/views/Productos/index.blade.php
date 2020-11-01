@extends('layout')
@section('body')
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: 0.8fr 0.3fr 1.3fr 1.4fr 1.1fr;
            grid-template-rows: 0.1fr 1.5fr 1.2fr;
            gap: 1px 1px;
            grid-template-areas:
    "NAVBAR NAVBAR NAVBAR NAVBAR NAVBAR"
    "CATEGORIAS L PRODUCTOS PRODUCTOS PRODUCTOS"
    "CATEGORIAS L PRODUCTOS PRODUCTOS PRODUCTOS";
        }

        .NAVBAR {
            grid-area: NAVBAR;
            max-height:  150px;
        }

        .CATEGORIAS { grid-area: CATEGORIAS; }

        .L { grid-area: L; }

        .PRODUCTOS {
            background: #e7e2e2;
            grid-area: PRODUCTOS;
            display: flex;
        }

        .NAVBAR > h1:after{
            content: '';
            width: 100%;
            height: 1px;
            background: #C7C7C7;
            margin: 20px 0;
        }
        .category-list{
            display: flex;
            flex-direction: column;
            width: 80%;
        }
        .category-list .category-item{
            display: block;
            width: 90%;
            padding: 15px 0;
            margin-bottom: 20px;
            margin-left: 20px;
            background: #db3333;

            text-align: center;
            text-decoration: none;
            color: #ffffff;
        }

        .category-list .ct_item_active{
            background: #3B5998;
        }

        .product-list{
            width: 90%;
            display: flex;
            flex-wrap: wrap;
        }

        .product-list .product-item{
            width: 20%;
            margin-left: 2%;
            margin-bottom: 25px;
            box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0.22);
            transition: all .4s;
        }

        .product-list .product-item img{
            width: 100%;
        }
        .product-list .product-item a{
            display: block;
            width: 100%;
            padding: 8px 0;
            background: #2D3E50;

            color: #ffffff;
            text-align: center;
            text-decoration: none;
        }
        .crud{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .btn-producto{
            display: flex;
            width: 100%;
        }
        .btn a{
            width: 100%;
        }
    </style>
    <title>Productos - La Mascada</title>
    <div>
        <div class="grid-container">
            <div class="CATEGORIAS">
                <h3 align="center" style="margin-left: 20px;">CATEGORIAS</h3>
                <div class="category-list">
                    <a href="#" class="category-item" category="all">Todo</a>
                    @foreach($categorias as $c)
                        <a href="#" class="category-item" category="{{$c->id}}">{{$c->Tipo_producto}}</a>
                    @endforeach
                </div>
            </div>
            <div class="NAVBAR">
                <h1 align="center" style="margin-top: 50px;">PRODUCTOS</h1>
                @if(!Auth::guest())
                    <div class="btn-producto">
                        <a href="{{action('ProductosController@create')}}" class="btn btn-primary" type="button"> Agregar Producto</a>
                        <a href="{{action('TipoProductoController@index')}}" class="btn btn-primary" type="button">Ver Categorias</a>
                    </div>
                @endif

            </div>
            <div class="PRODUCTOS product-list">
                @foreach($productos as $p)
                    @foreach($imagenes as $i)
                        @if($p->imagen_id == $i->id)
                            <div class="product-item" category="{{$p->tipo_id}}"><br>
                                <img src="{{asset('storage/'.$i->Imagen)}}" alt="" width="230" height="230">
                                <a href="{{action('ProductosController@show',$p->id)}}">
                                    {{$p->Nombre_producto}}<br>
                                    ${{$p->Precio}}<br>
                                </a>
                                @if(!Auth::guest())
                                    <div class="justify-content-start crud">
                                        <a href="{{action('ProductosController@edit', $p->id)}}"
                                           class=" btn btn-primary active" title="Editar Producto">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a data-target="#del{{$p->id}}" class="btn btn-danger active float-right" data-toggle="modal" title="Eliminar Producto">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <!--pop up confirmacion -->
                                        <div class="modal fade" id="del{{$p->id}}">
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
                                                        <a href="{{action('ProductosController@destroy',$p->id)}}"  class="btn btn-primary">Eliminar</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- endf pop up-->
                                    </div>
                                @endif
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('.category-list .category-item[category="all"]').addClass('ct_item_active');

            $('.category-item').click(function () {
                var category = $(this).attr('category');

                $('.category-item').removeClass('ct_item_active');
                $(this).addClass('ct_item_active');


                $('.product-item').css('transform','scale(0)');
                function hideProduct(){
                    $('.product-item').hide();
                } setTimeout(hideProduct,400);


                function showProduct(){
                    $('.product-item[category="' + category + '"]').show();
                    $('.product-item[category="' + category + '"]').css('transform','scale(1)');
                } setTimeout(showProduct,400);
            });

            $('.category-item[category="all"]').click(function () {
                function showAll() {
                    $('.product-item').show();
                    $('.product-item').css('transform', 'scale(1)');
                } setTimeout(showAll,400);
            });
        });
    </script>
@endsection
