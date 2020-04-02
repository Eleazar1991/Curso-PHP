<h1>Formulario en Laravel</h1>

<form action="{{action('peliculaController@recibirFormulario')}}" method="POST">

    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre">
    <br>
    <label for="email">Email</label>
    <input type="email" name="email" id="email">
    <br>
    <input type="submit" value="Enviar">
</form>