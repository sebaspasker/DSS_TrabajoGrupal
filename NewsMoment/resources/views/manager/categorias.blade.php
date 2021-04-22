@extends('manager/base')

@section('titulo', 'Buscador - NewsMoment')
@section('styles', 'categorias')

@section('cuerpo')

<div class="row m-0">
	<div class="col-12 p-0 bg-white rounded shadow-sm">
		<!-- title -->
		<h1 class="pb-sm-2 pt-2 mb-4 pb-3 px-3 mt-3">
			Todas tus categorías
			<a role="button" href="#" class="btn btn-primary btn-sm float-right mt-1" style="font-size: .675rem;">Nueva</a>
		</h1>
		<!-- categorias -->
		<div class="row m-0 pb-3">
            <!-- categoria -->
            <div class="col-md-4 mb-3">
                <a href="#" class="enlace">
                    <div class="categoriaImg shadowHover" style="background: linear-gradient(to left, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.4) 60%, rgba(0, 0, 0, 0.8) 100%), url('https://www.yonosoydiario.com/media/categorias/5530085.jpeg') no-repeat;background-size: cover; background-position: center !important;">
                        <p class="tituloCategoria">Coronavirus</p>
                        <p class="blogCategoria">Noticias</p>
                    </div> 
                    <a role="button" href="#" class="btn btn-danger btn-sm buttonCategoria"><span class="icon-bin2"></span></a>
                </a>
            </div>
            <!-- categoria -->
            <div class="col-md-4 mb-3">
                <a href="#" class="enlace">
                    <div class="categoriaImg shadowHover" style="background: linear-gradient(to left, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.4) 60%, rgba(0, 0, 0, 0.8) 100%), url('https://www.caracteristicas.co/wp-content/uploads/2019/05/administracion-publica-e1589079453616.jpg') no-repeat;background-size: cover; background-position: center !important;">
                        <p class="tituloCategoria">Política</p>
                        <p class="blogCategoria">Noticias</p>
                    </div> 
                    <a role="button" href="#" class="btn btn-danger btn-sm buttonCategoria"><span class="icon-bin2"></span></a>
                </a>
            </div>
		</div>
	</div>	
</div>
@endsection