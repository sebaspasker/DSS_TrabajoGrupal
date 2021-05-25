<form method="POST">
@csrf
@method('put')
    <div>
    @foreach ($banners as $banner)
	{{$banner->title}}
	{{$banner->url}}
	{{$banner->company_name}}
	{{$banner->ranking_type}}
	{{$banner->image_url}}
	@endforeach
        <label for="">Título: </label>
        <input placeholder="Título" type="text" name="title">
		<label for="">Imagen: </label>
        <input placeholder="Imagen" type="file" name="image_url">
		<label for="">Url: </label>
        <input placeholder="Url" type="file" name="url">
		<label for="">Nombre de la compañía: </label>
        <input placeholder="Companyname" type="file" name="company_name">
		<label for="">Tamaño de la imagen: </label>
        <input placeholder="Tamaño" type="file" name="ranking_type">
    </div>
    <div>
        <input type="Submit" value="Aceptar">
    </div>
</form>
<form action="{{route('banner.delete', $banner->id)}}" method="POST">
@csrf
@method('delete')
    <div>
        <button type="Submit">Eliminar</button>
    </div>
</form>