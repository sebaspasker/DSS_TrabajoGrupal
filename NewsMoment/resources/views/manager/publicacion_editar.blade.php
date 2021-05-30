@extends('manager/base')

@section('titulo', 'Manager - NewsMoment')
@section('styles', 'publicaciones')

@section('cuerpo')
<form method="POST" enctype="multipart/form-data" >
@method('put')
@csrf
	<!-- TODO hacer que funcione -->
	<!-- TODO redireccionar correctamente al post de crear nuevo usuario -->
	@csrf
	<div class="row m-0">
		<!-- botón de volver a atrás -->
		<div class="col-12 p-0 mb-2">
			<a  role="button" href="javascript: history.go(-1)" class="btn btn-sm btn-primary shadowHover" style="font-size: 10px;"><span class="icon-arrow-left2"></span> Volver atrás</a>
		</div>
		<div class="col-md-8 p-3 bg-white rounded shadow-sm">
			<div class="row m-0">
				<!--- head -->
				<div class="col-12 p-0">
					<select name="category" required class="btn-outline-primary custom-select" style="width:120px"id="inputGroupSelect01">
						@foreach ($categorias as $categoria)
							<option value="{{$categoria->name}}"
								@if ($categoria->name == $publication->category)
									selected
								@endif
							>
								{{ $categoria->name }}
							</option>
						@endforeach
					</select>
				</div>
				<div class="col-12 p-0">
					<textarea name="title" required rows="1" class="tituloPublicacion border-0" placeholder="Titulo de la publicación">{{$publication->title}}</textarea>
				</div>
				<div class="col-12 p-0">
					<textarea name="subtitle" required id="" rows="1" class="subtituloPublicacion border-0" placeholder="Subtitulo de la publicación">{{$publication->subtitle}}</textarea>
				</div>
				<div class="col-12 px-0 pb-4 mb-4 border-bottom">
					<div class="fechaPublicacion">{{$publication->created_at}}</div>
				</div>
				<!-- img -->
				<small class="text-secondary mb-1" style="font-size: 10px">Pulsa encima para añadir una imagen</small>
				<div class="col-12 p-0">
					<div class="publicacionImg bg-light">
						<div id="bluh" style="background: url('{{$publication->image_url}}') no-repeat; background-size: cover; background-position: center"></div>
						<input  type="file" name="image_url" accept="image/*" class="clearablefileinput" id="id_imagen" value="{{$publication->image_url}}">
					</div>
				</div>
				<!-- 
					video 
				-->
				<div class="col-12 bg-light p-3 mt-4">
					<div class="radio">
						<strong class="mr-3">Video</strong>
						@if ($publication->has_video == 1)
							<input type="radio" value="True" name="has_video" id="siButton">
							<label for="siButton">SI</label>
							<input type="radio" value="False" name="has_video"  id="noButton" checked>
							<label for="noButton">NO</label>
						@else
							<input type="radio" value="False" name="has_video" id="siButton">
							<label for="siButton">SI</label>
							<input type="radio" value="True" name="has_video"  id="noButton" checked>
							<label for="noButton">NO</label>
						@endif 
						
					</div>
					<div class="mt-4 pt-4 border-top" id="videoIdentificador">
						<input type="text" name="video_url" class="form-control" placeholder="Identificador de video" value="{{ $publication->video_url}}">
					</div>
				</div>
				<!-- source -->
				<div class="cuerpoPublicacion col-12 px-0 pt-3 mt-3 border-top">
					<input type="text" name="source" class="form-control" placeholder="Fuente de la imagen/video" value="{{ $publication->source}}">
				</div>
				<!-- body -->
				<div class="cuerpoPublicacion col-12 px-0 pt-4 mt-3 border-top">
					<textarea name="body" required rows="1"class="border-0" placeholder="Cuerpo de la publicación">{{ $publication->body}}</textarea>
				</div>
				<!-- footer -->
				<div class="col-12 p-0 pt-4 mt-4 border-top text-right">
					<button type="submit" class="btn btn-primary">Modificar publicación</button>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection 
