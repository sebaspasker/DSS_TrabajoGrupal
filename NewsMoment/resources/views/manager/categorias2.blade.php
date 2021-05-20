


@extends('manager/base')

@section('titulo', 'Buscador - NewsMoment')
@section('styles', 'categorias')

@section('cuerpo')

<div class="row m-0">
	<div class="col-12 p-0 bg-white rounded shadow-sm">
		<!-- title -->
		<h1 class="pb-sm-2 pt-2 mb-4 pb-3 px-3 mt-3">
			Todas tus categorías
			<a role="button" href="{{ route('manager_nueva_categoria')}}" class="btn btn-primary btn-sm float-right mt-1" style="font-size: .675rem;">Nueva</a>
		</h1>
		<!-- categorias -->
		<div class="row m-0 pb-3">

            @foreach ($categories as $categorie)
                <!-- categoria -->
                <div class="col-md-4 mb-3">
                    <a href="#" class="enlace">
                        <div class="categoriaImg shadowHover" style="background: linear-gradient(to left, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.4) 60%, rgba(0, 0, 0, 0.8) 100%), url('{{ $categorie->imgagen }}') no-repeat;background-size: cover; background-position: center !important;">
                            <p class="tituloCategoria">{{ $categorie->name }}</p>
                            <p class="blogCategoria">Noticias</p>
                        </div> 
                        <a role="button" href="#" class="btn btn-danger btn-sm buttonCategoria"><span class="icon-bin2"></span></a>
                    </a>
                </div>

            @endforeach
		</div>
	</div>	
</div>



<form action="">
    <input type="text" placeholder="nombre">
    <input type="number" placeholder="edad">
    <button type="submit">Crear persona</button>
</form>






@endsection
