@extends('public/base')

@section('titulo', 'Login Manager')
    

@section('cuerpo')
   		<div class="container mt-md-5 mt-4">
			<form method="post" action="{{ route('manager_dashboard') }}">
				<div class="row m-0 pt-5 pb-5">
					<div class="col-md-3"></div>
					<div class="col-md-6 rounded">
							<a role="button" class="btn btn-sm btn-outline-primary mb-2" href="{{ route('home') }} ">
								<span class="icon-arrow-left2 mr-1"></span>
								Volver a inicio
							</a>
							<div class="row m-0 bg-dark p-4">
                                <!--
                                <div class="alert alert-danger rounded-0" role="alert">
                                    Por favor, introduzca un nombre de usuario y clave correctos. Observe que ambos campos pueden ser sensibles a mayúsculas.
                                </div>
                                -->
								<div class="col-12 p-0">
									<p class="text-light mb-1">Usuario</p>
									<input type="text" name="" autofocus class="formularioContacto" required>
								</div>
								<div class="col-12 p-0 mt-4">
									<p class="text-light mb-1">Contraseña</p>
									<input type="password" name="" class="formularioContacto" required>
								</div>
								<div class="col-12 p-0">
									<button class="btn-primary btn float-right mt-3 px-5 py-3" type="submit">Acceder</button>
								</div>
							</div>
					</div>
				</div>
			</form>
		</div>
@endsection
    