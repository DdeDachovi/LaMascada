<style>
    .user{
        display: block;
        width: 100%;
        padding: 8px 0;
        background: #c7c2c2;

        color: #ffffff;
        text-align: center;
        text-decoration: none;
    }

    .top-right .btn a{
        display: block;
        width: 50%;
        padding: 8px 0;
        background: #2D3E50;

        color: #ffffff;
        text-align: center;
        text-decoration: none;
    }

    :root{
        --facebook: #3b5999;
        --instagram: #e4405f;
        --twitter: #55acee;
    }

    .redes-container{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .redes-container ul li{
        display: inline-block;
        margin: 0 5px;
        width: 50px;
        height: 50px;
        text-align: center;
    }
    .redes-container ul li a{
        display: block;
        padding: 0 10px;
        background: #333333;
        color: #ffffff;
        line-height: 50px;
        font-size: 18px;
        box-shadow: 0 3px 5px 0px rgba(0, 0, 0, .2);
        transition: .2s;
    }

    .redes-container ul:hover a{
        filter: blur(2px);
    }
    .redes-container ul li a:hover{
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 5px 5px 0px rgba(0, 0, 0, .4);
        filter: none;
    }

    .redes-container ul li .facebook:hover{
        background: var(--facebook);
    }

    .redes-container ul li .instagram:hover{
        background: var(--instagram);
    }

    .redes-container ul li .twitter:hover{
        background: var(--twitter);
    }
    .nav-link:hover{
        background: #bb0000;
        filter: none;
        transition: .2s;
    }
    .navbar-nav a{
        display: block;
    }
    .col-sm-3 img{
        display: block;
        margin-left: 10%;
        text-align: center;
        text-decoration: none;
    }
</style>
<div class="container-fluid" style="background-color: #ffffff">
    <div class="row border">
        <div class="col-sm-3" >
            <img src="{{asset('storage/Empanadas_de_pino.jpg')}}" alt="" width="180px" height="180px" >
        </div>
        <div class="col-sm-6 align-self-center">
            <img src="{{asset('storage/La_mascada.png')}}" alt="">
        </div>
        <div class="col-sm-2">
            <div class="btn-link" align="right" style="margin-right: 10%;">
                <div class="top-right links">
                    @if(Auth::guest())
                        <a href="{{route('login')}}" type="button" class="btn  btn-primary d-flex justify-content-center">
                                Iniciar sesion
                        </a>
                        <br>
                    @else
                        <p class="user" style="color: #0a0404">Bienvenido {{Auth::user()->name}}</p><br>
                    @endif
                    <div class="redes-container">
                        <ul>
                            <li><a href="https://www.facebook.com/" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://www.instagram.com/comercialgng/?hl=es-la" class="instagram"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="https://twitter.com/?lang=es" class="twitter"><i class="fab fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg " style="background-color: #f30f13">
    <div class="container" align="center">
        <ul class="navbar-nav mr-auto header" style="background-color: #f30f13">
            <li>
                <a class="nav-link" href="/"><font color="white">Inicio</font></a>
            </li>
            <li >
                <a class="nav-link" href="{{action('SucursalesController@index')}}"><font color="white">Sucursales</font></a>
            </li>
            <li >
                <a class="nav-link" href="{{action('ProductosController@index')}}" ><font color="white">Productos</font></a>
            </li>
            <li >
                <a class="nav-link" href="{{action('ContactoController@index')}}" ><font color="white">Contacto</font></a>
            </li>
            <li >
                <a class="nav-link" href="{{action('InformacionController@index')}}" ><font color="white">Quienes Somos</font></a>
            </li>
            @if(!Auth::guest())
                <li>
                    <a class="nav-link" href="{{action('CarruselController@index')}}"><font color="white">Carrusel</font></a>
                </li>
                <li>
                    <a class="nav-link" href="{{action('VideosController@index')}}"><font color="white">Videos</font></a>
                </li>
                <li>
                    <a class="nav-link" href="{{ url('/logout') }}"> <font color="white">Salir</font></a>
                </li>
            @endif

        </ul>
    </div>
</nav>
