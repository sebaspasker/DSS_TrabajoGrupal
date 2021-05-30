@extends('manager/base')

@section('titulo', 'Buscador - NewsMoment')
@section('styles', 'categorias')

@section('cuerpo')

<div class="row m-0">
	<div class="col-12 p-0 bg-white rounded shadow-sm">
		<!-- title -->
		<h1 class="pb-sm-2 pt-2 mb-4 pb-3 px-3 mt-3">
			Todas tus categorías
			<a role="button" href="{{ route('category.create')}}" class="btn btn-primary btn-sm float-right mt-1" style="font-size: .675rem;">Nueva</a>
		</h1>
		<!-- categorias -->
		<div class="row m-0 pb-3">

            @foreach ($categories as $categorie)
                <!-- categoria -->
                <div class="col-md-4 mb-3">
                    <a href="#" class="enlace">
                        <div class="categoriaImg shadowHover" style="background: linear-gradient(to left, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.4) 60%, rgba(0, 0, 0, 0.8) 100%), url('{{ $categorie->imagen }}') no-repeat;background-size: cover; background-position: center !important;">
                            <p class="tituloCategoria">{{ $categorie->name }}</p>
                            <p class="blogCategoria">Noticias</p>
                        </div> 

                    <form method="POST" action="{{ route('category.delete', $categorie->id) }}">
                        @csrf
                        @method('delete')
                         <button role="button" class="btn btn-danger btn-sm buttonCategoria"><span class="icon-bin2"></span></button>
                    </form>
                       
                    </a>
                </div>

            @endforeach
		</div>
	</div>	
</div>

@endsection
