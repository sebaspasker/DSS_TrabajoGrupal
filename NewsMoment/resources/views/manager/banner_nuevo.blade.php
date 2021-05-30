@extends('manager/base')

@section('titulo', 'Manager - NewsMoment')
@section('styles', 'categorias')

@section('cuerpo')


 <form method="POST" enctype="multipart/form-data" action="{{ route('banner.store')}}">
    @csrf
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
						<div id="bluh" class="w-100 h-100"></div>
						<input  type="file" required name="image_url" accept="image/*" class="clearablefileinput" id="id_imagen">
					</div>
				</div>
				<!-- name -->
				<div class="col-12 p-0">
                    <input type="text" name="title" class="form-control mt-3" placeholder="Nombre del banner">
				</div>
                <!-- url -->
				<div class="col-12 p-0">
                    <input type="text" name="url" class="form-control mt-3" placeholder="Url del banner">
				</div>

				<div class="col-12 p-0">
					<select name="company_name" required class="btn-outline-primary custom-select mt-3" style="width:120px"id="inputGroupSelect01">
						@foreach ($empresas as $empresa)
							<option value="{{ $empresa->name }}">
								{{ $empresa->name }}
							</option>
						@endforeach
					</select>

                    <select name="ranking_type" required class="btn-outline-primary custom-select mt-3" style="width:120px"id="inputGroupSelect01">
                        <option value="1">
                            Banner pequeño
                        </option>
                        <option value="2">
                            Banner grande
                        </option>
					</select>
				</div>
                
				<!-- footer -->
				<div class="col-12 p-0 mt-3 text-right">
					<button type="submit" class="btn btn-primary">Crear Banner</button>
				</div>

			</div>
		</div>
	</div>
</form>


@endsection