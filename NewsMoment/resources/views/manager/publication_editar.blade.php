<form method="POST">
@csrf
@method('put')
    <div>
    @foreach ($publications as $publication)
    {{$publication->name}}
    @endforeach
        <label for="">Nombre: </label>
        <input placeholder="Nombre" type="text" name="name">
        <label for="">Imagen: </label>
        <input placeholder="Imagen" type="file" name="imagen">
    </div>
    <div>
        <input type="Submit" value="Aceptar">
    </div>
</form>
<form action="{{route('publicacion.delete', $category->id)}}" method="POST">
@csrf
@method('delete')
    <div>
        <button type="Submit">Eliminar</button>
    </div>
</form>