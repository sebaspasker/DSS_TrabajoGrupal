@extends('base')

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
					<a href="{{route('categoria')}}" class="categoriaEtiqueta">
					POLÍTICA<span class="icon-chevron-right"></span>
					</a>
				</div>
			</div>
			<div class="tituloPublicacion">
                Unidas Podemos no tolerará el “pinkwashing” de Barcala con el Plan LGTBI 
                y le exige “romper con la ultraderecha” para aplicarlo
            </div>
			<div class="subtituloPublicacion">
                La coalición critica “la falta de palabra” de la concejala Mari Carmen Sánchez 
                al no facilitar el documento ni a las entidades sociales ni a los grupos políticos, 
                como se comprometió, antes de su aprobación en la junta de gobierno y critica 
                que nazca sin presupuesto con la complacencia del Partido Socialista
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
				Abr. 21, 2021, 3:06 p.m. 
				<label class="visitasPublicacion mt-2 ml-3">
					100 <span class="icon-eye ml-1"></span>
				</label>
			</div>
			<!-- 
				compartir en rede sociales
			-->
			
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
							<a href="#" target="_blank">
								<img src="https://www.yonosoydiario.com/media/banners/Bannerpequenuevolilus.png" alt="titulo" class="mr-md-0 mr-2 mb-md-3">
							</a>
                            <a href="#" target="_blank">
								<img src="https://www.yonosoydiario.com/media/banners/Bannerpequenuevolilus.png" alt="titulo">
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
							<div class="imagenPublicacion mb-1" style="background: url('https://ep01.epimg.net/politica/imagenes/2016/06/29/actualidad/1467185738_087126_1467185863_noticia_normal_recorte1.jpg') no-repeat;background-size: cover; background-position: center !important;"></div>
							<!-- source de la publicacion -->
                            <p class="text-right mb-0 fuenteImg text-light">Fuente de la imagen</p> 
						</div>
						<!-- 
							anuncios iniciales movil
						-->
						<div class="col-12 p-0">
							<div class="anuncio mt-2 pt-3 border-top movil">
								<p>Anuncio</p>
                                <a href="#"target="_blank">
                                    <img src="https://www.yonosoydiario.com/media/banners/Bannerpequenuevolilus.png" alt="titulo" class="mr-2 mb-3 ">
                                </a>
                                <a href="#"target="_blank">
                                    <img src="https://www.yonosoydiario.com/media/banners/Bannerpequenuevolilus.png" alt="titulo">
                                </a>
							</div>	
						</div>
						<!-- 
							body de la publicacion 
						-->
						<div class="col-12 p-0">
							<div class="cuerpoPublicacion mt-2 pt-3 border-top">
								Unidas Podemos ha valorado positivamente los pasos hacia adelante para la aprobación de un Plan Estratégico LGTBI para Alicante y ha felicitado a los colectivos y entidades vinculados a su lucha “por empujar hacia una ciudad más inclusiva y justa en derechos”, algo que también considera “una victoria propia al ser nuestro grupo quien ha puesto en el centro de la agenda política de esta ciudad las reivindicaciones sociales de las personas gais, lesbianas, bisexuales, intersexuales y trans, arrastrando a regañadientes a la concejala del área, Mari Carmen Sánchez, que ha demostrado de manera reiterada en los dos años de mandato su completo desconocimiento sobre esta cuestión”.
                                La coalición de izquierdas recuerda que en los últimos meses del gobierno de Barcala “Alicante se ha quedado en su Pleno municipal sin declaración institucional por el día de los derechos LGTBI y sin el reconocimiento a las visibilidad de las personas trans, al votar reiteradamente en contra, el equipo de gobierno junto a la ultraderecha, de iniciativas que reivindicaban políticas locales específicas para el colectivo”. Un fracaso, en opinión de Unidas Podemos “exclusivo de Mari Carmen Sánchez, en guerra permanente con las entidades referentes en la ciudad y también con nuestro grupo político". “Sánchez intenta liderar un espacio que no le corresponde, con su gestión más que cuestionada por el activismo alicantino”.
                                Para Xavier López, portavoz de Unidas Podemos en el ayuntamiento de Alicante, el Plan Estratégico LGTBI “se ha ocultado de manera deliberada a las entidades y a los grupos que estamos verdaderamente ejerciendo la oposición” como se había comprometido y recuerda “que solo se facilitó una presentación del estudio, sin entrar a profundizar en las medidas concretas que se plantean implementar”. 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    	</div>
</div>
@endsection
    