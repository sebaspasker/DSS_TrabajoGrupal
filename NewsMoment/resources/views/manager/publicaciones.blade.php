

@extends('manager/base')

@section('titulo', 'Manager - NewsMoment')
@section('styles', 'publicaciones')

@section('cuerpo')

<div class="row m-0">
	<div class="col-12 p-3 bg-white rounded shadow-sm">
		<!-- title -->
		<h1 class="pb-sm-2 pt-2 mb-0">
			Todas tus publicaciones
			<a role="button" href="{{ route('manager_nueva_publicacion')}}" class="btn btn-primary btn-sm float-right mt-1" style="font-size: .675rem;">Nueva</a>
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
				@foreach($publications as $publicacion)
        <div class="col-12  px-2 py-3  listado2 shadowHover">
            <a href="#" class="enlace">
                <div class="listadoDocumentos2">
                    <div class="imagenDocumento">
                        <div class="" style="background: url("{{ $publicacion->image_url }}") no-repeat;background-size: cover; background-position: center !important;"></div>
                    </div>
                    <div class="datosDocumento2">
                        <p class="font-weight-bold" style="margin-top: 1px">
													{{ $publicacion->title }}
                        </p>
                        <p class="font-weight-lighter" style="font-size: 12px">{{ $publicacion->editor_email }} - {{ $publicacion->created_at }}</p>
                    </div>
										<!-- TODO relacionar con destructor -->
                    <div class="eliminarDocumento text-right">
                        <a href="#" role="button" class="btn btn-sm btn-danger "><span class="icon-bin2"></span></a>
                    </div>
                </div>
            </a>
        </div>
				@endforeach




				@foreach ($publications as $publication)
				{{$publication->id}}
				{{$publication->title}}
				{{$publication->subtitle}}
				{{$publication->source}}
				{{$publication->body}}
				{{$publication->category}}
				{{$publication->editor_email}}
				{{$publication->image_url}}
				{{$publication->video_url}}
				{{$publication->active}}
				{{$publication->views_counter}}<br>
				@endforeach



	</div>
</div>


@endsection
