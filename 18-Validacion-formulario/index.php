<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Validación de Formularios</title>
</head>
<body>
    <h1>Validar Formularios en PHP</h1>
    <?php
        if(isset($_GET['error'])){
            $error=$_GET['error'];
            if($error=="Faltan_Valores"){
                echo '<strong style="color:red">Introduce todos los datos en todos los campos del formulario</strong>';
            }
            if($error=="nombre"){
                echo '<strong style="color:red">El nombre introducido no es correcto</strong>';
            }
            if($error=="apellidos"){
                echo '<strong style="color:red">Los apellidos introducidos no son correctos</strong>';
            }
            if($error=="edad"){
                echo '<strong style="color:red">La edad introducida no es correcta</strong>';
            }
            if($error=="email"){
                echo '<strong style="color:red">El email introducido no es correcto</strong>';
            }
            if($error=="password"){
                echo '<strong style="color:red">La contraseña introducida no es correcta</strong>';
            }
        }   
    
    ?>
    <form action="procesar_formulario.php" method="POST">
        <label for="nombre"><p><input type="text" name="nombre" placeholder="Nombre" required="required" pattern="[A-Za-z ]+"></p></label>
        <label for="apellidos"><p><input type="text" name="apellidos" placeholder="Apellidos" required="required" pattern="[A-Za-z A-Za-z]+"></p></label>
        <label for="edad"><p><input type="number" name="edad" required="required" pattern="[0-9]+"></p></label>
        <label for="email"><p><input type="email" name="email" placeholder="Email" required="required"></p></label>
        <label for="pass"><p><input type="password" name="pass" placeholder="Contraseña" required="required"></p></label>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>