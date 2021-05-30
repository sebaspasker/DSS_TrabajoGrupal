@extends('manager/base')

@section('titulo', 'Manager - NewsMoment')
@section('styles', 'categorias')

@section('cuerpo')

<form method="POST" enctype="multipart/form-data">
@csrf
@method('put')
	<div class="row m-0">
		<!-- botón de volver a atrás -->
		<div class="col-12 p-0 mb-2">
			<a  role="button" href="javascript: history.go(-1)" class="btn btn-sm btn-primary shadowHover" style="font-size: 10px;"><span class="icon-arrow-left2"></span>Volver atrás</a>
		</div>
		<!-- end botón -->
		<div class="col-md-8 p-3 bg-white rounded shadow-sm">
			<div class="row m-0">
				<!-- img -->
				<small class="text-secondary mb-1" style="font-size: 10px">Pulsa encima para cambiar</small>
				<div class="col-12 p-0">
					<div class="w-100 bg-light" style="height: 130px; position: relative;">
						<div id="bluh" class="w-100 h-100"  style="background: url('{{$category->imagen}}') no-repeat; background-size: cover; background-position: center"></div>
						<input  type="file" name="imagen" accept="image/*" class="clearablefileinput" id="id_imagen">
					</div>
				</div>
				<!-- name -->
				<div class="col-12 p-0">
                    <input type="text" name="name" value="{{$category->name}}" class="form-control mt-3" placeholder="Nombre de la categoria">
				</div>
				<!-- footer -->
				<div class="col-12 p-0 mt-3 text-right">
					<button type="submit" class="btn btn-primary">Modificar Categoría</button>
				</div>
			</div>
		</div>
	</div>
</form>


@endsection