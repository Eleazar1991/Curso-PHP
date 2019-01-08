<?php
$errores="Faltan_Valores";
if(!empty($_POST['nombre']) && !empty($_POST['apellidos']) 
    && !empty($_POST['edad']) && !empty($_POST['email']) && !empty($_POST['pass'])){
    $errores="OK";
    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $edad=$_POST['edad'];
    $email=$_POST['email'];
    $password=$_POST['pass'];
    // Si nombre es string o no contiene letras y espacios
    if(!is_string($nombre) || !preg_match("/[a-zA-Z ]+/",$nombre)){
    $errores="nombre";
    }
    // Si apellidos es string o no contiene letras y espacios
    if(!is_string($apellidos) || !preg_match("/[a-zA-Z a-zA-Z]+/",$apellidos)){
        $errores="apellidos";
    }
    // Si edad es numérico o no contiene numeros
    if(!is_int($edad) || !filter_var($edad,FILTER_VALIDATE_INT)){
        $errores="edad";
    }
    // Si email es string o no contiene letras y espacios
    if(!is_string($email) || !filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errores="email";
    }
    // Si password no está vacia o no tiene mas de 5 caracteres
    if(strlen($password)<5){
        $errores="password";
    }
}else{
    $errores="Faltan_Valores";
}

if($errores!="OK"){
    header("Location:index.php?error=".$errores);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Validación de formularios HTML</title>
</head>
<body>
    <?php
        if ($errores=="OK"){
            echo "<h1>Datos validados correctamente</h1>";
            echo "<p>$nombre</p>";
            echo "<p>$apellidos</p>";
            echo "<p>$edad</p>";
            echo "<p>$email</p>";
        }
    ?>
</body>
</html>