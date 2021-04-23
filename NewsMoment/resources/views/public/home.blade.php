@extends('public/base')

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
                        <div class="imgLeftInicio" style="background: url('{{$publication2->image_url}}') no-repeat;background-size: cover; background-position: center !important;"></div>
                            <div class="descripcionImagenLeft">
                                <b class="text-light">{{$publication2->editor_email}}</b> - {{$publication2->created_at->format('j F, Y')}}
                            </div>
                        <div class="tituloLeftInicio">
                             {{$publication2->title}}
                        </div> 
                        <div class="subtituloLeftInicio">
                            {{$publication2->subtitle}}
                        </div>
                    </a>
                </div>
                <!-- ejemplo de publicación 2 -->
                <div class="leftInicio border-only-sm-bottom mb-md-0 pb-md-0">
                    <a href="{{route('publicacion')}}" class="enlacePublicacion">
                        <div class="imgLeftInicio" style="background: url('{{$publication3->image_url}}') no-repeat;background-size: cover; background-position: center !important;"></div>
                            <div class="descripcionImagenLeft">
                                <b class="text-light">{{$publication3->editor_email}}</b> - {{$publication3->created_at->format('j F, Y')}}
                            </div>
                        <div class="tituloLeftInicio">
                            {{$publication3->title}}
                        </div>
                        <div class="subtituloLeftInicio">
                            {{$publication3->subtitle}}
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
                            style="background: url('{{$publication1->image_url}}') no-repeat;background-size: cover; background-position: center !important;">
                        </div>
                        <div class="descripcionImagenLeft text-center">
                            <b class="text-light">{{$publication1->editor_email}}</b> - {{$publication1->created_at->format('j F, Y')}}</div>
                        <div class="tituloCenterInicio">
                            {{$publication1->title}}
                        </div>
                        <div class="subtituloCenterInicio">
                            {{$publication1->subtitle}}
                        </div>
                    </a>
                </div>
                <a href="{{$banner->url}}" target="_blank">
                    <img src="{{$banner->image_url}}" alt="anuncio" class="w-100 movil mt-3 border-bottom pb-3">
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
                <a href="{{$banner->url}}" target="_blank">
                    <img src="{{$banner->image_url}}" alt="anuncio" class="w-100 ordenador">
                </a>
            </div>
        </div>




    </div>
@endsection

@section('nav_js', 'static/js/nav_inicio.js')
    