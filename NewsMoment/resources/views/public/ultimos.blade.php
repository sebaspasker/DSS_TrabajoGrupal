@extends('public/base')

@section('titulo', 'Últimas publicaciones - NewsMoment')
    

@section('cuerpo')
    

    <div class="contenedor mt-md-5 mb-5">
		<div class="row m-0 p-3">
			<div class="col-12 px-0 tituloUltimos pb-3 mb-4 mt-md-4 mt-3">
				ÚLTIMAS PUBLICACIONES
			</div>
			<!-- 
			ejemplo de publicacion
			-->
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



			<div class="col-12">

				{{ $publications->links() }}
			</div>
		</div>
	</div>





@endsection

    
