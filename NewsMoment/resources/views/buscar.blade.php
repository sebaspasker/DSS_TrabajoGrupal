@extends('base')

@section('titulo', 'Buscador - NewsMoment')
    

@section('cuerpo')
    <div class="bg-dark" style="width: 100%">
		<div class="contenedor">
			<div class="row m-0">
				<div class="col-12 pt-4 pb-4">
					<form action="{{ route('buscar') }}">
						<input value="Resultado" type="text" name='q' required class="formularioContacto busquedaMotorCampo" placeholder="Buscar...">
						<button class="btn-primary btn border-0 rounded float-right px-md-5 py-md-3 px-3 py-2" type="submit"><span class="icon-search"></span></button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
    