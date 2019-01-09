<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subir archivos PHP</title>
</head>
<body>
    <h1>Subir Archivos con PHP</h1>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="archivo"><p><input type="file" name="archivo"></p></label>
        <input type="submit" value="Enviar">
    </form>
    <h1>Listado de imagenes</h1>
    <?php
        $gestor=opendir('./images');
        if($gestor):
            //Vamos leyedo el contenido del directorio images
            while(($image = readdir($gestor)) !== false):
                if($image !='.' && $image != '..'):
                    echo "<img src='images/$image' width='200px'>";
                endif;
            endwhile;
        endif;
    ?>
</body>
</html>