@extends('manager/base')

@section('titulo', 'Buscador - NewsMoment')
@section('styles', 'empresas')

@section('cuerpo')


<div class="row m-0">
	<div class="col-12 p-0 bg-white rounded shadow-sm">
		<!-- title -->
		<h1 class="pb-sm-2 pt-2 mb-4 pb-3 px-3 mt-3">
			Todas tus empresas
			<a role="button" href="{{ route('company.create')}}" class="btn btn-primary btn-sm float-right mt-1" style="font-size: .675rem;">Nueva</a>
		</h1>
		<!-- empresas -->
		<div class="row m-0 pb-3">
            @foreach ($companies as $company)
                <!-- empresaa -->
                <div class="col-lg-3 col-6 px-lg-3 marginBotonEmpresa mt-md-2 mb-md-3">
                    <a href="{{ route('company.edit', $company->id)}}" class="enlace">
                        <div class="empresaDash px-3 pt-4 pb-3">
                            <p class="nombreEmpresa">{{$company->name}}</p>
                            <div class="" style="background: url('{{$company->image_url}}') no-repeat;background-size: cover; background-position: center !important;"></div>
                        </div>
                    </a>

                     <form method="POST" action="{{ route('company.delete', $company->id) }}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm buttonEmpresa"><span class="icon-bin2"></span></a>
                    </form>

                  
                </div>
            @endforeach 
		</div>
	</div>	
</div>



@endsection