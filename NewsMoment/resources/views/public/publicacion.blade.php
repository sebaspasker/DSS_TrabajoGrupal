@extends('public/base')

@section('titulo', 'Publicacion - NewsMoment')
    
@section('cuerpo') 
<div class="contenedor pb-5">
	<div class="row m-0 p-3">
		<!-- 
			cabecera de la publicacion
		-->
		<div class="col-12 cabeceraPublicacion px-0">
			<div class="row m-0">
				<div class="col-12 p-0">
					<a href="{{route('categoria', $categoria->id )}}" class="categoriaEtiqueta">
					{{ $categoria->name }}<span class="icon-chevron-right"></span>
					</a>
				</div>
			</div>
			<div class="tituloPublicacion">
                {{ $publication->title }}
            </div>
			<div class="subtituloPublicacion">
               {{ $publication->subtitle }}
            </div>
			<!-- 
				autor de la publicasión
			-->
			<a href="#" class="enlace">
				<div class="escritorPublicacion my-2 border-top border-bottom py-3">
					<div class="imagenAutorPublicacion"  style="background: url('https://www.isesinstituto.com/sites/default/files/istock-1158245282.jpg') no-repeat;background-size: cover; background-position: center !important;"></div>
					<div class="descripcionAutorPublicacion pl-3">
						<h1 class="mb-0 mb-md-1"> Raúl Sigüenza </h1>
						<h2 class="mb-0">Descripción del autor</h2>
					</div>
				</div>
			</a>
			<div class="fechaPublicacion">
				{{ $publication->created_at->format('j F, Y')}}
				<label class="visitasPublicacion mt-2 ml-3">
					{{ $publication->views_counter }} <span class="icon-eye ml-1"></span>
				</label>
			</div>
		</div>
		<!-- 
			cuerpo de la publicación 
		-->
		<div class="col-12 px-0">
			<div class="row m-0">
				<!-- 
					anuncios iniciales ordenador
				-->
				<div class="col-md-4 order-md-2 order-1 px-md-3 px-0">
					<div class="anuncio ordenador mt-2">
						<p class="mb-2">Anuncio</p>
							<a href="{{ $banner1->url }}" target="_blank">
								<img src="{{ $banner1->image_url }}" alt="titulo" class="mr-md-0 mr-2 mb-md-3">
							</a>
                            <a href="{{ $banner2->url }}" target="_blank">
								<img src="{{ $banner2->image_url }}" alt="titulo">
							</a>
					</div>
				</div>
				<!-- 
					imágen y texto de la publicación 
				-->
				<div class="col-md-8 order-md-1 order-2 px-0  mt-3 pt-3 border-top ">
					<div class="row m-0">
						<!-- 
							imagen de la publicación 
						-->
						<div class="col-12 p-0">
							<div class="imagenPublicacion mb-1" style="background: url('{{ $publication->image_url }}') no-repeat;background-size: cover; background-position: center !important;"></div>
							<!-- source de la publicacion -->
                            <p class="text-right mb-0 fuenteImg text-light">{{ $publication->source }}</p> 
						</div>
						<!-- 
							anuncios iniciales movil
						-->
						<div class="col-12 p-0">
							<div class="anuncio mt-2 pt-3 border-top movil">
								<p>Anuncio</p>
                                <a href="{{ $banner1->url }}"target="_blank">
                                    <img src="{{ $banner1->image_url }}" alt="titulo" class="mr-2 mb-3 ">
                                </a>
                                <a href="{{ $banner2->url }}"target="_blank">
                                    <img src="{{ $banner2->image_url }}" alt="titulo">
                                </a>
							</div>	
						</div>
						<!-- 
							body de la publicacion 
						-->
						<div class="col-12 p-0">
							<div class="cuerpoPublicacion mt-2 pt-3 border-top">    
								{{ $publication->body }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    	</div>
</div>
@endsection
    
    