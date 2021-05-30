<form method="POST" enctype="multipart/form-data" action="{{ route('banner.store')}}">
@csrf
    <div>
        <label for="">Título: </label>
        <input placeholder="Título" type="text" name="title">
        <label for="">Imagen: </label>
        <input placeholder="Imagen" type="file" name="image_url">
		<label for="">Url: </label>
        <input placeholder="Url" type="text" name="url">
		<label for="">Nombre de la compañía: </label>
        <input placeholder="Companyname" type="text" name="company_name">
		<label for="">Tamaño de la imagen: </label>
        <input placeholder="Tamaño" type="text" name="ranking_type">
    </div>
    <div>
        <input type="Submit" value="Aceptar">
    </div>
</form>