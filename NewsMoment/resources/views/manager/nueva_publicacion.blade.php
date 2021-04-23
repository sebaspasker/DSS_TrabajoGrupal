@extends('manager/base')

@section('titulo', 'Manager - NewsMoment')
@section('styles', 'publicaciones')

@section('cuerpo')
<form method="POST" enctype="multipart/form-data">
	<div class="row m-0">
		<!-- botón de volver a atrás -->
		<div class="col-12 p-0 mb-2">
			<a  role="button" href="javascript: history.go(-1)" class="btn btn-sm btn-primary shadowHover" style="font-size: 10px;"><span class="icon-arrow-left2"></span> Volver atrás</a>
		</div>
		<div class="col-md-8 p-3 bg-white rounded shadow-sm">
			<div class="row m-0">
				<!--- head -->
				<div class="col-12 p-0">
					<select name="categoria" required class="btn-outline-primary custom-select" style="width:120px"id="inputGroupSelect01">
                        <option value="0">Política</option>
                        <option value="0">Coronavirus</option>
					</select>
				</div>
				<div class="col-12 p-0">
					<textarea name="title" required rows="1" class="tituloPublicacion border-0" placeholder="Titulo de la publicación"></textarea>
				</div>
				<div class="col-12 p-0">
					<textarea name="sub_title" required id="" rows="1" class="subtituloPublicacion border-0" placeholder="Subtitulo de la publicación"></textarea>
				</div>
				<div class="col-12 px-0 pb-4 mb-4 border-bottom">
					<div class="fechaPublicacion">Aquí se mostrará la fecha</div>
				</div>
				<!-- img -->
				<small class="text-secondary mb-1" style="font-size: 10px">Pulsa encima para añadir una imagen</small>
				<div class="col-12 p-0">
					<div class="publicacionImg bg-light">
						<div id="bluh" style="background: #f2f2f2"></div>
						<input  type="file" required name="imagen" accept="image/*" class="clearablefileinput" id="id_imagen" value="">
					</div>
				</div>
				<!-- 
					video 
				-->
				<div class="col-12 bg-light p-3 mt-4">
					<div class="radio">
						<strong class="mr-3">Video</strong> 
						<input type="radio" value="True" name="has_video" id="siButton">
						<label for="siButton">SI</label>
						<input type="radio" value="False" name="has_video"  id="noButton" checked>
						<label for="noButton">NO</label>
					</div>
					<div class="mt-4 pt-4 border-top" id="videoIdentificador">
						<input type="text" name="video" class="form-control" placeholder="Identificador de video" value="">
					</div>
				</div>
				<!-- source -->
				<div class="cuerpoPublicacion col-12 px-0 pt-3 mt-3 border-top">
					<input type="text" name="source" class="form-control" placeholder="Fuente de la imagen/video" value="">
				</div>
				<!-- body -->
				<div class="cuerpoPublicacion col-12 px-0 pt-4 mt-3 border-top">
					<textarea name="body" required rows="1"class="border-0" placeholder="Cuerpo de la publicación"></textarea>
				</div>
				<!-- footer -->
				<div class="col-12 p-0 pt-4 mt-4 border-top text-right">
					<button type="submit" class="btn btn-primary">Guardar publicación</button>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection 