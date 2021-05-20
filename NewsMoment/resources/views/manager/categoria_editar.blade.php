<form method="POST">
@csrf
@method('put')
    <div>
    @foreach ($categories as $category)
    {{$category->name}}
    {{$category->slugname}}
    {{$category->imagen}}
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
<form action="{{route('category.delete', $category->id)}}" method="POST">
@csrf
@method('delete')
    <div>
        <button type="Submit">Eliminar</button>
    </div>
</form>