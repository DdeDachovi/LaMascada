@extends('layout')
@section('body')
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: 0.9fr 0.1fr 3.1fr 0.1fr 0.9fr;
            grid-template-rows: 0.3fr 2.6fr 0.4fr 3.7fr 0.3fr 3.7fr 0.4fr;
            gap: 1px 1px;
            grid-template-areas:
            "LEFT . . . RIGHT"
            "LEFT . CARRUSEL . RIGHT"
            "LEFT . . . RIGHT"
            "LEFT . VIDEO . RIGHT"
            "LEFT . . . RIGHT"
            "LEFT . PRODUCTOS . RIGHT"
            "LEFT . . . RIGHT";
        }

        .LEFT { grid-area: LEFT; }

        .RIGHT { grid-area: RIGHT; }

        .CARRUSEL {
            grid-area: CARRUSEL;
            align-content: center;
        }

        .VIDEO {
            grid-area: VIDEO;
            align-content: center;
        }

        .PRODUCTOS {
            grid-area: PRODUCTOS;
        }

        .producto {
            border: 2px;
            background-color: #eaeaea;
            height: 600px;
        }
        .prod{
            margin: 3.4%;
            width: 200px;
            height: 220px;
            align-content: center;
        }

        .slider{
            width: 95%;
            margin: auto;
            overflow: hidden;
        }
        .slider ul{
            display: flex;
            padding: 0;
            width: 400%;

            animation: cambio 24s infinite alternate;
            animation-timing-function: ease-in;
        }
        .slider li{
            width: 100%;
            list-style: none;
        }
        .slider img{
            width: 100%;
        }
        .vid{
            margin-top: 5%;
            margin-left: 5%;
            align-content: center;
            align-items: center;
            align-self: center;
        }

        @keyframes cambio {
            0% {margin-left: 0;}
            20% {margin-left: 0;}

            25% {margin-left: -100%;}
            45% {margin-left: -100%;}

            50% {margin-left: -200%;}
            70% {margin-left: -200%;}

            75% {margin-left: -300%;}
            100% {margin-left: -300%;}
        }
    </style>

    <title>La Mascada</title>
    <div>
        <div class="grid-container">
            <div class="LEFT"></div>
            <div class="RIGHT"></div>
            <div class="CARRUSEL">
                <h1 align="center">Novedades</h1>
                <div class="slider">
                    <ul>
                        @foreach($imagenes as $i)
                            <li><img src="{{asset('storage/'.$i->Imagen)}}" alt="" width="700px" height="500px"></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="VIDEO">
                <h1 align="center">¡Conozcanos a traves de videos!</h1>
                <div class="vid">
                    <?php
                    use App\Models\videos;
                    $videos = videos::all();
                    foreach($videos as $v)
                        echo $v->Video,'<br>
                    <p align="center"><font color="black"><bold>'.$v->Nombre_video.'</bold></font></p>';
                    ?>
                </div>
            </div>

            <div class="PRODUCTOS">
                <h1 align="center"> Productos destacados</h1>
                <div class="producto row">
                    @foreach($productos as $p)
                        @foreach($imagenes_producto as $i)
                            @if($p->imagen_id == $i->id)
                                <a href="{{action('ProductosController@show',$p->id)}}" class="prod">
                                    <div class="prod">
                                        <img src="{{asset('storage/'.$i->Imagen)}}" alt="{{$p->Nombre_producto}}" width="200" height="200">
                                        <p align="center"><strong><font color="black">{{$p->Nombre_producto}}</font></strong></p>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
