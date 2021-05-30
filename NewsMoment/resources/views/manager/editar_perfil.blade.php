@extends('manager/base')

@section('titulo', 'Manager - NewsMoment')
@section('styles', 'ajustes')

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
				<div class="col-12 p-0">
                    <input type="text" name="name" value="{{@Auth::user()->name}}" class="form-control mt-3" placeholder="Nombre">
				</div>
                <div class="col-12 p-0">
                    <input type="text" name="email" value="{{@Auth::user()->email}}" class="form-control mt-3" placeholder="Email">
				</div>
				<!-- footer -->
				<div class="col-12 p-0 mt-3 text-right">
					<button type="submit" class="btn btn-primary">Guardar Perfil</button>
				</div>
			</div>
		</div>
	</div>
</form>


@endsection