<?php
//mostrar cookies
if (isset($_COOKIE['micookie'])){
    echo "<h1>".$_COOKIE['micookie']."</h1>";
}else{
    echo "<h1>La cookie no existe</h1>";
}

if (isset($_COOKIE['unyear'])){
    echo "<h1>".$_COOKIE['unyear']."</h1>";
}else{
    echo "<h1>La cookie no existe</h1>";
}

?>
<a href="crear_cookies.php">CrearCookies</a>
<a href="borrar_cookies.php">BorrarCookies</a>