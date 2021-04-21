<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- <link rel="icon" href="{%static 'inicio/img/favicon.png'%}" type="image/png"> -->
	<meta name="theme-color" content="#000"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond|EB+Garamond&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="static/css/style.css" type="text/css"/>

    <link rel="stylesheet" href="static/css/icomoon/style.css" type="text/css"/>
    <title>Página principal - NewsMoment</title>
  </head>
  <body id="start">
		
    <!--
        NAVEGADOR
    -->

    <nav class="mainNav">
        <!-- manú principal -->
        <div class="contenedorNav px-md-3 p-0">
            <!-- parte izquierda -->
            <div class="leftNav">
                <div class="menuPalos" id="activeMenu">
                    <div class="menuPalo1"></div>
                    <div class="menuPalo2"></div>
                    <div class="menuPalo3"></div>
                </div>
                <a id="activarBuscador">
                    <span class="icon-search"></span>
                </a>
                <a href="#" class="ordenador">
                    Inicio
                </a>
                <a href="#" class="ordenador">
                    Últimos
                </a>
                <a href="#" class="ordenador">
                    Vídeos
                </a>
            </div>
            <!-- parte derecha -->
            <div class="rightNav ordenador">
                <a href="#" role="button" class="btn btn-sm  btn-primary  float-right mr-3">Contacto</a>
            </div>
        </div>
        <!-- menú secundario desplegable  -->
        <div class="leftSecondMenu">
            <div class="container">
                <div class="row m-0 py-md-5 py-4">
                    <div class="col-12 mb-4 movil">
                        <a href="#" role="button" class="btn btn-sm btn-primary  float-left">Inicio</a>
                        <a href="#" role="button" class="btn btn-sm btn-primary  float-left ml-3">Últimos</a>
                        <a href="#" role="button" class="btn btn-sm btn-primary  float-left ml-3">Vídeos</a>
                    </div>
                    <div class="col-md-3 col-6 mb-md-0 mb-5">
                        <a class="tituloSubmenu">Noticias</a>
                        <a href="#" class="enlaceSeccion">Ejemplo de categoria 1</a>
                        <a href="#" class="enlaceSeccion">Ejemplo de categoria 2</a>
                    </div>
                    <div class="col-md-3 col-6">
                        <a class="tituloSubmenu">Magazine</a>
                        <a href="#" class="enlaceSeccion">Ejemplo de categoria 1</a>
                        <a href="#" class="enlaceSeccion">Ejemplo de categoria 2</a>
                    </div>

                    <div class="col-md-3 col-6">
                        <a href="#" class="enlace">
                            <div class="col-12 px-0 pb-3">
                                <p class="tituloSubmenu2">Contacto</p>
                            </div>
                            <img class="particularImgMenu" src="static/img/particular.png" alt="particulares">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- logotipos centrales del nav-->
    <img src="static/img/favicon.png" alt="NM" class="minicon">

    <div class="centerNav">
        <a href="#" id="darkLogo">
            <img src="static/img/logoLetrasDark.png" alt="">
        </a>
    </div>
    <!-- linea que da efecto al nav -->
    <div class="bottomNav"></div>
    <!-- overlay -->
    <div class="overlay1"></div>
    <!-- buscador -->
    <div class="buscador">
        <div class="row p-3 p-md-0">
            <div class="col-md-3"></div>
            <div class="col-md-6 mt-2 mb-2 p-3">
                <form method="get" action="{% url 'buscar' %}">
                    <input type="text" name='q' required class="formularioContacto busquedaMotorCampo" id="inputBuscador" placeholder="Buscar...">
                    <button class="btn-primary btn border-0 float-right px-md-5 py-md-3 px-3 py-2" type="submit"><span class="icon-search"></span></button>
                </form>
            </div>
        </div>
    </div>
    <div class="overlay2"></div>

    <!---
    CUERPO
    ---->




    <div class="pt-md-5 contenedorPrincipal pb-5">

            hola esto es una prueba de texto
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- JavaScript propio -->
    <script src="static/js/nav.js"></script>
  </body>
</html>
