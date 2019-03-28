<h1>Crear nueva categoria</h1>
<p>Nombre de la categoria: </p>
<form action="<?=base_url?>categoria/save" method="POST">
    <label for="name"><input type="text" name="name" required></label>
    <input type="submit" value="Guardar">
</form>