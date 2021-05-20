<form method="POST" enctype="multipart/form-data">
@csrf
    <div>
        <label for="">Titulo: </label>
        <input placeholder="Titulo" type="text" name="title"><br>
        <label for="">Subtitulo: </label>
        <input placeholder="Subtitulo" type="text" name="subtitle"><br>
        <label for="">Source: </label>
        <input placeholder="Source" type="text" name="source"><br>
        <label for="">Body: </label>
        <input placeholder="Body" type="text" name="body"><br>
        <label for="">Categoria: </label>
        <input placeholder="Categoria" type="text" name="category"><br>
        <label for="">Editor email: </label>
        <input placeholder="Editor" type="text" name="editor_email"><br>
        <label for="">Imagen: </label>
        <input placeholder="Imagen" type="file" name="image_url"><br>
        <label for="">Video: </label>
        <input placeholder="Video" type="file" name="video_url">
    </div>
    <div>
        <input type="Submit" value="Aceptar">
    </div>
</form>