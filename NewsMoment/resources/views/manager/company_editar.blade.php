<form method="POST">
@csrf
@method('put')
    <div>
    @foreach ($companies as $company)
    {{$company->name}}
    {{$company->image_url}}
    @endforeach
        <label for="">Nombre: </label>
        <input placeholder="Nombre" type="text" name="name">
    </div>
    <div>
        <input type="Submit" value="Aceptar">
    </div>
</form>
<form action="{{route('company.delete', $company->id)}}" method="POST">
@csrf
@method('delete')
    <div>
        <button type="Submit">Eliminar</button>
    </div>
</form>