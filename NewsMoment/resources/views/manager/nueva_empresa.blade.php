@extends('manager/base')

@section('titulo', 'Manager - NewsMoment')
@section('styles', 'empresas')

@section('cuerpo')

<form method="POST" enctype="multipart/form-data">
	<div class="row m-0">
		<!-- botón de volver a atrás -->
		<div class="col-12 p-0 mb-2">
			<a  role="button" href="javascript: history.go(-1)" class="btn btn-sm btn-primary shadowHover" style="font-size: 10px;"><span class="icon-arrow-left2"></span> Volver atrás</a>
		</div>
		<!-- end botón -->
		<div class="col-md-8 p-3 bg-white rounded shadow-sm">
			<div class="row m-0">
				<!-- img -->
				<small class="text-secondary mb-1" style="font-size: 10px">Pulsa encima para cambiar</small>
				<div class="col-12 p-0">
					<div class="bannerCreationImg bg-light shadowHover">
						<div id="bluh" style="background: url('') no-repeat;background-size: cover; background-position: center !important;"></div>
						<input  type="file" required name="imagen" accept="image/*" class="clearablefileinput" id="id_imagen" value="">
					</div>
				</div>
				<!-- name -->
				<div class="col-12 p-0">
                    <input type="text" name="nombre" class="form-control mt-3" placeholder="Nombre de la empresa" value="">
				</div>
				<!-- footer -->
				<div class="col-12 p-0 mt-3 text-right">
					<button type="submit" class="btn btn-primary">Crear Empresa</button>
				</div>
			</div>
		</div>
	</div>
</form>


@endsection
