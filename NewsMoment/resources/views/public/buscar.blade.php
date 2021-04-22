@extends('public/base')

@section('titulo', 'Buscador - NewsMoment')
    

@section('cuerpo')
    <div class="bg-dark" style="width: 100%">
		<div class="contenedor">
			<div class="row m-0">
				<div class="col-12 pt-4 pb-4">
					<form action="{{ route('buscar') }}">
						<input value="Resultado" type="text" name='q' required class="formularioContacto busquedaMotorCampo" placeholder="Buscar...">
						<button class="btn-primary btn border-0 rounded float-right px-md-5 py-md-3 px-3 py-2" type="submit"><span class="icon-search"></span></button>
					</form>
				</div>
			</div>
		</div>
	</div>


	<div class="contenedor mt-0 mb-5">
		<div class="row m-0 p-3">
			<div class="col-12 px-0 tituloUltimos pb-3 mb-4 mt-md-4 mt-3">
				RESULTADOS
			</div>

			<!-- 
			ejemplo de publicacion
			-->
			<div class="col-md-8 px-0 border-bottom pb-4 mb-4">
				<a class="enlace" href="{{ route('publicacion') }}">
					<div class="row m-0">
						<div class="col-5 p-0">
							<div class="imagenUltimos" style="background: url('https://ep01.epimg.net/politica/imagenes/2016/06/29/actualidad/1467185738_087126_1467185863_noticia_normal_recorte1.jpg') no-repeat;background-size: cover; background-position: center !important;"></div>
						</div>
						<div class="col-7 pl-4 pr-0">
							<div class="tituloPublicacionUltimos">
								Unidas Podemos no tolerará el “pinkwashing” de Barcala con el Plan LGTBI 
                            	y le exige “romper con la ultraderecha” para aplicarlo
							</div>
							<div class="subTituloPublicacionUltimos">
								La coalición critica “la falta de palabra” de la concejala Mari Carmen Sánchez 
								al no facilitar el documento ni a las entidades sociales ni a los grupos políticos, 
								como se comprometió, antes de su aprobación en la junta de gobierno y critica 
								que nazca sin presupuesto con la complacencia del Partido Socialista
							</div>
							<div class="descripcionImagenLeft">
								<b class="text-light">Raúl Sigüenza</b> - 22/4/2021
							</div>
						</div>
					</div>
				</a>
			</div>
			<!-- 
			ejemplo de publicacion
			-->
			<div class="col-md-8 px-0 pb-4 mb-4">
				<a class="enlace" href="{{ route('publicacion') }}">
					<div class="row m-0">
						<div class="col-5 p-0">
							<div class="imagenUltimos" style="background: url('https://ep01.epimg.net/politica/imagenes/2016/06/29/actualidad/1467185738_087126_1467185863_noticia_normal_recorte1.jpg') no-repeat;background-size: cover; background-position: center !important;"></div>
						</div>
						<div class="col-7 pl-4 pr-0">
							<div class="tituloPublicacionUltimos">
								Unidas Podemos no tolerará el “pinkwashing” de Barcala con el Plan LGTBI 
                            	y le exige “romper con la ultraderecha” para aplicarlo
							</div>
							<div class="subTituloPublicacionUltimos">
								La coalición critica “la falta de palabra” de la concejala Mari Carmen Sánchez 
								al no facilitar el documento ni a las entidades sociales ni a los grupos políticos, 
								como se comprometió, antes de su aprobación en la junta de gobierno y critica 
								que nazca sin presupuesto con la complacencia del Partido Socialista
							</div>
							<div class="descripcionImagenLeft">
								<b class="text-light">Raúl Sigüenza</b> - 22/4/2021
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
@endsection
    