<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="/static/img/favicon.png" type="image/png"> 
	<meta name="theme-color" content="#000"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond|EB+Garamond&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="/static/css/manager/style.css" type="text/css"/>
    <link rel="stylesheet" href="/static/css/icomoon/style.css" type="text/css"/>
    <title>@yield('titulo', 'NewsMoment manager')</title>
  </head>
  <body id="start">
    <style media="screen">  
        #@yield('styles'){
            background-color: #f05b3a!important;
        }
    </style>
    <!-- nav top -->
    <div class="top-nav shadow-sm movil">
        <img src="/static/img/favicon.png" alt="NewsMoment">
        <div class="movil activarMenu" id="activeNav">
            <span class="icon-menu"></span>
        </div>
    </div>
    <!--  nav lateral -->
    <div class="overlay1"></div>

    <div class="lateralNav shadow-lg">
        <div class="row mx-0 mt-4">

            <div class="fotoPerfil" style="background: url('https://www.isesinstituto.com/sites/default/files/istock-1158245282.jpg') no-repeat;background-size: cover; background-position: center !important;">
                <a href="#"><small>Ajustes</small></a>
            </div>
            <div class="col-12 p-0 mt-3">
                <a href="{{ route('manager_publicaciones') }}" class="enlace">
                    <div class="nav-element" id="publicaciones">
                        <span class="icon-newspaper"></span> Publicaciones
                    </div>
                </a>
            </div>
            <div class="col-12 p-0">
                <a href="{{ route('manager_empresas') }}" class="enlace">
                    <div class="nav-element" id="empresas">
                        <span class="icon-address-book"></span> Empresas
                    </div>
                </a>
            </div>
            <div class="col-12 p-0">
                <a href="{{ route('manager_categorias') }}" class="enlace">	
                    <div class="nav-element" id="categorias">
                        <span class="icon-label"></span> Categorías
                    </div>
                </a>
            </div>
            <div class="col-12 p-0">
                <a href="{{ route('banner.index') }}" class="enlace">	
                    <div class="nav-element" id="banners">
                        <span class="icon-images"></span> Banners
                    </div>
                </a>
            </div>
            <div class="col-12 p-0 mb-5">
                <a class="enlace" href="#">
                    <div class="nav-element">
                        <span class="icon-exit"></span> Cerrar Sesión
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="contenido p-3">
        @yield('cuerpo')
    </div>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- JavaScript propio -->
    <script src="@yield('nav_js', '/static/js/manager.js')"></script>
  </body>
</html>
