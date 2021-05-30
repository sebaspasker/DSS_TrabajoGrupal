<form method="POST" enctype="multipart/form-data">
@csrf
    <div>
        <label for="">Nombre: </label>
        <input placeholder="Nombre" type="text" name="name">
        <label for="">Imagen: </label>
        <input placeholder="Imagen" type="file" name="image_url">
    </div>
    <div>
        <input type="Submit" value="Aceptar">
    </div>
</form>