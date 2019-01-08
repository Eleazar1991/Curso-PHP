<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formularios PHP y HTML</title>
</head>
<body>
    <h1>Formulario</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="nombre"><p><input type="text" name="nombre" placeholder="Nombre"></p></label>
        <label for="apellido"><p><input type="text" name="apellidos" placeholder="Apellidos" minlength="10"></p></label>
        <label for="boton"><p><input type="button" name="boton" value="Boton"></p></label>
        <label for="sexo"><p>Hombre: <input type="checkbox" name="sexo" value="Hombre">
        Mujer: <input type="checkbox" name="sexo" value="Mujer" checked="checked"></p></label>
        <label for="color"><p><input type="color" name="color"></p></label>
        <label for="date"><p><input type="date" name="date"></p></label>
        <label for="email"><p><input type="email" name="email" placeholder="Email"></p></label>
        <label for="file"><p><input type="file" name="file" multiple="multiple"></p></label>
        <label for="file"><p><input type="file" name="file" ></p></label>
        <label for="date"><p><input type="hidden" name="date"></p></label>
        <label for="numero"><p><input type="number" name="numero"></p></label>
        <label for="contrasena"><p><input type="password" name="cotrasena"></p></label>
        <label for="continente"><p>America Latina<input type="radio" name="continente" value="America Latina">
        Europa<input type="radio" name="continente" value="Europa">
        Asia<input type="radio" name="continente" value="Asia"></p></label>
        <label for="url"><p><input type="url" name="url"></p></label>
        <p><textarea name="texto" id="eltexto" cols="30" rows="10"></textarea></p>
        <p>
        Peliculas:
        <select name="pelis" >
            <option value="Spiderman">Spiderman</option>
            <option value="Batman">Batman</option>
            <option value="Superman">Superman</option>
        </select>
        </p>
        <input type="submit" value="Enviar">
    </form> 
</body>
</html>