@extends('public/base')

@section('titulo', 'Buscador - NewsMoment')
    

@section('cuerpo')
    <div class="bg-dark" style="width: 100%">
		<div class="contenedor">
			<div class="row m-0">
				<div class="col-12 pt-4 pb-4">
					<form action="{{ route('buscar') }}">
						<input value="{{ $query }}" type="text" name='q' required class="formularioContacto busquedaMotorCampo" placeholder="Buscar...">
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
			@if($publications)
				@foreach ($publications as $publication)
					<div class="col-md-8 px-0 pb-4 mb-4">
						<a class="enlace" href="{{ route('publicacion') }}">
							<div class="row m-0">
								<div class="col-5 p-0">
									<div class="imagenUltimos" style="background: url('{{$publication->image_url}}') no-repeat;background-size: cover; background-position: center !important;"></div>
								</div>
								<div class="col-7 pl-4 pr-0">
									<div class="tituloPublicacionUltimos">
										{{$publication->title}}
									</div>
									<div class="subTituloPublicacionUltimos">
										{{$publication->subtitle}}
									</div>
									<div class="descripcionImagenLeft">
										<b class="text-light">{{$publication->editor_email}}</b> - {{$publication->created_at}}
									</div>
								</div>
							</div>
						</a>
					</div>
				@endforeach
			@else
				hola
			@endif
		</div>
	</div>
@endsection
    