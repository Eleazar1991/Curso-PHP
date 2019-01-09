<?php
//Crear una función qu valide un email con filter_var, recogiendo este email por get y mostrar su resultado

if(isset($_GET['email'])){
    echo email_validation($_GET['email']);
}else{
    echo "<p>Pase el email por GET</p>"; 
}

function email_validation($email){
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        return "<p>El email $email es válido</p>";
    }else{
        return "<p>El email $email no es válido</p>";
    }
}
?>
<a href="Ejercicio2.php?email=estoesunemail@gmail.com">Prueba correcta</a>
<a href="Ejercicio2.php?email=estonoesunemail.com">Prueba incorrecta</a>