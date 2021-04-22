@extends('base')

@section('titulo', 'Página principal - NewsMoment')
    

@section('cuerpo')
    <div class="contenedorPrincipal pb-5 pt-md-5">
        <!-- 
        seccion principal
        -->
        <div class="row m-0">
            <!-- columna izquierda -->
            <div class="col-md-3 border-sm-right order-md-1 order-2">
                <!-- ejemplo de publicación 1 -->
                <div class="leftInicio border-bottom">
                    <a href="{{route('publicacion')}}" class="enlacePublicacion">
                        <div class="imgLeftInicio" style="background: url('https://ep01.epimg.net/politica/imagenes/2016/06/29/actualidad/1467185738_087126_1467185863_noticia_normal_recorte1.jpg') no-repeat;background-size: cover; background-position: center !important;"></div>
                            <div class="descripcionImagenLeft">
                                <b class="text-light">Raúl Sigüenza</b> - 22/4/2021
                            </div>
                        <div class="tituloLeftInicio">
                            Unidas Podemos no tolerará el “pinkwashing” de Barcala con el Plan LGTBI 
                            y le exige “romper con la ultraderecha” para aplicarlo
                        </div>
                        <div class="subtituloLeftInicio movil">
                            La coalición critica “la falta de palabra” de la concejala Mari Carmen Sánchez 
                            al no facilitar el documento ni a las entidades sociales ni a los grupos políticos, 
                            como se comprometió, antes de su aprobación en la junta de gobierno y critica 
                            que nazca sin presupuesto con la complacencia del Partido Socialista
                        </div>
                    </a>
                </div>
                <!-- ejemplo de publicación 2 -->
                <div class="leftInicio border-only-sm-bottom mb-md-0 pb-md-0">
                    <a href="{{route('publicacion')}}" class="enlacePublicacion">
                        <div class="imgLeftInicio" style="background: url('https://ep01.epimg.net/politica/imagenes/2016/06/29/actualidad/1467185738_087126_1467185863_noticia_normal_recorte1.jpg') no-repeat;background-size: cover; background-position: center !important;"></div>
                            <div class="descripcionImagenLeft">
                                <b class="text-light">Raúl Sigüenza</b> - 22/4/2021
                            </div>
                        <div class="tituloLeftInicio">
                            Unidas Podemos no tolerará el “pinkwashing” de Barcala con el Plan LGTBI 
                            y le exige “romper con la ultraderecha” para aplicarlo
                        </div>
                        <div class="subtituloLeftInicio movil">
                            La coalición critica “la falta de palabra” de la concejala Mari Carmen Sánchez 
                            al no facilitar el documento ni a las entidades sociales ni a los grupos políticos, 
                            como se comprometió, antes de su aprobación en la junta de gobierno y critica 
                            que nazca sin presupuesto con la complacencia del Partido Socialista
                        </div>
                    </a>
                </div>
            </div>
            <!-- 
            columna central 
            -->
            <div class="col-md-6 pb-4  order-md-2 order-1 mb-md-0 pb-md-0">
                <div class="centerInicio border-only-sm-bottom pb-md-0 pb-4">
                    <a href="{{route('publicacion')}}" class="enlacePublicacion">
                        <div class="imgCenterInicio mb-3"
                            style="background: url('https://ep01.epimg.net/politica/imagenes/2016/06/29/actualidad/1467185738_087126_1467185863_noticia_normal_recorte1.jpg') no-repeat;background-size: cover; background-position: center !important;">
                        </div>
                        <div class="descripcionImagenLeft text-center">
                            <b class="text-light">Raúl Sigüenza</b> - 22/4/2021</div>
                        <div class="tituloCenterInicio">
                            Unidas Podemos no tolerará el “pinkwashing” de Barcala con el Plan LGTBI 
                            y le exige “romper con la ultraderecha” para aplicarlo
                        </div>
                        <div class="subtituloCenterInicio">
                            La coalición critica “la falta de palabra” de la concejala Mari Carmen Sánchez 
                            al no facilitar el documento ni a las entidades sociales ni a los grupos políticos, 
                            como se comprometió, antes de su aprobación en la junta de gobierno y critica 
                            que nazca sin presupuesto con la complacencia del Partido Socialista
                        </div>
                    </a>
                </div>
                <a href="#" target="_blank">
                    <img src="https://www.yonosoydiario.com/media/banners/bannercovid19ynsD.gif" alt="anuncio" class="w-100 movil mt-3 border-bottom pb-3">
                </a>
            </div>
            <!-- columna derecha -->
            <div class="col-md-3 border-sm-left order-3">
                <div class="rightInicio  border-bottom">
                    <div class="tradingview-widget-container bg-dark rounded " style="height:90px">
                        <div class="tradingview-widget-container__widget"></div>
                        <script
                            type="text/javascript"
                            src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js"
                            async="async">{
                                "symbols": [{
                                        "proName": "FOREXCOM:SPXUSD",
                                        "title": "S&P 500"
                                    }, {
                                        "proName": "FOREXCOM:NSXUSD",
                                        "title": "Nasdaq 100"
                                    }, {
                                        "proName": "FX_IDC:EURUSD",
                                        "title": "EUR/USD"
                                    }, {
                                        "description": "IBEX 35",
                                        "proName": "TVC:IBEX35"
                                    }
                                ],
                                "colorTheme": "dark",
                                "isTransparent": true,
                                "displayMode": "adaptive",
                                "locale": "es"
                            }
                        </script>
                    </div>
                </div>
                <a href="#" target="_blank">
                    <img src="https://www.yonosoydiario.com/media/banners/bannercovid19ynsD.gif" alt="anuncio" class="w-100 ordenador">
                </a>
            </div>
        </div>




    </div>
@endsection

@section('nav_js', 'static/js/nav_inicio.js')
    