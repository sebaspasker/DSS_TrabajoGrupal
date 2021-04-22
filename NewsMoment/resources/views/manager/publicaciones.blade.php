@extends('manager/base')

@section('titulo', 'Buscador - NewsMoment')
@section('styles', 'publicaciones')

@section('cuerpo')

<div class="row m-0">
	<div class="col-12 p-3 bg-white rounded shadow-sm">
		<!-- title -->
		<h1 class="pb-sm-2 pt-2 mb-0">
			Todas tus publicaciones
			<a role="button" href="#" class="btn btn-primary btn-sm float-right mt-1" style="font-size: .675rem;">Nueva</a>
		</h1>
		<!-- top -->
		<div class="row m-0">
			<div class="col-12  pb-0 mt-4 pl-2 pr-2 mb-0 border-bottom ">
				<div class="listadoDocumentos">
					<div class="imagenDocumento">
						<p><span class="icon-newspaper"></span></p>
					</div>
					<div class="datosDocumento">
						<p>Título</p>
					</div>
					<div class="eliminarDocumento">
						<p>Eliminar</p>
					</div>
				</div>
			</div>
		</div>
        <!-- publicacion -->
        <div class="col-12  px-2 py-3  listado2 shadowHover">
            <a href="#" class="enlace">
                <div class="listadoDocumentos2">
                    <div class="imagenDocumento">
                        <div class="" style="background: url('Https://ep01.epimg.net/politica/imagenes/2016/06/29/actualidad/1467185738_087126_1467185863_noticia_normal_recorte1.jpg') no-repeat;background-size: cover; background-position: center !important;"></div>
                    </div>
                    <div class="datosDocumento2">
                        <p class="font-weight-bold" style="margin-top: 1px">
                            Unidas Podemos no tolerará el “pinkwashing” de Barcala con el 
                            Plan LGTBI y le exige “romper con la ultraderecha” para aplicarlo
                        </p>
                        <p class="font-weight-lighter" style="font-size: 12px">Raúl Sigüenza - 22/4/2020</p>
                    </div>
                    <div class="eliminarDocumento text-right">
                        <a href="#" role="button" class="btn btn-sm btn-danger "><span class="icon-bin2"></span></a>
                    </div>
                </div>
            </a>
        </div>
        <!-- publicacion -->
        <div class="col-12  px-2 py-3  listado2 shadowHover">
            <a href="#" class="enlace">
                <div class="listadoDocumentos2">
                    <div class="imagenDocumento">
                        <div class="" style="background: url('Https://ep01.epimg.net/politica/imagenes/2016/06/29/actualidad/1467185738_087126_1467185863_noticia_normal_recorte1.jpg') no-repeat;background-size: cover; background-position: center !important;"></div>
                    </div>
                    <div class="datosDocumento2">
                        <p class="font-weight-bold" style="margin-top: 1px">
                            Unidas Podemos no tolerará el “pinkwashing” de Barcala con el 
                            Plan LGTBI y le exige “romper con la ultraderecha” para aplicarlo
                        </p>
                        <p class="font-weight-lighter" style="font-size: 12px">Raúl Sigüenza - 22/4/2020</p>
                    </div>
                    <div class="eliminarDocumento text-right">
                        <a href="#" role="button" class="btn btn-sm btn-danger "><span class="icon-bin2"></span></a>
                    </div>
                </div>
            </a>
        </div>





	</div>
</div>


@endsection