<!-- Realizar una calculadora en php con una interfaz realizada en un formulario -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculadora PHP</title>
</head>
<body>
    
<form action="Ejercicio3.php" method="POST">
        <p><label for="num1"><input type="number" name="num1" placeholder="Primer operando"></label>
        <label for="num2"><input type="number" name="num2" placeholder="Segundo operando"></label></p>
        <p><label for="sum"><input type="submit" value="+" name="sum"></label>
        <label for="rest"><input type="submit" value="-" name="rest"></label>
        <label for="mult"><input type="submit" value="*" name="mult"></label>
        <label for="div"><input type="submit" value="/" name="div"></label></p>
    </form>
</body>
</html>
<?php
if(!empty($_POST['num1'])&&!empty($_POST['num2'])){
    if(!empty($_POST["sum"])){
        echo "<p>La suma es: ".($_POST['num1']+$_POST['num2']) ."</p>";
    }
    if(!empty($_POST["rest"])){
        echo "<p>La resta es: ".($_POST['num1']-$_POST['num2']) ."</p>";
    }
    if(!empty($_POST["mult"])){
        echo "<p>La multiplicación es: ".($_POST['num1']*$_POST['num2']) ."</p>";
    }
    if(!empty($_POST["div"])){
        echo "<p>La división es: ".($_POST['num1']/$_POST['num2']) ."</p>";
    }
}
?>
