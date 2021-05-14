<form method="POST" action ="{{ route('mostrarbanner') }}">
	<input type="text" name = "title" placeholder="Título">
	<br>
	<input type="text" name = "url" placeholder="Link">
	<br>
	<input type="text" name = "imagen" placeholder="Imagen">
	<br>
	<input type="text" name = "ranking_type" placeholder="Tamaño de la imagen">
	<br>
	<input type="text" name = "company_name" placeholder="Nombre de la empresa">
	<br>
	<button> Enviar</button>


</form>