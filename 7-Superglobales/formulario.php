<!doctype <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Formulario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
<h1>Formulario en PHP</h1>
<form method="POST" action="recibir.php">
    <p><label for="nombre">Nombre</label>
    <input type="text" name="nombre"></p>

    <p><label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos"></p>

    <input type="submit" value="Enviar">
</form>
</body>
</html>
